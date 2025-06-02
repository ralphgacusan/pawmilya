<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;


class DonationController extends Controller
{
    public function donationPage(){
        return view('client.donations');
    }

public function submitDonationForm(Request $request)
{
    $amount = str_replace(',', '', $request->input('amount'));
    // Step 1: Validate the request data
    $validatedData = $request->validate([
        'amount' => 'required|min:1', // Make sure amount is a positive number
        'beneficiary' => 'required|string', // Beneficiary field should be a string
        'donation_type' => 'required|in:one-time,monthly', // Donation type must be either one-time or monthly
        'donation_method' => 'required|in:card,bank_transfer,GCash', // Donation method must be one of the options
    ]);

    // Step 2: Create a new donation entry
    $donation = Donation::create([
        'user_id' => Auth::id(), // Get the authenticated user's ID
        'amount' => $amount,
        'beneficiary' => $validatedData['beneficiary'],
        'donation_type' => $validatedData['donation_type'],
        'donation_method' => $validatedData['donation_method'],
    ]);

    // Step 3: Return a response (e.g., redirect to a success page or show a confirmation)
    return redirect()->route('client.home')->with('success', 'Donation successfully submitted!');
}


 public function showAdminDonationPage(Request $request)
{if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $query = Donation::with('user');

    // Filter by search (donor's first or last name)
    if ($request->filled('search')) {
        $search = $request->search;
        $query->whereHas('user', function ($q) use ($search) {
            $q->where('first_name', 'like', '%' . $search . '%')
              ->orWhere('last_name', 'like', '%' . $search . '%');
        });
    }

    // Filter by donation method
    if ($request->filled('donation_method')) {
        $query->where('donation_method', $request->donation_method);
    }

    // Filter by donation type
    if ($request->filled('donation_type')) {
        $query->where('donation_type', $request->donation_type);
    }

    // Sort by creation date
    if ($request->filled('date')) {
        $query->orderBy('created_at', $request->date === 'oldest' ? 'asc' : 'desc');
    } else {
        $query->orderBy('created_at', 'desc'); // default
    }

    // Collect filters
    $filters = $request->only(['search', 'donation_method', 'donation_type', 'date']);

    // Paginate with filters
    $donations = $query->paginate(20)->appends($filters);

    return view('admin.donation-management', compact('donations', 'filters'));
}



// Delete Donation
public function destroyDonation(Donation $donation, Request $request)
{if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $donation->delete();

    return redirect()->route('admin.donation')->with('success', 'Donation record deleted.');
}


// Show Donation Details
public function adminViewDonationDetails($donation_id, Request $request)
{if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $donation = Donation::with('user')->findOrFail($donation_id);
    return view('admin.donation-details', compact('donation'));
}






}
