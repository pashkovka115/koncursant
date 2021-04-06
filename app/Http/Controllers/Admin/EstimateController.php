<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BidUpdate;
use App\Models\Bid;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    // допущена к оценке
    public function index()
    {
        $bids_amateur = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('processe_state', '1')
            ->where('type', 'amateur')
            ->get();

        // Сортировка по дате завершения проверки заявки (Оценить до)
        $bids_amateur = $bids_amateur->sortBy(function ($item, $key){
            if ($item->tariff){
                return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
            }
        });


        $bids_professional = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('processe_state', '1')
            ->where('type', 'professional')
            ->get();

        return view('admin.estimate.index', ['bids_amateur' => $bids_amateur, 'bids_professional' => $bids_professional]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $bid = Bid::with([
            'ageGroup',
            'participants',
            'teachers',
            'competition',
            'nomination',
            'tariff',
            'country'
        ])
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.estimate.edit', ['bid' => $bid]);
    }


    public function next_random()
    {
        $bid = Bid::with(['ageGroup', 'participants', 'teachers', 'competition', 'nomination'])
            ->where('processe_state', '1')
            ->first();
        if (!$bid){
            $bid = [];
        }

        return view('admin.estimate.edit', ['bid' => $bid]);
    }


    public function update(BidUpdate $request, $id)
    {
        $data = $request->validated();
//        dd($data);
        $bid = Bid::where('id', $id)->firstOrFail();
        $bid->update($data);

        if ($request->has('btn_save_and_next')){
            return redirect()->route('admin.estimate.next');
        }

        return back();
    }


    public function destroy($id)
    {
        //
    }
}
