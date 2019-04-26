<?php

namespace App\Http\Controllers;

use App\Ad;

class IndexController extends Controller
{
    public function index()
    {
        $ads = Ad::orderBy('id', 'desc')->paginate(Ad::COUNT_PAGINATE);
        $user = auth()->user();

        return view('welcome', compact('ads', 'user'));
    }
}
