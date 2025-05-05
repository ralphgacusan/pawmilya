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

}
