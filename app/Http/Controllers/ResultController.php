<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index_free($input_year = false)
    {
        $bids = Bid::where('type', 'amateur')->get();

        // существующие года
        $years = [];
        foreach ($bids->toArray() as $bid) {
            $year = explode('-', $bid['updated_at'])[0];
            $years[$year] = '';
        }

        $years = array_keys($years);
        sort($years, SORT_STRING);
        $current_year = $years[count($years) - 1];
        if ($input_year) {
            $current_year = $input_year;
        }

        $bids = Bid::with('competition')
            ->where('type', 'amateur')
            ->where('processe_state', '0') // Завершённая
            ->where('updated_at', '>', ($current_year - 1) . '-12-31 00:00:00')
            ->where('updated_at', '<', ($current_year + 1) . '-01-01 00:00:00')
            ->get();

        $competitions = [];
        foreach ($bids as $bid) {
            $competitions[$bid->competition->name][] = [
                'date_bid' => $bid->updated_at->timestamp,
                'quarter_bid' => getIntervalQuarter($bid->updated_at->timestamp)['number'],
                'year_bid' => date('Y', $bid->updated_at->timestamp),
                'competition_id' => $bid->competition->id,
                'competition_slug' => $bid->competition->slug,
                'competition_name' => $bid->competition->name,
                'competition_img' => $bid->competition->img,
                'short_description' => $bid->competition->short_description,
            ];
        }

        return view('pages.results.index_free', compact('years', 'competitions'));
    }


    public function index_prof($input_year = false)
    {
        $type = 'professional';

        $bids = Bid::where('type', $type)->get();

        // существующие года
        $years = [];
        foreach ($bids->toArray() as $bid) {
            $year = explode('-', $bid['updated_at'])[0];
            $years[$year] = '';
        }

        $years = array_keys($years);
        sort($years, SORT_STRING);
        $current_year = $years[count($years) - 1];
        if ($input_year) {
            $current_year = $input_year;
        }

        $bids = Bid::with('competition')
            ->where('type', $type)
            ->where('processe_state', '0') // Завершённая
            ->where('updated_at', '>', ($current_year - 1) . '-12-31 00:00:00')
            ->where('updated_at', '<', ($current_year + 1) . '-01-01 00:00:00')
            ->get();

        $competitions = [];
        foreach ($bids as $bid) {
            $competitions[$bid->competition->name][] = [
                'date_bid' => $bid->updated_at->timestamp,
                'quarter_bid' => getIntervalQuarter($bid->updated_at->timestamp)['number'],
                'year_bid' => date('Y', $bid->updated_at->timestamp),
                'competition_id' => $bid->competition->id,
                'competition_slug' => $bid->competition->slug,
                'competition_name' => $bid->competition->name,
                'competition_img' => $bid->competition->img,
                'short_description' => $bid->competition->short_description,
            ];
        }

        return view('pages.results.index_prof', compact('years', 'competitions'));
    }


    public function show_free($competition_slug, $year, $quarter = false)
    {
        $type = 'amateur';

        $bids = Bid::where('type', $type)->get();
        // существующие года
        $years = [];
        foreach ($bids->toArray() as $bid) {
            $y = explode('-', $bid['updated_at'])[0];
            $years[$y] = '';
        }
        $years = array_keys($years);
        sort($years, SORT_STRING);


        $competition = Competition::with('ageGroups')->where('slug', $competition_slug)->firstOrFail();

        $bids = Bid::with(['participants', 'ageGroup', 'appraisal']) //->limit(5)
            ->where('type', $type)
            ->where('processe_state', '0') // Завершённая
            /*->where('updated_at', '>', ($year - 1) . '-12-31 00:00:00')
            ->where('updated_at', '<', ($year + 1) . '-01-01 00:00:00')*/
            ->whereHas('competition', function (Builder $query) use ($competition_slug) {
                $query->where('slug', $competition_slug);
            });

        if ($quarter){
            $interval = $this->getQuarter($quarter);
            $start = $year . $interval['start'];
            $end = $year . $interval['end'];

            $bids = $bids->where('updated_at', '>=', $start)
                            ->where('updated_at', '<=', $end);
        }else{
            $bids = $bids->where('updated_at', '>', ($year - 1) . '-12-31 00:00:00')
                ->where('updated_at', '<', ($year + 1) . '-01-01 00:00:00');
        }

        $bids = $bids->get();

        return view('pages.results.show_free', compact('bids', 'competition', 'years'));
    }


    public function show_prof($competition_slug, $year, $quarter = false)
    {
        $type = 'professional';

        $bids = Bid::where('type', $type)->get();
        // существующие года
        $years = [];
        foreach ($bids->toArray() as $bid) {
            $y = explode('-', $bid['updated_at'])[0];
            $years[$y] = '';
        }
        $years = array_keys($years);
        sort($years, SORT_STRING);


        $competition = Competition::with('ageGroups')->where('slug', $competition_slug)->firstOrFail();

        $bids = Bid::with(['participants', 'ageGroup', 'appraisal']) //->limit(5)
        ->where('type', $type)
            ->where('processe_state', '0') // Завершённая
            /*->where('updated_at', '>', ($year - 1) . '-12-31 00:00:00')
            ->where('updated_at', '<', ($year + 1) . '-01-01 00:00:00')*/
            ->whereHas('competition', function (Builder $query) use ($competition_slug) {
                $query->where('slug', $competition_slug);
            });

        if ($quarter){
            $interval = $this->getQuarter($quarter);
            $start = $year . $interval['start'];
            $end = $year . $interval['end'];

            $bids = $bids->where('updated_at', '>=', $start)
                ->where('updated_at', '<=', $end);
        }else{
            $bids = $bids->where('updated_at', '>', ($year - 1) . '-12-31 00:00:00')
                ->where('updated_at', '<', ($year + 1) . '-01-01 00:00:00');
        }

        $bids = $bids->get();
//        dd($bids);

        return view('pages.results.show_prof', compact('bids', 'competition', 'years'));
    }


    private function getQuarter($number)
    {
        if ($number < 1 or $number > 4){
            throw new \Exception('Не коректный номер квартала');
        }

        $intervals = [
            1 => [
                'start' => '-01-01 00:00:00',
                'end' => '-03-31 23:59:59'
            ],
            2 => [
                'start' => '-04-01 00:00:00',
                'end' => '-06-30 23:59:59'
            ],
            3 => [
                'start' => '-07-01 00:00:00',
                'end' => '-09-30 23:59:59'
            ],
            4 => [
                'start' => '-10-01 00:00:00',
                'end' => '-12-31 23:59:59'
            ],
        ];

        return $intervals[$number];
    }
}
