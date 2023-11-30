<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Yaml\Yaml;

class Login extends Controller
{
    public function show(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if ($request->validated()){
            $user = User::where('username', $request->username)->first();
            if ($user or Hash::check($request['password'], $user->password)){
                Auth::login($user);
                return redirect('/');
            } else return view('auth.login', [
                'errors' => 'Неверно введен логин или пароль'
            ]);
        } else return redirect('/login')->withErrors($request->all());
    }
}
