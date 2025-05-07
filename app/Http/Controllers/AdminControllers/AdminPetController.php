<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPetController extends Controller
{
    public function showAdminPetPage(){
        return view('admin.pet-management');
    }
}
