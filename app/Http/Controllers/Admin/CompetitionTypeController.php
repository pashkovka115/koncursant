<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompetitionType;
use Illuminate\Http\Request;


class CompetitionTypeController extends Controller
{
    public function index()
    {
        return view('admin.competition_types.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(CompetitionType $competitionType)
    {
        //
    }


    public function update(Request $request, CompetitionType $competitionType)
    {
        //
    }


    public function destroy(CompetitionType $competitionType)
    {
        //
    }
}
