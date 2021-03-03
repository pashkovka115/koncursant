<?php

namespace App\Http\Controllers;

use App\Models\Jury;
use Illuminate\Http\Request;

class JuryController extends Controller
{
    public function index()
    {
        $jury = Jury::all();

        return view('pages.jury.index', ['jury' => $jury]);
    }


    public function show($slug)
    {
        $person = Jury::where('slug', $slug)->firstOrFail();

        return view('pages.jury.show', ['person' => $person]);
    }
}
