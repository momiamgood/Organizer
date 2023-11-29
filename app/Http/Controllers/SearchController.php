<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function number(Request $q): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $number = Number::search($q)->where('user_id', Auth::id())->get();
        return view('search.results', [
            'results' => $number
        ]);
    }

    public function address(Request $q): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $address = Address::search($q)->where('user_id', Auth::id())->get();
        return view('search.results', [
            'results' => $address
        ]);
    }
}
