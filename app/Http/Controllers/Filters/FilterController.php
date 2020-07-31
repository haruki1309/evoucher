<?php

namespace App\Http\Controllers\Filters;

use App\Models\Filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function store(Request $request)
    {

        $name = $request->name;
        $type = $request->type;
        $conditionType = $request->conditionType;
        $compares = $request->compare;
        $values = $request->value;
        $config = [];

        foreach ($compares as $column => $compare) {
            if(!empty($values[$column])) {
                $config[$column] = [
                    'compare' => $compare, 
                    'value' => $values[$column]
                ];
            }
        }

        $filter = new Filter();
        $filter->name = $name;
        $filter->type = $type;
        $filter->condition_type = $conditionType;
        $filter->json_config = $config;
        $filter->save();

        return response()->json(['msg' => ['type' => 'success', 'text' => 'Tạo bộ lọc thành công!']]);
    }
}
