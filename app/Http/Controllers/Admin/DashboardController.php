<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
//        return __METHOD__;
        return view('admin.dashboard.index');
//        return view('admin.layouts.app');
    }
}
