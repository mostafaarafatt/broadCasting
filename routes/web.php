<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = User::find(1);

    Auth::login($user);

    return view('welcome', [
        'user' => $user
    ]);
});
