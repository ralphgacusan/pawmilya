<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientControllers\HomeController;
use App\Http\Controllers\ClientControllers\PetsController;
use App\Http\Controllers\ClientControllers\AdoptController;
use App\Http\Controllers\ClientControllers\RehomeController;
use App\Http\Controllers\ClientControllers\DonationController;
use App\Http\Controllers\ClientControllers\ServicesController;
use App\Http\Controllers\ClientControllers\AboutController;






// Index Page
Route::get('/', [HomeController::class, 'homePage'])->name('client.home');

// Pets Page
Route::get('/pets', [PetsController::class, 'petsPage'])->name('client.pets');

// Adopt Page
Route::get('/adopt', [AdoptController::class, 'adoptPage'])->name('client.adopt');

// Rehome Page
Route::get('/rehome', [RehomeController::class, 'rehomePage'])->name('client.rehome');

// Donation Page
Route::get('/donation', [DonationController::class, 'donationPage'])->name('client.donation');

// Services Page
Route::get('/services', [ServicesController::class, 'servicesPage'])->name('client.services');

// About Page
Route::get('/about', [AboutController::class, 'aboutPage'])->name('client.about');