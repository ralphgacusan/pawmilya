<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rehome;
use App\Models\RehomePet;
use Carbon\Carbon;

class RehomeController extends Controller
{
    public function rehomePage(){
        return view('client.rehome');
    }

    public function rehomeFormPage(){
        return view('client.rehome-form');
    }

    public function submitRehomeForm(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'type' => 'required|string|max:255',
        'breed' => 'required|string|max:255',
        'gender' => 'required|string|max:10',
        'height' => 'required|numeric',
        'weight' => 'required|numeric',
        'temperament' => 'nullable|string',
        'good_with' => 'nullable|string',
        'spayed_neutered_status' => 'required|string|max:20',
        'vaccination_status' => 'nullable|string|max:20',
        'existing_conditions' => 'nullable|string',
        'description' => 'required|string',
        'status' => 'string|max:20',
        'image' => 'required',
        'meet_up_date' => 'required|date',
        'meet_up_time' => 'required|',
    ]);

    // Convert the meet_up_time from 12-hour AM/PM format to 24-hour format
    $meetUpTime = Carbon::createFromFormat('h:i A', $request->input('meet_up_time'))->format('H:i');

    $imagePath = null;
    // Handle the pet image upload if present
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // Create a new RehomePet entry
    $rehomePet = RehomePet::create([
        'name' => $request->input('name'),
        'birth_date' => $request->input('birth_date'),
        'type' => $request->input('type'),
        'breed' => $request->input('breed'),
        'gender' => $request->input('gender'),
        'height' => $request->input('height'),
        'weight' => $request->input('weight'),
        'temperament' => $request->input('temperament'),
        'good_with' => $request->input('good_with'),
        'spayed_neutered_status' => $request->input('spayed_neutered_status'),
        'vaccination_status' => $request->input('vaccination_status'),
        'existing_conditions' => $request->input('existing_conditions'),
        'description' => $request->input('description'),
        'status' => $request->input('status'),
        'image' => $imagePath,
    ]);

    // Create a new Rehome entry
    Rehome::create([
        'user_id' => auth()->id(), // assuming the user is authenticated
        'rehome_pet_id' => $rehomePet->id,
        'meet_up_date' => $request->input('meet_up_date'),
        'meet_up_time' => $meetUpTime,
    ]);

    // Return a response (could be redirect, or anything else)
    return redirect()->route('client.rehome')->with('success', 'Pet rehoming information has been submitted successfully.');
    dd($request->all(), $request->file('image'));
}
}
