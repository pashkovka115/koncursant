<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /*
     * Профессиональные конкурсы
     */
    public function index()
    {
        $competitions = Competition::with(['ageGroups', 'nominations'])->whereHas('type', function ($query){
            $query->where('type', 'professional');
        })->get();

        return view('pages.competitions.index', compact('competitions'));
    }


    public function indexFree()
    {
        $competitions = Competition::with(['ageGroups', 'nominations'])->whereHas('type', function ($query){
            $query->where('type', 'amateur');
        })->get();

        return view('pages.competitions.index_free', compact('competitions'));
    }
}
