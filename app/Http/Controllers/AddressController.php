<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
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
        return view('main.address.index', [
            'addresses' => Auth::user()->addresses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();
        Address::create([
            'title' => $data['title'],
            'address' => $data['address'],
            'user_id' => Auth::id()
        ]);
        return redirect('address');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $address = Address::where('id', $address->id)->first();
        return view('main.address.show', [
            'address' => $address
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main.address.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Address $address): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $address->update($request->validated());
        return redirect("/address/{$address->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $address->delete();
        return redirect('/address');
    }
}
