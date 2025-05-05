<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Adoption;
use Carbon\Carbon;



class AdoptController extends Controller
{
    public function adoptPage(){
        // Paginate the pets, 20 per page
        $pets = Pet::paginate(20);
    
        return view('client.adopt', ['pets' => $pets]);
    }

    public function adoptFormPage(Request $request){
        $petId = $request->query('id');
        $pet = Pet::findOrFail($petId);
        
        return view('client.adopt-form', compact('pet'));
    }

        public function adoptSubmit(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pet_id' => 'required|exists:pets,id',
            'meet_up_date' => 'required|date|after_or_equal:today',
            'meet_up_time' => 'required', // ensure the time format is valid
        ]);

        // Convert the meet_up_time from 12-hour AM/PM format to 24-hour format
        $meetUpTime = Carbon::createFromFormat('h:i A', $request->input('meet_up_time'))->format('H:i');

        // Add the converted meet_up_time to the validated data array
        $validated['meet_up_time'] = $meetUpTime;

        // Create the Adoption entry
        Adoption::create($validated);

        // Redirect with success message
        return redirect()->route('client.adopt')->with('success', 'Adoption request submitted successfully.');
    }

}
