<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidStore;
use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function create()
    {
        return view('pages.bid.index');
    }


    public function store(BidStore $request)
    {
        // todo: проверка что нет пропущенных полей (только для разработки)
        $not_field = [];
        foreach ($request->all() as $field => $value){
            if ($field == '_token'){
                continue;
            }
            if (!in_array($field, array_keys($request->validated()))){
                $not_field[] = $field;
            }
        }
        if (count($not_field) > 0){
            dd('Не валидированное поля:', $not_field);
        }
        // todo: ===========================================

        $bid = new Bid();
        $bid->save($request->validated());

        return back();
    }
}
