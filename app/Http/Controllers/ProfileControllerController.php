<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileControllerController extends Controller
{
    //
    public function user_profile(){
        return view('profile');
    }
}
