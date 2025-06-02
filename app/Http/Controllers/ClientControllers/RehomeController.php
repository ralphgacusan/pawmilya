<?php


namespace App\Http\Controllers\ClientControllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rehome;
use App\Models\RehomePet;
use Illuminate\Support\Facades\Storage;
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


// Show Rehome Application Page
public function showAdminRehomeApplicationPage(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $query = Rehome::with(['user', 'rehomePet']); // eager load both user and pet

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
    $rehomes = $query->paginate(20)->appends($filters);

    return view('admin.rehome-applications', compact('rehomes', 'filters'));
}


public function destroyRehomeApplication(Rehome $rehome, Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    // Delete the associated rehome pet image from storage
    if ($rehome->rehomePet) {
        $rehomePet = $rehome->rehomePet;

        // Check if image exists before deleting
        if ($rehomePet->image && Storage::exists($rehomePet->image)) {
            Storage::delete($rehomePet->image);
        }

        // Delete the pet record
        $rehomePet->delete();
    }

    // Delete the rehome application record
    $rehome->delete();

    return redirect()->route('admin.rehome-application')
        ->with('success', 'Rehome Application and associated pet have been deleted.');
}


// Show Adoption Details
public function adminViewRehomeDetails($rehome_id, Request $request) {
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $rehome = Rehome::findOrFail($rehome_id);
    return view('admin.rehome-details', compact('rehome'));
}


// Update Rehome Pet Image
public function updateRehomePetImage(Request $request, RehomePet $rehomePet)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $request->validate([
        'image' => 'required|image|max:2048',
    ]);

    // Delete old image if it exists
    if ($rehomePet->image && Storage::exists('public/' . $rehomePet->image)) {
        Storage::delete('public/' . $rehomePet->image);
    }

    // Store new image
    $path = $request->file('image')->store('rehome_pets', 'public');
    $rehomePet->update(['image' => $path]);

    return back()->with('success', 'Rehome pet profile picture updated.');
}

// Remove Rehome Pet Image
public function removeRehomePetImage(RehomePet $rehomePet, Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    if ($rehomePet->image && Storage::exists('public/' . $rehomePet->image)) {
        Storage::delete('public/' . $rehomePet->image);
    }

    $rehomePet->image = null;
    $rehomePet->save();

    return back()->with('success', 'Rehome pet profile picture removed.');
}


// Show Rehome Application Edit Page
public function editRehomeApplication($rehome_id, Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $rehome = Rehome::findOrFail($rehome_id);
    return view('admin.rehome-edit', compact('rehome'));
}

public function updateRehomeApplication(Request $request, Rehome $rehome)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $request->validate([
        // RehomePet fields
        'name' => 'required|string|max:255',
        'type' => 'required|string|in:dog,cat,exotic,special_needs,others',
        'breed' => 'required|string|max:255',
        'birth_date' => 'required|date|before_or_equal:today',
        'gender' => 'required|string|in:male,female',
        'height' => 'required|string|max:255',
        'weight' => 'required|string|max:255',
        'temperament' => 'nullable|string|max:255',
        'good_with' => 'nullable|string|max:255',
        'spayed_neutered_status' => 'required|string|in:yes,no',
        'vaccination_status' => 'required|string|in:yes,no',
        'existing_conditions' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',

        // Rehome schedule/status
        'meet_up_date' => 'required|date|after_or_equal:today',
        'meet_up_time' => 'required|string',
        'status' => 'required|string|in:pending,approved,rejected,completed',
    ]);

    // Format time to 24-hour format
    $meetUpTime = Carbon::createFromFormat('h:i A', $request->input('meet_up_time'))->format('H:i');

    // Update rehome_pet info
    $rehome->rehomePet->update([
        'name' => $request->name,
        'type' => $request->type,
        'breed' => $request->breed,
        'birth_date' => $request->birth_date,
        'gender' => $request->gender,
        'height' => $request->height,
        'weight' => $request->weight,
        'temperament' => $request->temperament,
        'good_with' => $request->good_with,
        'spayed_neutered_status' => $request->spayed_neutered_status,
        'vaccination_status' => $request->vaccination_status,
        'existing_conditions' => $request->existing_conditions,
        'description' => $request->description,
    ]);

    // Update rehome application info
    $rehome->update([
        'meet_up_date' => $request->meet_up_date,
        'meet_up_time' => $meetUpTime,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.rehome-application', $rehome->rehome_id)
        ->with('success', 'Rehome Application updated successfully.');
}


}