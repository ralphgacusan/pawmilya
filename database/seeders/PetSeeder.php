<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;


class PetSeeder extends Seeder
{
    public function run()
    {
        $pets = [
            [
                'name' => 'Max', 
                'birth_date' => '2020-04-15', 
                'type' => 'Dog', 
                'breed' => 'Labrador', 
                'gender' => 'Male', 
                'height' => 'Medium', 
                'weight' => 30.5, 
                'temperament' => 'Energetic', 
                'good_with' => 'Other pets, kids', 
                'spayed_neutered_status' => 'Spayed', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Friendly and loves to play!', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Bella', 
                'birth_date' => '2019-06-30', 
                'type' => 'Dog', 
                'breed' => 'German Shepherd', 
                'gender' => 'Female', 
                'height' => 'Large', 
                'weight' => 35.2, 
                'temperament' => 'Loyal', 
                'good_with' => 'Other pets', 
                'spayed_neutered_status' => 'Spayed', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Very protective and playful', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Charlie', 
                'birth_date' => '2021-03-10', 
                'type' => 'Dog', 
                'breed' => 'Beagle', 
                'gender' => 'Male', 
                'height' => 'Medium', 
                'weight' => 20.0, 
                'temperament' => 'Curious', 
                'good_with' => 'Other pets, kids', 
                'spayed_neutered_status' => 'Not spayed or neutered', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Loves to sniff around and explore', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Whiskers', 
                'birth_date' => '2020-05-25', 
                'type' => 'Cat', 
                'breed' => 'Siamese', 
                'gender' => 'Female', 
                'height' => 'Small', 
                'weight' => 4.5, 
                'temperament' => 'Playful', 
                'good_with' => 'Other pets', 
                'spayed_neutered_status' => 'Spayed', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Loves to climb and jump high', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Mittens', 
                'birth_date' => '2019-02-14', 
                'type' => 'Cat', 
                'breed' => 'Persian', 
                'gender' => 'Male', 
                'height' => 'Medium', 
                'weight' => 6.0, 
                'temperament' => 'Calm', 
                'good_with' => 'Kids', 
                'spayed_neutered_status' => 'Neutered', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Very relaxed and loves naps', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Luna', 
                'birth_date' => '2021-08-02', 
                'type' => 'Cat', 
                'breed' => 'Maine Coon', 
                'gender' => 'Female', 
                'height' => 'Large', 
                'weight' => 7.2, 
                'temperament' => 'Friendly', 
                'good_with' => 'Other pets, kids', 
                'spayed_neutered_status' => 'Spayed', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Loves being around people and other pets', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Spike', 
                'birth_date' => '2018-09-18', 
                'type' => 'Exotic', 
                'breed' => 'Iguana', 
                'gender' => 'Male', 
                'height' => 'Large', 
                'weight' => 120.0, 
                'temperament' => 'Mild', 
                'good_with' => 'None', 
                'spayed_neutered_status' => 'Not spayed or neutered', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Loves warm places and sunbathing', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Peaches', 
                'birth_date' => '2020-12-12', 
                'type' => 'Exotic', 
                'breed' => 'Parrot', 
                'gender' => 'Female', 
                'height' => 'Small', 
                'weight' => 25.0, 
                'temperament' => 'Talkative', 
                'good_with' => 'Other pets, kids', 
                'spayed_neutered_status' => 'Not spayed or neutered', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Loves to mimic sounds and phrases', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Cleo', 
                'birth_date' => '2020-01-20', 
                'type' => 'Exotic', 
                'breed' => 'Tortoise', 
                'gender' => 'Female', 
                'height' => 'Small', 
                'weight' => 5.5, 
                'temperament' => 'Shy', 
                'good_with' => 'None', 
                'spayed_neutered_status' => 'Spayed', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'None', 
                'description' => 'Likes hiding in shells and walking slowly', 
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Lily', 
                'birth_date' => '2017-11-05', 
                'type' => 'Dog', 
                'breed' => 'Golden Retriever', 
                'gender' => 'Female', 
                'height' => 'Medium', 
                'weight' => 25.0, 
                'temperament' => 'Loving', 
                'good_with' => 'Kids', 
                'spayed_neutered_status' => 'Spayed', 
                'vaccination_status' => 'Up to date', 
                'existing_conditions' => 'Has arthritis', 
                'description' => 'Needs extra care due to arthritis', 
                'image' => 'images/cat2.png'
            ]
        ];

        foreach ($pets as $pet) {
            Pet::create($pet);
        }
    }
}

