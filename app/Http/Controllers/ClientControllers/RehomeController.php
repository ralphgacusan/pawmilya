<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RehomeController extends Controller
{
    public function rehomePage(){
        return view('client.rehome');
    }

    public function rehomeFormPage(){
        return view('client.rehome-form');
    }
}
