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
$pets = Pet::where('status', 'available')->paginate(20);    
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


    public function showAdminAdopApplicationPage(Request $request)
    {
        if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
        $query = Adoption::with(['user', 'pet']);
    
        // Filter by search (applicant's first or last name)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        }
    
        // Filter by status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
    
        // Sort by creation date
        if ($request->filled('date')) {
            $query->orderBy('created_at', $request->date === 'oldest' ? 'asc' : 'desc');
        } else {
            $query->orderBy('created_at', 'desc'); // default
        }
    
        // Collect filters
        $filters = $request->only(['search', 'status', 'date']);
    
        // Paginate with filters
        $adoptions = $query->paginate(20)->appends($filters);
    
        return view('admin.adoption-applications', compact('adoptions', 'filters'));
    }


    // Delete Adoption Application
    public function destroyAdoptionApplication(Adoption $adoption , Request $request)
{if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }

    $adoption->delete();

    return redirect()->route('admin.adopt-application')->with('success', 'Adoption Application record deleted.');
}


// Show Adoption Details
public function adminViewAdoptionDetails($adoption_id, Request $request) {
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $adoption = Adoption::findOrFail($adoption_id);
    return view('admin.adoption-details', compact('adoption'));
}


// Show Edit Page
// Edit Pet Page
public function editAdoptionApplication($adoption_id, Request $request)
{if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }

    $adoption = Adoption::findOrFail($adoption_id);
    return view('admin.adoption-edit', compact('adoption'));
}

    // Update Adoption Application (Date, Time, and Status only)
public function updateAdoptionApplication(Request $request, Adoption $adoption)
{if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $request->validate([
        'meet_up_date' => 'required|date|after_or_equal:today',
        'meet_up_time' => 'required|string',
        'status' => 'required|string|in:pending,approved,rejected,completed',
    ]);

    // Convert the meet_up_time from 12-hour AM/PM format to 24-hour format
    $meetUpTime = Carbon::createFromFormat('h:i A', $request->input('meet_up_time'))->format('H:i');


    $adoption->update([
        'meet_up_date' => $request->meet_up_date,
        'meet_up_time' => $meetUpTime,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.adopt-application', $adoption->adoption_id)
        ->with('success', 'Adoption Application updated.');
}

}
