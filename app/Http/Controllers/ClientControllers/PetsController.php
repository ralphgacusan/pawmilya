<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function petsPage(){
        return view('client.pets');
    }
}
