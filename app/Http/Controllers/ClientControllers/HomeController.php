<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class HomeController extends Controller
{
    
    public function homePage(){
        $pets = Pet::orderBy('created_at', 'asc')->take(3)->get();
    
        return view('client.home', compact('pets'));
    }
    
}
