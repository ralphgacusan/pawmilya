<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagePath = 'services/checkup.webp';

        Service::create([
            'name' => 'Professional Grooming',
            'schedule' => 'Mon-Sat 9AM-6PM',
            'duration' => 90, // Duration in minutes
            'description' => 'Bath & blow dry, Haircut & styling, Nail trimming, Ear cleaning, Teeth brushing',
            'price' => 800.00,
            'image' => $imagePath,
        ]);

        Service::create([
            'name' => 'Health Checkups',
            'schedule' => 'Daily 10AM-5PM',
            'duration' => 60, // Duration in minutes
            'description' => 'Comprehensive physical exams, Vaccinations, Parasite screening, Senior pet wellness, Nutrition counseling',
            'price' => 600.00,
            'image' => $imagePath,
        ]);

        Service::create([
            'name' => 'Obedience Training',
            'schedule' => 'Weekends 8AM-12PM',
            'duration' => 120, // Duration in minutes
            'description' => 'Puppy kindergarten, Basic obedience, Behavior modification, Potty training, Socialization classes',
            'price' => 1200.00,
            'image' => $imagePath,
        ]);

        Service::create([
            'name' => 'Spay & Neuter',
            'schedule' => 'Tue-Thu 9AM-3PM',
            'duration' => 180, // Duration in minutes
            'description' => 'Safe surgical procedures, Pre-op blood work, Pain management, Recovery monitoring, Post-op care instructions',
            'price' => 2000.00,
            'image' => $imagePath,
        ]);

        Service::create([
            'name' => 'Deworming Treatments',
            'schedule' => 'Mon-Fri 1PM-5PM',
            'duration' => 30, // Duration in minutes
            'description' => 'Intestinal parasite screening, Comprehensive deworming, Preventative medications, Fecal testing, Follow-up care',
            'price' => 400.00,
            'image' => $imagePath,
        ]);

        Service::create([
            'name' => 'Dental Cleaning',
            'schedule' => 'Wed & Sat 10AM-4PM',
            'duration' => 60, // Duration in minutes
            'description' => 'Tartar removal, Gum care, Teeth polishing, Oral hygiene consultation, Anesthesia if needed',
            'price' => 1500.00,
            'image' => $imagePath,
        ]);
    }
}
