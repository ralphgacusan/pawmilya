<x-customer-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/specific-pet.css') }}">
        <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    @endpush

    <div class="meet-me-card">


        <div class="details-section">
            <h1 class="pet-name">Meet {{ $pet->name }}</h1>

            <div class="pet-details-container"
                style="display: flex; flex-wrap: nowrap; gap: 20px; align-items: flex-start;">
                <!-- Pet Details -->
                <div class="pet-details" style="flex: 1 1 60%; max-width: 60%;">
                    <p><strong>Age:</strong> {{ \Carbon\Carbon::parse($pet->birth_date)->age }} years old</p>
                    <p><strong>Birth Date:</strong> {{ $pet->birth_date }}</p>
                    <p><strong>Type:</strong> {{ ucfirst($pet->type) }}</p>
                    <p><strong>Breed:</strong> {{ ucfirst($pet->breed) }}</p>
                    <p><strong>Gender:</strong> {{ ucfirst($pet->gender) }}</p>
                    <p><strong>Height:</strong> {{ ucfirst($pet->height) }}</p>
                    <p><strong>Weight:</strong> {{ $pet->weight }} lbs</p>
                    <p><strong>Temperament:</strong> {{ ucfirst($pet->temperament) }}</p>
                    <p><strong>Good with:</strong> {{ ucfirst($pet->good_with) }}</p>
                    <p><strong>Spayed/Neutered Status:</strong> {{ ucfirst($pet->spayed_neutered_status) }}</p>
                    <p><strong>Vaccination Status:</strong> {{ ucfirst($pet->vaccination_status) }}</p>
                    <p><strong>Existing Conditions:</strong> {{ ucfirst($pet->existing_conditions) }}</p>
                    <p><strong>Date Listed for Adoption:</strong>
                        {{ $pet->created_at ? ucfirst($pet->created_at->format('F j, Y')) : 'No date available' }}</p>

                </div>

                <!-- Pet Image -->
                <div class="pet-details-image"
                    style="flex: 1 1 100%; max-width: 45%; display: flex; align-items: center; justify-content: flex-start;">
                    <img src="{{ asset('storage/' . $pet->image) }}" alt="Image of {{ $pet->name }}"
                        style="width: 105%; height: auto; border-radius: 12px; border: 2px solid #ccc; margin-left: -30px;">
                </div>

            </div>

            <div class="pet-description">
                <h2>About {{ $pet->name }}</h2>
                <p>{{ $pet->description }}</p>
            </div>

            <div class="adopt-button-container">
                <a href="{{ route('client.adopt-form', ['id' => $pet->id]) }}">
                    <button class="adopt-button">Adopt Now</button>
                </a>
            </div>
        </div>


</x-customer-layout>
