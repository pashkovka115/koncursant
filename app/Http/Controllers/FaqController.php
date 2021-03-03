<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Question::all();

        return view('pages.faq.index', ['faq' => $faq]);
    }
}
