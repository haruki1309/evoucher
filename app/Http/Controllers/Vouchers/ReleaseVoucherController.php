<?php

namespace App\Http\Controllers\Vouchers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Redirect, Response;

class ReleaseVoucherController extends Controller
{
    public function getRelease(Request $request, $step)
    {
        if ($step == 'step-1a') {
            return view('vouchers.release.step1a');
        }
        if ($step == 'step-1b') {
            return view('vouchers.release.step1b');
        } 
        else if ($step == 'step-2') {
            
        }
        else {
            return redirect()->back();
        }
    }

    public function postRelease(Request $request, $step)
    {
        if ($step == 'step-1a') {
            $filterdList = $request->filterdList;
        }   
        if ($step == 'step-1b') {
        } 
        else if ($step == 'step-2') {
            $this->handlePostReleaseStep1b($request);
        } 
        else {
            return redirect()->back();
        }
    }

    public function getCustomersByFilter(Request $request)
    {
        $config  = $request->config;
        $conditionType = $request->conditionType;
        $customers = $this->getListFromJsonConfig($config, $conditionType);

        return datatables()->of($customers)
            ->addColumn('classification', function ($customer) {

                $classification = $customer->customerClassification->value;
                $color = $customer->customerClassification->color;

                return empty($color) ? $classification : str_replace(
                    [
                        '%color%', '%classification%'
                    ],
                    [
                        $color, $classification
                    ],
                    '<span class="btn-sm" style="background: %color%; color: #fff;">%classification%</span>'
                );
            })
            ->addColumn('action', function ($customer) {
                $id = $customer->id;
                $status = $customer->status;
                return (string) view('customers.actions.index', compact('id'));
            })
            ->rawColumns(['action', 'classification'])
            ->addIndexColumn()
            ->make(true);
    }

    private function handlePostReleaseStep1a(Request $request)
    {
        $filterdList = $request->filterdList;
    }

    private function handlePostReleaseStep1b(Request $request)
    {
        $name = $request->name;
        $conditionType = $request->conditionType;
        $operators = $request->operator;
        $values = $request->value;
        $config = [];

        foreach ($operators as $column => $operator) {
            if (!empty($values[$column])) {
                $config[$column] = [
                    'operator' => $operator,
                    'value' => ($operator == 'like') ? '%' . $values[$column] . '%' : $values[$column]
                ];
            }
        }

        return view('vouchers.release.step2', compact('config', 'conditionType'));
    }



    /**
     * getListFromJsonConfig
     *
     * @param  array $config
     * @param  string $conditionType
     * @return array
     */

    private function getListFromJsonConfig($config, $conditionType)
    {

        $customers = DB::table('customers');

        foreach ($config as $column => $condition) {
            if ($conditionType == 'or') {
                $customers->orWhere($column, $condition['operator'], $condition['value']);
            } else if ($conditionType == 'and') {
                $customers->andWhere($column, $condition['operator'], $condition['value']);
            }
        }

        return $customers->get();
    }
}
