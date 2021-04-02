<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Competition;
use Illuminate\Http\Request;
use function React\Promise\all;


class BidController extends Controller
{
    public function new_bids()
    {
        $bids_amateur = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('new_state', '1')
            ->where('type', 'amateur')
            ->get();

        // Сортировка по дате завершения проверки заявки (Оценить до)
        $bids_amateur = $bids_amateur->sortBy(function ($item, $key){
            return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
        });


        $bids_professional = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('new_state', '1')
            ->where('type', 'professional')
            ->get();

        // Сортировка по дате завершения проверки заявки (Оценить до)
        $bids_professional = $bids_professional->sortBy(function ($item, $key){
            return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
        });


        return view('admin.bids.new_bids', compact('bids_amateur', 'bids_professional'));
    }


    public function index()
    {
        $bids_amateur = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('type', 'amateur')
            ->get();

        // Сортировка по дате завершения проверки заявки (Оценить до)
        $bids_amateur = $bids_amateur->sortBy(function ($item, $key){
            return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
        });


        $bids_professional = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('type', 'professional')
            ->get();

        // Сортировка по дате завершения проверки заявки (Оценить до)
        $bids_professional = $bids_professional->sortBy(function ($item, $key){
            return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
        });


        return view('admin.bids.index', compact('bids_amateur', 'bids_professional'));
    }

    /*
     * По типу конкурса
     */
    public function index_type($type)
    {
        $bids = Bid::with(['competition'])->where('type', $type)->get()->groupBy(function ($item, $key){
            return $item->competition->name;
        });

        if ($type == 'amateur'){
            $str_type = 'Любительские';
        }elseif ($type == 'professional'){
            $str_type = 'Профессиональные';
        }

        return view('admin.bids.index_type', compact('bids', 'str_type', 'type'));
    }

    /*
     *
     */
    public function competition($competition_id)
    {
        $competition = Competition::where('id', $competition_id)->firstOrFail();
        $bids = Bid::with(['nomination', 'ageGroup', 'tariff'])
            ->where('competition_id', $competition_id)
            ->get();

        if ($bids->count() > 0){
            if ($bids[0]->type == 'amateur'){
                $str_type = 'Любительские';
            }elseif ($bids[0]->type == 'professional'){
                $str_type = 'Профессиональные';
            }
        }else{
            $str_type = '';
        }

        return view('admin.bids.competition', compact('bids', 'str_type', 'competition'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Bid $bid)
    {
        //
    }


    public function edit($id)
    {
        $bid = Bid::with(['ageGroup', 'participants', 'teachers', 'competition'])->where('id', $id)->firstOrFail();
        if (is_null($bid->participants)){
            $bid->participants = [];
        }
        if (is_null($bid->teachers)){
            $bid->teachers = [];
        }
//        dd($bid);

        return view('admin.bids.edit', compact('bid'));
    }


    public function update(Request $request, $id)
    {
        dd($request->all());
    }


    public function destroy(Bid $bid)
    {
        //
    }
}
