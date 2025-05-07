<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // Import the Admin model

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create an admin with sample data
        Admin::create([
            'email' => 'ralphgacusan@admin.pawmilya.site',    // Sample email address
            'password' => Hash::make('pawmilyaadmin101'),  // Sample password (hashed)
            'mobile_number' => '09333804710',   // Sample mobile number
            'position' => 'Senior Vice President',        // Sample position
            'description' => 'The back end developer of the system', // Sample description
            'first_name' => 'Ralph',             // Sample first name
            'last_name' => 'Gacusan',               // Sample last name
        ]);
    }
}
