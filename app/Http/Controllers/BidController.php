<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidStore;
use App\Models\AgeGroup;
use App\Models\Bid;
use App\Models\Competition;
use App\Models\Country;
use App\Models\Nomination;
use App\Models\Price;
use App\Models\Tariff;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function create()
    {
        $competitions = Competition::with(['type'])->get()->toArray();
        $age_groups = AgeGroup::all(['id', 'name', 'price', 'type'])->toArray();
        $nominations = Nomination::all(['id', 'name', 'type'])->toArray();
        $tariffs = Tariff::all(['id', 'price', 'name', 'duration', 'selected', 'type'])->toArray();
        $countries = Country::all(['id', 'name', 'postage_price'])->toArray();
        $price = Price::first();
        if (!$price){
            $price = $this->mock_obj();
        }

        return view('pages.bid.index', compact(
            'competitions',
            'age_groups',
            'nominations',
            'tariffs',
            'countries',
            'price'
        ));
    }


    public function store(BidStore $request)
    {
        $data = $request->validated();

//        dd($data);
        if ($data['cnt_people'] == 'false'){
            $data['cnt_people'] = 'kollective';
        }elseif ($data['cnt_people'] == 'true'){
            $data['cnt_people'] = 'solist';
        }

        $bid = new Bid($data);
        $bid->save();

        $bid = Bid::with(['teachers', 'participants'])->where('id', $bid->id)->firstOrFail();

        if ($request->has('teacher_first_name')){
            $teachers = [];
            foreach ($data['teacher_first_name'] as $key => $first_name){
                $teachers[] = [
                    'bid_id' => $bid->id,
                    'first_name' => $data['teacher_first_name'][$key],
                    'last_name' => $data['teacher_last_name'][$key],
                    'third_name' => $data['teacher_third_name'][$key],
                    'job' => $data['teacher_job'][$key],
                ];
            }
            $bid->teachers()->insert($teachers);
        }

        if ($request->has('participant_first_name')){
            $participants = [];
            foreach ($data['participant_first_name'] as $key => $first_name){
                $participants[] = [
                    'bid_id' => $bid->id,
                    'first_name' => $data['participant_first_name'][$key],
                    'last_name' => $data['participant_last_name'][$key],
                ];
            }
            $bid->participants()->insert($participants);
        }


        return back();
    }


    private function mock_obj()
    {
        $class = new \stdClass();
        $price = [
            'id' => 1,
            'thanks_teacher' => 0,
            'diploma' => 0,
            'diploma_kollective_electro' => 0,
            'diploma_print_solist' => 0,
            'diploma_print_kollective' => 0,
            'general_diplom_print' => 0,
            'discount' => 0,
            'cnt_person' => 0,
            'max_quantity_participants_price' => 0,
        ];

        foreach ($price as $var => $value){
            $class->$var = $value;
        }

        return $class;
    }
}
