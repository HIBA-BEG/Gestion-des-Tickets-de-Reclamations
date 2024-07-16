<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView()
    {
        $id = auth()->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('profile.showProfile', compact('user'));
    }
}
