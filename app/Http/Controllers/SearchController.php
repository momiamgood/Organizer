<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $q = $request->q;
        $result = Number::where('user_id', Auth::id())
            ->where('number','LIKE',"%{$q}%",'or', 'title','LIKE',"%{$q}%")
            ->get();

        return view('search.results', [
            'results' => $result
        ]);
    }
}
