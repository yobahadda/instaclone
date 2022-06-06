<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FolllowsController extends Controller
{
    public function store(User $user){

    return  $user->username;
    }
}
