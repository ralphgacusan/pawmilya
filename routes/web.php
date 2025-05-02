<?php

use Illuminate\Support\Facades\Route;
// Client Controllers
use App\Http\Controllers\ClientControllers\HomeController;
use App\Http\Controllers\ClientControllers\PetsController;
use App\Http\Controllers\ClientControllers\AdoptController;
use App\Http\Controllers\ClientControllers\RehomeController;
use App\Http\Controllers\ClientControllers\DonationController;
use App\Http\Controllers\ClientControllers\ServicesController;
use App\Http\Controllers\ClientControllers\AboutController;
use App\Http\Controllers\ClientControllers\AuthController;


// Admin Controllers
use App\Http\Controllers\AdminControllers\DashboardController;





// Authentication
// Sign in Page
Route::get('/signin', [AuthController::class, 'signinPage'])->name('auth.signin');
// Sign up Page
Route::get('/signup', [AuthController::class, 'signupPage'])->name('auth.signup');
// Sign in Submit
Route::post('/signin', [AuthController::class, 'signin'])->name('auth.submit.signin');
// Sign up Submit
Route::post('/signup', [AuthController::class, 'signup'])->name('auth.submit.signup');
// Log out
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Index Page
Route::get('/', [HomeController::class, 'homePage'])->name('client.home');




// Pets
// Pets Page
Route::get('/pets', [PetsController::class, 'pets'])->name('client.pets');
//Specific Pet Page
Route::get('/specific-pet', [PetsController::class, 'specificPetsPage'])->name('client.specific-pet');





// Adopt
// Adopt Page
Route::get('/adopt', [AdoptController::class, 'adoptPage'])->name('client.adopt');
// Adoption Form 
Route::get('/adopt-form', [AdoptController::class, 'adoptFormPage'])->name('client.adopt-form');


// Rehome
// Rehome Page
Route::get('/rehome', [RehomeController::class, 'rehomePage'])->name('client.rehome');
// Rehome Form
Route::get('/rehome-form', [RehomeController::class, 'rehomeFormPage'])->name('client.rehome-form');




// Donation Page
Route::get('/donation', [DonationController::class, 'donationPage'])->name('client.donation');




//Services
// Services Page
Route::get('/services', [ServicesController::class, 'servicesPage'])->name('client.services');
// Service From 
Route::get('/service-form', [ServicesController::class, 'serviceForm'])->name('client.service-form');



// About Page
Route::get('/about', [AboutController::class, 'aboutPage'])->name('client.about');




// ADMIN

// Dashboard
// Show Dashboard Page
Route::get('/admin', [DashboardController::class, 'showDashboardPage'])->name('admin.dashboard');
