<x-customer-layout>

    @section('title', 'Service Form - Pawmilya')

    @push('styles')
        @vite(['resources/css/about.css', 'resources/css/form.css', 'resources/js/app.js'])
    @endpush

    <main class="main-content">
        <section class="form-hero">
            <div class="hero-content">
                <h1 class="hero-title">Service Application</h1>
                <p class="hero-subtitle">Only the best care for our furry friends!</p>
                <div class="progress-indicator">
                    <div class="progress-bar" style="width: 0%"></div>
                </div>
            </div>
        </section>
        @auth
            <div class="form-container">
                <form id="bookServiceForm" class="rehoming-form"
                    action="{{ route('client.submit.service', ['user_id' => Auth::user()->id, 'service_id' => $service->service_id]) }}"
                    method="POST" novalidate>
                    @csrf
                    <!-- SECTION 1: Service Info (Read-Only) -->
                    <fieldset class="form-section">
                        <legend class="section-title">
                            <span class="section-number">1</span>
                            Service Information
                        </legend>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="serviceName" class="form-label">Service Name</label>
                                <input type="text" id="serviceName" name="serviceName" class="form-input" readonly
                                    value="{{ $service->name }}">
                            </div>

                            <div class="form-group">
                                <label for="serviceDuration" class="form-label">Duration</label>
                                <input type="text" id="serviceDuration" name="serviceDuration" class="form-input"
                                    readonly value="{{ $service->duration . ' minutes' }}">
                            </div>

                            <div class="form-group">
                                <label for="serviceCost" class="form-label">Cost</label>
                                <input type="text" id="serviceCost" name="serviceCost" class="form-input" readonly
                                    value="Php {{ number_format($service->price, 2) }}">
                            </div>

                            <div class="form-group">
                                <label for="service_schedule" class="form-label">Schedule</label>
                                <input type="text" id="service_schedule" name="service_schedule" class="form-input"
                                    readonly value="{{ $service->schedule }}">
                            </div>

                            <div class="form-group full-width">
                                <label for="serviceDescription" class="form-label">Description</label>
                                <textarea id="serviceDescription" name="serviceDescription" class="form-input" readonly rows="3">{{ $service->description }}</textarea>
                            </div>
                        </div>
                    </fieldset>

                    <!-- SECTION 2: User Info (Read-Only) -->
                    <fieldset class="form-section personal-info">
                        <legend class="section-title">
                            <span class="section-number">2</span>
                            Your Information
                        </legend>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="fullName" class="form-label">Full Name*</label>
                                <input type="text" id="fullName" name="fullName" class="form-input"
                                    value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" id="email" name="email" class="form-input"
                                    value="{{ Auth::user()->email }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Phone*</label>
                                <input type="tel" id="phone" name="phone" class="form-input"
                                    value="{{ Auth::user()->phone_number }}" readonly>
                            </div>
                        </div>
                    </fieldset>

                    <!-- SECTION 3: Pet Info (Input Fields) -->
                    <fieldset class="form-section pet-info">
                        <legend class="section-title">
                            <span class="section-number">3</span>
                            Pet Information
                        </legend>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="petName" class="form-label">Pet's Name*</label>
                                <input type="text" id="petName" name="pet_name" class="form-input" required
                                    placeholder="Enter pet's name" value="{{ old('pet_name') }}">
                                @error('pet_name')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="petType" class="form-label">Pet Type*</label>
                                <input type="text" id="petType" name="pet_type" class="form-input" required
                                    placeholder="Enter pet's type" value="{{ old('pet_type') }}">
                                @error('pet_type')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="petBreed" class="form-label">Breed*</label>
                                <input type="text" id="petBreed" name="pet_breed" class="form-input" required
                                    placeholder="Enter pet's breed" value="{{ old('pet_breed') }}">
                                @error('pet_breed')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="petSize" class="form-label">Weight in lbs*</label>
                                <input type="text" id="weight" name="pet_weight" class="form-input" required
                                    placeholder="Enter pet's weight" value="{{ old('pet_weight') }}">
                                @error('pet_weight')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="petAge" class="form-label">Age*</label>
                                <input type="text" id="petAge" name="pet_age" class="form-input" required
                                    placeholder="Enter pet's age" value="{{ old('pet_age') }}">
                                @error('pet_age')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </fieldset>



                    <!-- Date and Time Section -->
                    <fieldset class="form-section pet-info">
                        <legend class="section-title">
                            <span class="section-number">3</span>
                            Desired Meetup Date and Time
                        </legend>

                        <div class="form-grid">
                            <!-- Date Field -->
                            <div class="form-group">
                                <label for="meetupDate" class="form-label">Desired Date*</label>
                                <input type="date" id="meetupDate" name="date" class="form-input" required
                                    value="{{ old('date') }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                <span class="input-icon"><i class="icon-calendar"></i></span>
                                <div class="validation-message">Please select a date for the meetup</div>
                                @error('date')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>


                            <!-- Time Field -->
                            <div class="form-group">
                                <label for="meetupTime" class="form-label">Desired Time*</label>
                                <input type="text" id="meetupTime" name="time" class="form-input" required
                                    value="{{ old('time') }}" placeholder="HH:MM AM/PM">
                                <span class="input-icon"><i class="icon-clock"></i></span>
                                <div class="validation-message">Please select a time for the meetup</div>
                                @error('time')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <!-- Submit Button -->
                    <div class="form-navigation">
                        <button type="submit" class="submit-btn">
                            <i class="icon-submit"></i> Submit Application
                        </button>
                    </div>
                </form>
                @if ($errors->any())
                    <script>
                        window.onload = function() {
                            var errorElement = document.querySelector('.input-error');
                            if (errorElement) {
                                errorElement.scrollIntoView({
                                    behavior: "smooth",
                                    block: "center"
                                });
                            }
                        }
                    </script>
                @endif

            </div>

        @endauth
    </main>

</x-customer-layout>
