<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceAppointment;
use Illuminate\Support\Facades\Storage;


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


   public function showAdminServicePage(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $query = Service::query();

    // Filter by search (service name)
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->input('search') . '%');
    }

    // Sort by creation date
    if ($request->filled('date')) {
        $sortDirection = $request->input('date') === 'oldest' ? 'asc' : 'desc';
        $query->orderBy('created_at', $sortDirection);
    } else {
        // Optional: default sort
        $query->orderBy('created_at', 'desc');
    }

    // Capture filters to persist in pagination links
    $filters = $request->only(['search', 'date']);

    // Paginate with filters
    $services = $query->paginate(20)->appends($filters);

    return view('admin.services-management', compact('services'))->with('filters', $filters);
}

public function destroyService(Service $service, Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    if ($service->image && Storage::exists('public/' . $service->image)) {
        Storage::delete('public/' . $service->image);
    }

    $service->delete();

    return redirect()->route('admin.service')->with('success', 'Service record deleted.');
}

public function editService(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $serviceId = $request->query('id'); // 'id' is still valid since it's from the query string
    $service = Service::findOrFail($serviceId); // This now uses 'service_id' because of model change
    return view('admin.service-edit', compact('service'));
}

public function updateService(Request $request, Service $service)
    {
        if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'schedule' => 'required|string',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && Storage::exists('public/' . $service->image)) {
                Storage::delete('public/' . $service->image);
            }

            $imagePath = $request->file('image')->store('services', 'public');
            $validated['image'] = $imagePath;
        }

        $service->update($validated);

        return redirect()->route('admin.service')->with('success', 'Service record updated.');
    }

public function adminAddService(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    // Validate the incoming data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'schedule' => 'required|string',
        'duration' => 'required|numeric',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048', // Adjust max size as needed
    ]);

    // Handle the image upload if provided
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('service_images', 'public');
    }

    // Create the service in the database
    Service::create($validated);

    // Redirect or return response after successfully adding the service
    return redirect()->route('admin.service')->with('success', 'Service added successfully!');
}


public function showAdminAddService(Request $request) {
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    return view('admin.service-add');
}



public function showAdminServiceAppointmentsPage(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $query = ServiceAppointment::with(['user', 'service']);

    

   if ($request->filled('search')) {
    $search = $request->search;
    $query->whereHas('service', function ($q) use ($search) {
        $q->where('name', 'like', '%' . $search . '%');
    });
}

    // Sort by appointment date
    if ($request->filled('date') && in_array($request->date, ['oldest', 'latest'])) {
        $query->orderBy('date', $request->date === 'oldest' ? 'asc' : 'desc');
    } else {
        $query->orderBy('date', 'desc'); // default
    }

    // Collect filters
    $filters = $request->only(['search', 'service', 'date']);

    // Paginate with filters
    $appointments = $query->paginate(20)->appends($filters);

    return view('admin.service-appointments', compact('appointments', 'filters'));
}



    // Delete Adoption Application
    public function destroyServiceAppointment(ServiceAppointment $appointment, Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }

    $appointment->delete();

    return redirect()->route('admin.service-appointments')->with('success', 'Service Appointment record deleted.');
}

// Show appoijtment Details
public function adminViewServiceAppointmentDetails($appointment_id, Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $appointment = ServiceAppointment::with(['user', 'service'])->findOrFail($appointment_id);
    return view('admin.service-appointment-details', compact('appointment'));
}


public function editServiceAppointment(Request $request)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $appointmentId = $request->query('id'); // Fetching 'id' from the query string
    $appointment = ServiceAppointment::with(['user', 'service'])->findOrFail($appointmentId); // Fetching the service appointment by ID
    return view('admin.service-appointment-edit', compact('appointment'));
}


public function updateServiceAppointment(Request $request, ServiceAppointment $appointment)
{
    if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    // Validate the incoming request data
    $request->validate([
        'pet_name' => 'required|string|max:255',
        'pet_type' => 'required|string|max:255',
        'pet_breed' => 'required|string|max:255',
        'pet_weight' => 'required|numeric',
        'pet_age' => 'required|numeric',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required|string',
    ]);

    // Convert the time from 12-hour AM/PM format to 24-hour format
    $appointmentTime = Carbon::createFromFormat('h:i A', $request->input('time'))->format('H:i');

    // Update the service appointment with the new values
    $appointment->update([
        'pet_name' => $request->pet_name,
        'pet_type' => $request->pet_type,
        'pet_breed' => $request->pet_breed,
        'pet_weight' => $request->pet_weight,
        'pet_age' => $request->pet_age,
        'date' => $request->date,
        'time' => $appointmentTime,
    ]);

    // Redirect back to the service appointment details page with success message
    return redirect()->route('admin.service-appointments', $appointment->id)->with('success', 'Service Appointment updated.');
}



}
