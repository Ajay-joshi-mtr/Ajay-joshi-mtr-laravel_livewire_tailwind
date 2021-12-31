<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.users.index', ['user' => auth()->user()]);
    }

    public function getUser($user)
    {
        $user = User::where('id', $user)->first();
        return view('profile.users.index', ['user' => $user]);
    }
}
