<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerClassification;
use Illuminate\Support\Facades\Auth;

class CustomerClassificationController extends Controller
{
    public function index()
    {
        $customerClassifications = CustomerClassification::all();
        if (request()->ajax()) {
            return  datatables()->of($customerClassifications)
                ->addColumn('action', function ($customerClassification) {
                    $id = $customerClassification->id;
                    return (string) view('customerClassifications.actions.index', compact('id'));
                })
                ->editColumn('color', function ($customerClassification) {

                    $value = str_replace(
                        [
                            '%color%'
                        ],
                        [
                            $customerClassification->color
                        ],
                        '<span class="btn-sm" style="background: %color%; color: #fff;">%color%</span>'
                    );

                    return $value;
                })
                ->rawColumns(['action', 'color'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('customerClassifications.index');
    }

    public function create()
    {
        return view('customerClassifications.create');
    }

    public function store(Request $request)
    {
        // backend validate layer
        $request->validate([
            'value' => 'required',
            'min_score' => 'required',
        ]);

        // setup basic info for rank
        $user = Auth::user();
        $customerClassification = new CustomerClassification();
        $customerClassification->value = $request->value;
        $customerClassification->key = slugify($request->value);
        $customerClassification->min_score = $request->min_score;
        $customerClassification->color = empty($request->color) ? '' : $request->color;
        $customerClassification->created_by = $user->id;
        $customerClassification->updated_by = $user->id;
        $customerClassification->save();

        return redirect()->route('customerClassifications.index');
    }

    public function show($id)
    {
        $customerClassification = CustomerClassification::find($id);
        return view('customerClassifications.show', compact('customerClassification'));
    }

    public function edit($id)
    {
        $customerClassification = CustomerClassification::find($id);
        return view('customerClassifications.edit', compact('customerClassification'));
    }

    public function update(Request $request, $id)
    {
        // backend validate layer
        $request->validate([
            'value' => 'required',
            'min_score' => 'required',
        ]);

        // setup basic info for rank
        $user = Auth::user();
        $customerClassification = CustomerClassification::find($id);
        $customerClassification->value = $request->value;
        $customerClassification->key = slugify($request->value);
        $customerClassification->min_score = $request->min_score;
        $customerClassification->color = empty($request->color) ? '' : $request->color;
        $customerClassification->updated_by = $user->id;
        $customerClassification->save();

        return redirect()->route('customerClassifications.index');
    }

    public function delete($id)
    {
    }
}
