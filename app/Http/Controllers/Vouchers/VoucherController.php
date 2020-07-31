<?php

namespace App\Http\Controllers\Vouchers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evoucher;
use App\Models\EvoucherCode;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Redirect, Response;

class VoucherController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $evouchers = Evoucher::all();

            return datatables()->of($evouchers)
                ->editColumn('unit', function ($evoucher) {
                    return displayUnitPicklist($evoucher->unit);
                })
                ->editColumn('issue_from', function ($evoucher) {
                    return date('d/m/yy', strtotime($evoucher->issue_from));
                })
                ->editColumn('issue_until', function ($evoucher) {
                    return date('d/m/yy', strtotime($evoucher->issue_until));
                })
                ->editColumn('status', function ($evoucher) {
                    $codeStatusStyle = [
                        'new' => 'success',
                        'code-generated' => 'info',
                        'sent' => 'warning'
                    ];

                    $value = str_replace(
                        [
                            '%class%', '%value%'
                        ],
                        [
                            $codeStatusStyle[$evoucher->status], $evoucher->status
                        ],
                        '<span class="btn-sm btn-%class%">%value%</span>'
                    );
                    return $value;
                })
                ->addColumn('action', function ($evoucher) {
                    $id = $evoucher->id;
                    $status = $evoucher->status;
                    return (string) view('vouchers.actions.index', compact('id', 'status'));
                })
                ->rawColumns(['action', 'status'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('vouchers.index');
    }

    public function create()
    {
        $unitPicklist = [
            [
                'key' => 'percent',
                'value' => '%'
            ],
            [
                'key' => 'vnd',
                'value' => 'VND'
            ],
        ];
        return view('vouchers.create', compact('unitPicklist'));
    }

    public function store(Request $request)
    {
        // backend validate layer
        $request->validate([
            'title' => 'required',
            'value' => 'required',
            'qty' => 'required',
            'description' => 'required',
            'term' => 'required',
            'issue_from' => 'required',
            'issue_until' => 'required',
        ]);

        // setup basic info for evoucher
        $user = Auth::user();
        $evoucher = new Evoucher();
        $evoucher->brand_id = $user->brand->id;
        $evoucher->title = $request->title;
        $evoucher->value = $request->value;
        $evoucher->unit = $request->unit;
        $evoucher->qty = 0;
        $evoucher->description = $request->description;
        $evoucher->term = $request->term;
        $evoucher->issue_from = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->issue_from)));
        $evoucher->issue_until = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->issue_until)));
        $evoucher->created_by = $user->id;
        $evoucher->updated_by = $user->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $paths = uploadFiles('img/vouchers/', [$file]);
            $evoucher->image = implode(' [##] ', $paths);
        }

        $evoucher->save();

        // create list voucher code of user's brand
        if ($evoucher->qty > 0) {
            $this->generateCodeFromVoucher($evoucher->id, $request->codeLength, $request->qty);
        }

        return redirect()->route('vouchers.show', ['id' => $evoucher->id]);
    }

    public function show($id)
    {
        $evoucher = Evoucher::find($id);
        $codes = $evoucher->evoucherCodes;

        if (request()->ajax()) {
            return datatables()->of($codes)
                ->editColumn('redeem_date', function ($code) {
                    return ($code->redeem_date == null) ? '' : date('d/m/yy', strtotime($code->redeem_date));
                })
                ->editColumn('status', function ($code) {
                    $codeStatusStyle = [
                        'created' => 'info',
                        'sent' => 'warning',
                        'redeemed' => 'success'
                    ];

                    $value = str_replace(
                        [
                            '%class%', '%value%'
                        ],
                        [
                            $codeStatusStyle[$code->status], $code->status
                        ],
                        '<span class="btn-sm btn-%class%">%value%</span>'
                    );

                    return $value;
                })
                ->addColumn('customer', function ($code) {
                    $customerId = $code->customer_id;

                    if ($customerId != '') {
                        $value = str_replace(
                            [
                                '%customer_link%', '%customer_fullname%'
                            ],
                            [
                                url('/customers/' . $customerId), getCustomerFullnameById($customerId)
                            ],
                            '<a href="%customer_link%">%customer_fullname%</a>'
                        );
                        return $value;
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['customer', 'status'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('vouchers.show', compact('evoucher'));
    }

    public function edit($id)
    {
        $evoucher = Evoucher::find($id);
        
        $imagePaths = explode(' [##] ', $evoucher->image);
        $initialPreview = [];
        $initialPreviewConfig = [];
        foreach($imagePaths as $key => $path) {
            $initialPreview[] = url($path);

            $initialPreviewConfig[] = [
                'caption' => substr($path, strlen('img/evouchers/') - 1),
                'filename' => substr($path, strlen('img/evouchers/') - 1),
                'width' => '120px',
                'size' => '',
                'downloadUrl' => $path,
                'key' => $key,
            ];
        }
        
        if ($evoucher->status == 'sent') {
            return redirect()->back();
        }

        $unitPicklist = [
            [
                'key' => 'percent',
                'value' => '%'
            ],
            [
                'key' => 'vnd',
                'value' => 'VND'
            ],
        ];
        return view('vouchers.edit', compact('evoucher', 'unitPicklist', 'initialPreview', 'initialPreviewConfig'));
    }

    public function update(Request $request, $id)
    {
        $evoucher = Evoucher::find($id);
        // backend validate layer
        $request->validate([
            'title' => 'required',
            'value' => 'required',
            'description' => 'required',
            'term' => 'required',
            'issue_from' => 'required',
            'issue_until' => 'required',
        ]);

        // setup basic info for evoucher
        $user = Auth::user();
        $evoucher->brand_id = $user->brand->id;
        $evoucher->title = $request->title;
        $evoucher->value = $request->value;
        $evoucher->unit = $request->unit;
        $evoucher->description = $request->description;
        $evoucher->term = $request->term;
        $evoucher->issue_from = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->issue_from)));
        $evoucher->issue_until = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->issue_until)));
        $evoucher->updated_by = $user->id;

        if ($request->hasFile('image')) {

            if($evoucher->image != '') {
                $oldImgs = explode(' [##] ', $evoucher->image);
                foreach($oldImgs as $oldImg) {
                    unlink($oldImg);
                }
            }

            $file = $request->file('image');
            $paths = uploadFiles('img/vouchers/', [$file]);
            $evoucher->image = implode(' [##] ', $paths);
        }
        $evoucher->save();

        return redirect()->route('vouchers.show', ['id' => $evoucher->id]);
    }

    public function delete($id)
    {
    }

    public function verifyview()
    {
        return view('vouchers.verify');
    }

    public function createCode(Request $request)
    {
        $length = $request->codeLength;
        $id = $request->evoucherid;
        $qty = $request->qty;

        $this->generateCodeFromVoucher($id, $length, $qty);

        return response()->json(['msg' => ['type' => 'success', 'text' => 'Tạo mã thành công!']]);
    }

    public function customers()
    {
        $customers = Customer::all();

        if (request()->ajax()) {
            return datatables()->of($customers)->make(true);
        }
    }

    private function generateCodeFromVoucher($evoucherId, $length, $qty)
    {

        $evoucher = Evoucher::find($evoucherId);

        $codes = EvoucherCode::where('brand_id', $evoucher->brand_id)->get('code');
        $ignoreArr = [];

        foreach ($codes as $code) {
            $ignoreArr[] = $code->code;
        }

        for ($i = 0; $i < $qty; $i++) {
            $code = new EvoucherCode();
            $code->evoucher_id = $evoucher->id;
            $code->code = generateVoucherCode($ignoreArr, $length);
            $code->brand_id = $evoucher->brand_id;
            $code->redeem_date = null;
            $code->customer_id = null;
            $code->status = 'created';
            $code->save();
        }

        $evoucher->qty = $evoucher->qty + $qty;
        $evoucher->status = 'code-generated';
        $evoucher->save();
    }
}
