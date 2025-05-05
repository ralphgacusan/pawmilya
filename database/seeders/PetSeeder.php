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
                'name' => 'Rocky',
                'birth_date' => '2021-01-20',
                'type' => 'Dog',
                'breed' => 'Bulldog',
                'gender' => 'Male',
                'height' => 'Medium',
                'weight' => 24.0,
                'temperament' => 'Calm',
                'good_with' => 'Kids',
                'spayed_neutered_status' => 'Neutered',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'None',
                'description' => 'Very chill and gentle with kids',
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Daisy',
                'birth_date' => '2020-09-10',
                'type' => 'Dog',
                'breed' => 'Poodle',
                'gender' => 'Female',
                'height' => 'Small',
                'weight' => 8.5,
                'temperament' => 'Playful',
                'good_with' => 'Other pets, kids',
                'spayed_neutered_status' => 'Spayed',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'None',
                'description' => 'Loves to jump and play fetch',
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Shadow',
                'birth_date' => '2018-03-03',
                'type' => 'Dog',
                'breed' => 'Doberman',
                'gender' => 'Male',
                'height' => 'Large',
                'weight' => 40.0,
                'temperament' => 'Alert',
                'good_with' => 'Adults',
                'spayed_neutered_status' => 'Neutered',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'None',
                'description' => 'Great for guarding and companionship',
                'image' => 'images/cat2.png'
            ],
        
            // 🐱 Cats
            [
                'name' => 'Snowball',
                'birth_date' => '2022-01-05',
                'type' => 'Cat',
                'breed' => 'Ragdoll',
                'gender' => 'Female',
                'height' => 'Medium',
                'weight' => 5.5,
                'temperament' => 'Gentle',
                'good_with' => 'Kids',
                'spayed_neutered_status' => 'Spayed',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'None',
                'description' => 'Very affectionate and fluffy',
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Tiger',
                'birth_date' => '2019-07-22',
                'type' => 'Cat',
                'breed' => 'Tabby',
                'gender' => 'Male',
                'height' => 'Medium',
                'weight' => 6.0,
                'temperament' => 'Independent',
                'good_with' => 'Other pets',
                'spayed_neutered_status' => 'Neutered',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'None',
                'description' => 'Loves to explore and roam',
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Nala',
                'birth_date' => '2020-10-10',
                'type' => 'Cat',
                'breed' => 'British Shorthair',
                'gender' => 'Female',
                'height' => 'Medium',
                'weight' => 5.2,
                'temperament' => 'Affectionate',
                'good_with' => 'Kids',
                'spayed_neutered_status' => 'Spayed',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'None',
                'description' => 'Enjoys cuddles and sunny spots',
                'image' => 'images/cat2.png'
            ],
        
            // ❤️ Special Needs
            [
                'name' => 'Buddy',
                'birth_date' => '2016-06-18',
                'type' => 'Dog',
                'breed' => 'Cocker Spaniel',
                'gender' => 'Male',
                'height' => 'Medium',
                'weight' => 12.0,
                'temperament' => 'Loving',
                'good_with' => 'Kids, other pets',
                'spayed_neutered_status' => 'Neutered',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'Blind in one eye',
                'description' => 'Needs special care but full of love',
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Mochi',
                'birth_date' => '2018-11-11',
                'type' => 'Cat',
                'breed' => 'Scottish Fold',
                'gender' => 'Female',
                'height' => 'Small',
                'weight' => 3.8,
                'temperament' => 'Quiet',
                'good_with' => 'Kids',
                'spayed_neutered_status' => 'Spayed',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'Deaf',
                'description' => 'Sweet and calm, just needs gentle care',
                'image' => 'images/cat2.png'
            ],
        
            // 🐍 Exotic
            [
                'name' => 'Zazu',
                'birth_date' => '2019-04-21',
                'type' => 'Exotic',
                'breed' => 'Cockatoo',
                'gender' => 'Male',
                'height' => 'Small',
                'weight' => 20.0,
                'temperament' => 'Loud',
                'good_with' => 'Adults',
                'spayed_neutered_status' => 'Not spayed or neutered',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'None',
                'description' => 'Enjoys music and dancing',
                'image' => 'images/cat2.png'
            ],
            [
                'name' => 'Slither',
                'birth_date' => '2021-02-01',
                'type' => 'Exotic',
                'breed' => 'Ball Python',
                'gender' => 'Female',
                'height' => 'Small',
                'weight' => 2.0,
                'temperament' => 'Docile',
                'good_with' => 'None',
                'spayed_neutered_status' => 'Not spayed or neutered',
                'vaccination_status' => 'Up to date',
                'existing_conditions' => 'None',
                'description' => 'Easy to handle and calm',
                'image' => 'images/cat2.png'
            ]
        ];

        foreach ($pets as $pet) {
            Pet::create($pet);
        }
    }
}

