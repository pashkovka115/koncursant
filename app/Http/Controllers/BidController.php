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
}
