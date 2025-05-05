<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceAppointment;

use Carbon\Carbon;


class ServicesController extends Controller
{
    public function servicesPage(){
        $services = Service::all();
        return view('client.services', compact('services'));   
    }

    public function serviceForm(Request $request){
        $serviceId = $request->query('id');
        // Use where if your PK is not `id`
        $service = Service::where('service_id', $serviceId)->firstOrFail();
        return view('client.service-form', compact('service'));

    }
    public function submitServiceForm(Request $request) {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,service_id',
            'user_id' => 'required|exists:users,id',
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'pet_breed' => 'required|string|max:255',
            'pet_weight' => 'required|numeric|min:0',
            'pet_age' => 'required|integer|min:0',
            'date' => 'required|date',
            'time' => 'required',
        ]);
         // Convert the meet_up_time from 12-hour AM/PM format to 24-hour format
        $meetUpTime = Carbon::createFromFormat('h:i A', $request->input('time'))->format('H:i');

         // Add the converted meet_up_time to the validated data array
        $validated['time'] = $meetUpTime;
    
        $appointment = ServiceAppointment::create($validated);
    
        return redirect()->route('client.services')->with('success', 'Appointment booked successfully!');

    }

}
