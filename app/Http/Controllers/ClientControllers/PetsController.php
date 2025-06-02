<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Storage;


class PetsController extends Controller
{
    public function pets(Request $request)
    {
        $query = Pet::query();

            $query->where('status', 'available');

        // Normalize and filter pet type
        if ($request->filled('petType') && strtolower($request->petType) !== 'all') {
            $petType = strtolower($request->petType);
            $query->whereRaw('LOWER(type) = ?', [$petType]);
        }

        // Normalize and filter breed
        if ($request->filled('breed') && strtolower($request->breed) !== 'all') {
            $breed = strtolower(str_replace(' ', '_', $request->breed));
            $query->whereRaw('REPLACE(LOWER(breed), " ", "_") = ?', [$breed]);
        }

        // Filter gender without modification
        if ($request->filled('gender') && strtolower($request->gender) !== 'all') {
            $query->where('gender', $request->gender);
        }

        // Filter by adoption date (Oldest / Newest)
        if ($request->filled('dateAdded') && strtolower($request->dateAdded) !== 'all') {
            $dateAdded = strtolower($request->dateAdded);
            if ($dateAdded === 'oldest') {
                $query->orderBy('created_at', 'asc'); // Order by the oldest first
            } elseif ($dateAdded === 'newest') {
                $query->orderBy('created_at', 'desc'); // Order by the newest first
            }
        }

        // Get paginated pets (e.g., 20 per page)
        // Ensure pagination happens after all filters and sorting are applied
        $pets = $query->paginate(20);

        return view('client.pets', compact('pets'));
    }

    public function specificPetsPage(Request $request){
        $petId = $request->query('id');
        $pet = Pet::findOrFail($petId);
        
        return view('client.specific-pet', compact('pet'));
    }



    public function showAdminPetPage(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $query = Pet::query();

    // Filter by search name
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filter by type
    if ($request->filled('type') && $request->type !== 'all') {
        $query->where('type', $request->type);
    }

    // Filter by status
    if ($request->filled('status') && $request->status !== 'all') {
        $query->where('status', $request->status);
    }

    // Sort by created_at
    if ($request->filled('date')) {
        $query->orderBy('created_at', $request->date === 'oldest' ? 'asc' : 'desc');
    }

    // Get all filters
    $filters = $request->only(['type', 'status', 'date', 'search']);

    // Pagination with filters
    $pets = $query->paginate(20)->appends($filters);
    
    return view('admin.pet-management', compact('pets'))->with('filters', $filters);
}


public function adminAddPet(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $validated = $request->validate([
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
        'image' => 'required|file|image|max:2048',
    ]);

    $validated['image'] = $request->file('image')->store('images', 'public');

    Pet::create($validated);
    // Redirect or return response after successfully adding the pet
    return redirect()->route('admin.pet')->with('success', 'Pet added successfully!');
    
}

public function adminViewPet(Request $request) {
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $petId = $request->query('id');
    $pet = Pet::findOrFail($petId);
        
    return view('admin.pet-details', compact('pet'));
}

// Update Pet Image
public function updatePetImage(Request $request, Pet $pet)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $request->validate([
        'image' => 'required|image|max:2048',
    ]);

    // Delete old image if it exists
    if ($pet->image && Storage::exists('public/' . $pet->image)) {
        Storage::delete('public/' . $pet->image);
    }

    // Store new image
    $path = $request->file('image')->store('pets', 'public');
    $pet->update(['image' => $path]);

    return back()->with('success', 'Pet profile picture updated.');
}

// Remove Pet Image
public function removePetImage(Pet $pet, Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    if ($pet->image && Storage::exists('public/' . $pet->image)) {
        Storage::delete('public/' . $pet->image);
    }

    $pet->image = null;
    $pet->save();

    return back()->with('success', 'Pet profile picture removed.');
}



// Edit Pet Page
public function editPet(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $petId = $request->query('id');
    $pet = Pet::findOrFail($petId);
    return view('admin.pet-edit', compact('pet'));
}


public function updatePet(Request $request, Pet $pet)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
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
    ]);

    $pet->update($request->all());

    return redirect()->route('admin.pet', $pet->id)->with('success', 'Pet profile updated.');
}


// Delete Pet
public function destroyPet(Pet $pet, Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    if ($pet->image && Storage::exists('public/' . $pet->image)) {
        Storage::delete('public/' . $pet->image);
    }

    $pet->delete();

    return redirect()->route('admin.pet')->with('success', 'Pet record deleted.');
}

}
