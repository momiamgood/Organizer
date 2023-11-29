<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetRequest;
use App\Models\Meet;
use Illuminate\Support\Facades\Auth;

class MeetController extends Controller
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
        return view('main.meet.index', [
            'meets' => Auth::user()->meets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main.meet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeetRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();
        Meet::create([
            'title' => $data['title'],
            'date' => $data['date'],
            'time' => $data['time'],
            'desc' => $data['desc'],
            'user_id' => Auth::id()
        ]);
        return redirect('meet');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meet $meet): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $meet = Meet::where('id', $meet->id)->where('user_id', Auth::id())->first();
        return view('main.meet.show', [
            'meet' => $meet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meet $meet): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main.meet.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MeetRequest $request, Meet $meet): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $meet->update($request->validated());
        return redirect("/meet/{$meet->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meet $Meet): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $Meet->delete();
        return redirect('/meet');
    }
}
