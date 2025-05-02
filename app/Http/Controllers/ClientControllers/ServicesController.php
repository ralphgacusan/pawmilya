<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function servicesPage(){
        return view('client.services');
    }

    public function serviceForm(){
        return view('client.service-form');

    }
}
