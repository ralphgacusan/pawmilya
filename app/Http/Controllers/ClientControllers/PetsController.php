<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetsController extends Controller
{
    public function pets(Request $request)
    {
        $query = Pet::query();

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
}
