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
use App\Http\Controllers\ClientControllers\AdminController;



// Admin Controllers
use App\Http\Controllers\AdminControllers\AdminPetController;







// Authentication
// Sign in Page
Route::get('/signin', [AuthController::class, 'signinPage'])->name('auth.signin');
// For Middleware Log in
Route::get('/sign-in', [AuthController::class, 'redirectToSignin'])->name('login');
// Sign up Page
Route::get('/signup', [AuthController::class, 'signupPage'])->name('auth.signup');
// Sign in Submit
Route::post('/signin', [AuthController::class, 'signin'])->name('auth.submit.signin');
// Sign up Submit
Route::post('/signup', [AuthController::class, 'signup'])->name('auth.submit.signup');
// Log out
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
// Show User Profile
Route::get('/user-profile', [AuthController::class, 'showUserProfile'])->name('auth.user-profile')->middleware('auth');
// Upload profile picture
Route::put('/account/image', [AuthController::class, 'updateImage'])->name('auth.updateImage')->middleware('auth');
// Delete Profile Picture
Route::delete('/account/image', [AuthController::class, 'removeImage'])->name('auth.removeImage')->middleware('auth');
// Update Profile
Route::get('/account/edit', [AuthController::class, 'editProfile'])->name('auth.user.edit')->middleware('auth');
Route::put('/account/update', [AuthController::class, 'updateProfile'])->name('auth.user.update')->middleware('auth');
// Delete User Account
Route::delete('/account/delete', [AuthController::class, 'destroy'])->name('auth.user.delete')->middleware('auth');



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
Route::get('/adopt-form', [AdoptController::class, 'adoptFormPage'])->name('client.adopt-form')->middleware('auth');
// Submit Adoption
Route::post('/adopt-submit', [AdoptController::class, 'adoptSubmit'])->name('client.adopt-submit')->middleware('auth');



// Rehome
// Rehome Page
Route::get('/rehome', [RehomeController::class, 'rehomePage'])->name('client.rehome');
// Rehome Form
Route::get('/rehome-form', [RehomeController::class, 'rehomeFormPage'])->name('client.rehome-form')->middleware('auth');
// Submit Rehome Form
Route::post('/rehome-form/submit', [RehomeController::class, 'submitRehomeForm'])->name('client.rehome-submit')->middleware('auth');




// Donation Page
Route::get('/donation', [DonationController::class, 'donationPage'])->name('client.donation')->middleware('auth');
Route::post('/donation-submit', [DonationController::class, 'submitDonationForm'])->name('client.donation-submit')->middleware('auth');





//Services
// Services Page
Route::get('/services', [ServicesController::class, 'servicesPage'])->name('client.services');
// Service From 
Route::get('/service-form', [ServicesController::class, 'serviceForm'])->name('client.service-form')->middleware('auth')->middleware('auth');
// Submit Service Form
Route::post('/service-form/submit', [ServicesController::class, 'submitServiceForm'])->name('client.submit.service')->middleware('auth');


// About Page
Route::get('/about', [AboutController::class, 'aboutPage'])->name('client.about');




// ADMIN
// Log out
Route::post('/admin/logout', [AuthController::class, 'adminLogOut'])->name('admin.logout');


// Pets Page
Route::get('/admin', [PetsController::class, 'showAdminPetPage'])->name('admin.pet');
// Add Pet
Route::post('/admin/add-pet', [PetsController::class, 'adminAddPet'])->name('admin.add-pet');
// View Pet
Route::get('/admin/pet-details', [PetsController::class, 'adminViewPet'])->name('admin.view-pet');
//edit  Pet
Route::get('/admin/pet-edit', [PetsController::class, 'editPet'])->name('admin.edit-pet');
Route::put('/admin/pet-update/{pet}', [PetsController::class, 'updatePet'])->name('admin.update-pet');

// Route for updating pet image (PUT request, since your form uses @method('PUT'))
Route::put('/admin/pets/{pet}/update-image', [PetsController::class, 'updatePetImage'])->name('admin.pet.update-image');

// Route for removing pet image (DELETE request)
Route::delete('/admin/pets/{pet}/remove-image', [PetsController::class, 'removePetImage'])->name('admin.pet.remove-image');

// Delete Pet
Route::delete('/client/pets/{pet}', [PetsController::class, 'destroyPet'])->name('client.delete-pet');




