<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('doc.index');
    }
    public function share()
    {
        return view('doc.share');
    }
}