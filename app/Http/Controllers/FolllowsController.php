<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FolllowsController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function store(User $user){

    return auth()->user()->following()->toggle($user->profile);
    }
}
