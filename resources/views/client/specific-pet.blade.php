<x-customer-layout>

    @push('styles')
        @vite(['resources/css/specific-pet.css', 'resources/css/about.css'])
    @endpush

    <div class="meet-me-card">


        <div class="details-section">
            <h1 class="pet-name">Meet Chromeranz</h1>

            <div class="pet-details-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
                <div class="pet-details" style="flex: 1 1 60%;">
                    <p><strong>Breed:</strong> Blue Iguana</p>
                    <p><strong>Gender:</strong> Male</p>
                    <p><strong>Age:</strong> 2 years old</p>
                    <p><strong>Size:</strong> Medium (10–20 lbs)</p>
                    <p><strong>Color:</strong> Vibrant Blue</p>
                    <p><strong>Temperament:</strong> Calm, Observant, Gentle</p>
                    <p><strong>Good with:</strong> Adults, Older Children (supervised)</p>
                    <p><strong>Special Needs:</strong> UVB Lighting, Warm Enclosure (85°F basking spot)</p>
                </div>

                <div class="pet-details-image"
                    style="flex: 1 1 35%; display: flex; align-items: center; justify-content: center;">
                    <img src="/Asset/pet1.png" alt="Pet Detail Image"
                        style="max-width: 100%; height: auto; border-radius: 12px;">
                </div>
            </div>

            <div class="pet-description">
                <h2>About Chromeranz</h2>
                <p>Chromeranz is a striking and unique Blue Iguana with a calm demeanor. He enjoys basking under the sun
                    and nibbling on leafy greens.
                    He is accustomed to gentle human interaction and is looking for a patient adopter who understands
                    reptile care.
                    Chromeranz would thrive in a quiet home with a spacious, climate-controlled habitat.
                    He is healthy, active, and ready to find his forever family!</p>

                <h2>Care Requirements</h2>
                <ul>
                    <li>UVB light exposure 10–12 hours daily</li>
                    <li>Fresh veggies and occasional fruits</li>
                    <li>Spacious terrarium (at least 6ft long)</li>
                    <li>Daily misting for humidity</li>
                </ul>
            </div>

            <div class="adopt-button-container">
                <a href="{{ route('client.adopt-form') }}">
                    <button class="adopt-button">Adopt Now</button>
                </a>
            </div>

        </div>

</x-customer-layout>
