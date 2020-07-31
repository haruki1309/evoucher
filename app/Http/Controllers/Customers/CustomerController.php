<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Redirect, Response;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        if (request()->ajax()) {
            return  datatables()->of($customers)
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

        return view('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store()
    {
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }
}
