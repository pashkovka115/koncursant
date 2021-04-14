<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BidUpdate;
use App\Models\AgeGroup;
use App\Models\Appraisal;
use App\Models\Bid;
use App\Models\Competition;
use App\Models\Country;
use App\Models\Nomination;
use App\Models\Tariff;
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
            if ($item->tariff){
                return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
            }
        });


        $bids_professional = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('new_state', '1')
            ->where('type', 'professional')
            ->get();

        // Сортировка по дате завершения проверки заявки (Оценить до)
        /*$bids_professional = $bids_professional->sortBy(function ($item, $key){
            if ($item->tariff){
                return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
            }
        });*/


        return view('admin.bids.new_bids', compact('bids_amateur', 'bids_professional'));
    }


    public function index()
    {
        $bids_amateur = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('type', 'amateur')
            ->get();

        // Сортировка по дате завершения проверки заявки (Оценить до)
        $bids_amateur = $bids_amateur->sortBy(function ($item, $key){
            if ($item->tariff){
                return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
            }
        });


        $bids_professional = Bid::with(['competition', 'nomination', 'ageGroup', 'tariff'])
            ->where('type', 'professional')
            ->get();

        // Сортировка по дате завершения проверки заявки (Оценить до)
        $bids_professional = $bids_professional->sortBy(function ($item, $key){
            if ($item->tariff){
                return idate('s', $item->tariff->created_at) + ($item->tariff->duration * 86400);
            }
        });


        return view('admin.bids.index', compact('bids_amateur', 'bids_professional'));
    }

    /*
     * По типу конкурса
     */
    public function index_type($type)
    {
        $bids = Bid::with(['competition'])->where('type', $type)->get()->groupBy(function ($item, $key){
            if ($item->competition){
                return $item->competition->name;
            }
            return [];
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


    public function edit($id)
    {
        $bid = Bid::with([
            'ageGroup',
            'participants',
            'teachers',
            'competition',
            'nomination',
            'appraisal'
        ])->where('id', $id)->firstOrFail();

        if (is_null($bid->participants)){
            $bid->participants = [];
        }
        if (is_null($bid->teachers)){
            $bid->teachers = [];
        }
        $bid->new_state = '0';
        $bid->update();

        $competitions = Competition::all(['id', 'name']);
        $nominations = Nomination::all(['id', 'name']);
        $age_groups = AgeGroup::all(['id', 'name']);
        $tariffs = Tariff::all(['id', 'name']);
        $countries = Country::all(['id', 'name']);
        $appraisals = Appraisal::all(['id', 'name']) ?? [];
//        dd($appraisals);

        return view('admin.bids.edit', compact(
            'bid',
            'competitions',
            'nominations',
            'age_groups',
            'tariffs',
            'countries',
            'appraisals'
        ));
    }


    public function update(BidUpdate $request, $id)
    {
        $data = $request->validated();

        $bid = Bid::with(['teachers', 'participants'])->where('id', $id)->firstOrFail();
        $bid->update($data);

        // todo: переделать. сейчас добавляет. надо что бы обновляло
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
        /*if ($request->has('teacher_letter_print')){

        }*/

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


    public function destroy($id)
    {
        $bid = Bid::with(['participants', 'teachers'])->where('id', $id)->firstOrFail();
        foreach ($bid->participants as $participant){
            $participant->delete();
        }
        foreach ($bid->teachers as $teacher){
            $teacher->delete();
        }

        $bid->delete();

        return back();
    }
}
