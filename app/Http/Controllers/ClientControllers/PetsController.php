<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetsController extends Controller
{
    public function pets(){
        $pets = Pet::all();

        return view('client.pets', compact('pets'));
    }

    public function specificPetsPage(){
        return view('client.specific-pet');
    }
}
