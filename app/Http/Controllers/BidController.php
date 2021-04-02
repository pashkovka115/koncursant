<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidStore;
use App\Models\AgeGroup;
use App\Models\Bid;
use App\Models\Competition;
use App\Models\Country;
use App\Models\Nomination;
use App\Models\Tariff;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function create()
    {
        $competitions = Competition::all(['id', 'name'])->toArray();
        $age_groups = AgeGroup::all(['id', 'name', 'price', 'type'])->toArray();
        $nominations = Nomination::all(['id', 'name', 'type'])->toArray();
        $tariffs = Tariff::all(['id', 'price', 'name', 'duration', 'selected', 'type'])->toArray();
        $countries = Country::all(['id', 'name', 'postage_price'])->toArray();

        return view('pages.bid.index', compact(
            'competitions',
            'age_groups',
            'nominations',
            'tariffs',
            'countries'
        ));
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