// Users Page
Route::get('/admin/users', [AuthController::class, 'showAdminUserPage'])->name('admin.user');
// Delete User
Route::delete('/client/users/{user}', [AuthController::class, 'destroyUser'])->name('client.delete-user');





// Adoption Application Page
Route::get('/admin/adoption-applications', [AdoptController::class, 'showAdminAdopApplicationPage'])->name('admin.adopt-application');
// Delete Adoption Application
Route::delete('/client/adoption-applications/{adoption}', [AdoptController::class, 'destroyAdoptionApplication'])->name('client.delete-adoption');
// View Adoption Details
Route::get('/admin/adoption-applications/details/{adoption_id}', [AdoptController::class, 'adminViewAdoptionDetails'])->name('admin.adoption-details');
// Show Adoption Edit Page
Route::get('/admin/adoption-applications/edit/{adoption_id}', [AdoptController::class, 'editAdoptionApplication'])->name('admin.adoption-edit');
// Update Adoption Application
Route::put('/admin/adoption-applications/update/{adoption}', [AdoptController::class, 'updateAdoptionApplication'])->name('admin.update-adoption');





// Rehome Application Page
Route::get('/admin/rehome-applications', [RehomeController::class, 'showAdminRehomeApplicationPage'])->name('admin.rehome-application');
// Delete Rehome Application
Route::delete('/admin/rehome-applications/{rehome}', [RehomeController::class, 'destroyRehomeApplication'])->name('client.delete-rehome');
// View Rehome Details
Route::get('/admin/rehome-applications/details/{rehome_id}', [RehomeController::class, 'adminViewRehomeDetails'])->name('admin.rehome-details');

// Route for updating pet image (PUT request, since your form uses @method('PUT'))
Route::put('/admin/rehome-applications/{rehomePet}/update-image', [RehomeController::class, 'updateRehomePetImage'])->name('admin.rehome-pet.update-image');

// Route for removing pet image (DELETE request)
Route::delete('/admin/rehome-applications/{rehomePet}/remove-image', [RehomeController::class, 'removeRehomePetImage'])->name('admin.rehome-pet.remove-image');

// Show Adoption Edit Page
Route::get('/admin/rehome-applications/edit/{rehome_id}', [RehomeController::class, 'editRehomeApplication'])->name('admin.rehome-edit');

// Update Adoption Application
Route::put('/admin/rehome-applications/update/{rehome}', [RehomeController::class, 'updateRehomeApplication'])->name('admin.update-rehome');




// Donation Page
Route::get('/admin/donations', [DonationController::class, 'showAdminDonationPage'])->name('admin.donation');
// Delete Donation
Route::delete('/admin/donations/{donation}', [DonationController::class, 'destroyDonation'])->name('admin.delete-donation');
// View Donation Details
Route::get('/admin/donation/details/{donation_id}', [DonationController::class, 'adminViewDonationDetails'])->name('admin.donation-details');



// Services Page
Route::get('/admin/services', [ServicesController::class, 'showAdminServicePage'])->name('admin.service');
// Delete Service
Route::delete('/client/services/{service}', [ServicesController::class, 'destroyService'])->name('admin.delete-service');
// Show service edit page
Route::get('/admin/service-edit', [ServicesController::class, 'editService'])->name('admin.edit-service');
// update service
Route::put('/admin/service-update/{service}', [ServicesController::class, 'updateService'])->name('admin.update-service');
// Show add service page
Route::get('/admin/service-add', [ServicesController::class, 'showAdminAddService'])->name('admin.add-service-page');
// Add Service
Route::post('/admin/add-service', [ServicesController::class, 'adminAddService'])->name('admin.add-service');



// Service Appointment Page
Route::get('/admin/services/appointments', [ServicesController::class, 'showAdminServiceAppointmentsPage'])->name('admin.service-appointments');
// Delete Service Appointment
Route::delete('/client/services/appointments/{appointment}', [ServicesController::class, 'destroyServiceAppointment'])->name('admin.delete-service-appointment');
// View Appointment Details
Route::get('/admin/services/details/{appointment_id}', [ServicesController::class, 'adminViewServiceAppointmentDetails'])->name('admin.appointment-details');
// Show service appointment edit page
Route::get('/admin/service-appointment-edit', [ServicesController::class, 'editServiceAppointment'])->name('admin.edit-service-appointment');
// UpdateService appointment
Route::put('/admin/services/appointments/update/{appointment}', [ServicesController::class, 'updateServiceAppointment'])->name('admin.update-service-appointment');