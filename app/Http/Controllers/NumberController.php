<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberRequest;
use App\Models\Number;
use Illuminate\Support\Facades\Auth;

class NumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main.number.index', [
            'numbers' => Auth::user()->numbers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main.number.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NumberRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();
        Number::create([
            'title' => $data['title'],
            'number' => $data['number'],
            'user_id' => Auth::id()
        ]);
        return redirect('number');
    }

    /**
     * Display the specified resource.
     */
    public function show(Number $number): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $number = Number::where('id', $number->id)->where('user_id', Auth::id())->first();
        return view('main.number.show', [
           'number' => $number
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Number $number): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main.number.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NumberRequest $request, Number $number): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $number->update($request->validated());
        return redirect("/number/{$number->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Number $number): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $number->delete();
        return redirect('/number');
    }
}
