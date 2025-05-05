<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $imagePath = 'services/checkup.webp';

        $services = [
            [
                'name' => 'Professional Grooming',
                'schedule' => 'Mon-Sat 9AM-6PM',
                'duration' => '1.5 hours',
                'description' => 'Bath & blow dry, Haircut & styling, Nail trimming, Ear cleaning, Teeth brushing',
                'price' => 800.00,
                'image' => $imagePath,
            ],
            [
                'name' => 'Health Checkups',
                'schedule' => 'Daily 8AM-5PM',
                'duration' => '30 minutes',
                'description' => 'Physical exams, Vaccinations, Parasite screening, Senior wellness, Nutrition counseling',
                'price' => 600.00,
                'image' => $imagePath,
            ],
            [
                'name' => 'Obedience Training',
                'schedule' => 'Weekends 10AM-2PM',
                'duration' => '2 hours',
                'description' => 'Puppy kindergarten, Obedience, Behavior modification, Potty training, Socialization',
                'price' => 1200.00,
                'image' => $imagePath,
            ],
            [
                'name' => 'Spay & Neuter',
                'schedule' => 'Tue-Fri 7AM-3PM',
                'duration' => 'Half-day procedure',
                'description' => 'Safe surgery, Pre-op tests, Pain management, Monitoring, Post-op care',
                'price' => 2000.00,
                'image' => $imagePath,
            ],
            [
                'name' => 'Deworming Treatments',
                'schedule' => 'Mon-Sat 9AM-6PM',
                'duration' => '15-30 minutes',
                'description' => 'Parasite screening, Deworming, Preventative meds, Fecal testing, Follow-up',
                'price' => 400.00,
                'image' => $imagePath,
            ],
            [
                'name' => 'Vaccination Packages',
                'schedule' => 'Daily 8AM-5PM',
                'duration' => '20 minutes',
                'description' => 'Core vaccines, Booster shots, Rabies vaccine, Puppy/Kitten schedule, Record keeping',
                'price' => 900.00,
                'image' => $imagePath,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
