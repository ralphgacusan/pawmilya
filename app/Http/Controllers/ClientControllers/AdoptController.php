<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdoptController extends Controller
{
    public function adoptPage(){
        return view('client.adopt');
    }

    public function adoptFormPage(){
        return view('client.adopt-form');
    }
}
