<x-customer-layout>

    @section('title', 'Adoption Application - Pawmilya')


    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/adopt.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <link rel="stylesheet" href="{{ asset('js/app.js') }}">
    @endpush


    <main class="main-content">
        <section class="form-hero">
            <div class="hero-content">
                <h1 class="hero-title">Adoption Application</h1>
                <p class="hero-subtitle">Find your perfect furry companion</p>
                <div class="progress-indicator">
                    <div class="progress-bar" style="width: 0%"></div>
                </div>
            </div>
        </section>

        <div class="form-container">
            <form id="rehomingForm" class="rehoming-form" novalidate
                action="{{ route('client.adopt-submit', ['user_id' => Auth::user()->id, 'pet_id' => $pet->id]) }}"
                method="POST">

                @csrf
                <!-- Personal Information Section -->
                <fieldset class="form-section personal-info">
                    <legend class="section-title">
                        <span class="section-number">1</span>
                        Your Information
                    </legend>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" id="fullName" name="fullName" class="form-input"
                                value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" readonly
                                placeholder="John Doe" pattern="[A-Za-z ]{3,}">
                            <span class="input-icon"><i class="icon-user"></i></span>
                            <div class="validation-message">Please enter your full name</div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-input"
                                value="{{ Auth::user()->email }}" readonly placeholder="your@email.com">
                            <span class="input-icon"><i class="icon-email"></i></span>
                            <div class="validation-message">Please enter a valid email</div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-input"
                                value="{{ Auth::user()->phone_number }}" readonly placeholder="(123) 456-7890"
                                pattern="[0-9]{10}">
                            <span class="input-icon"><i class="icon-phone"></i></span>
                            <div class="validation-message">Please enter a valid phone number</div>
                        </div>

                        <div class="form-group full-width">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" name="address" class="form-input" readonly
                                placeholder="Street, City, State, ZIP" value="{{ Auth::user()->home_address }}">
                            <span class="input-icon"><i class="icon-address"></i></span>
                            <div class="validation-message">Please enter your address</div>
                        </div>
                    </div>
                </fieldset>



                <!-- Pet Information Section -->
                <fieldset class="form-section pet-info">
                    <legend class="section-title">
                        <span class="section-number">2</span>
                        Pet Information
                    </legend>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="petName" class="form-label">Pet's Name</label>
                            <input type="text" id="petName" name="petName" class="form-input" required
                                value="{{ $pet->name }}" readonly placeholder="Max">
                            <span class="input-icon"><i class="icon-pet"></i></span>
                            <div class="validation-message">Please enter your pet's name</div>
                        </div>

                        <div class="form-group">
                            <label for="petType" class="form-label">Pet Type</label>
                            <input type="text" id="petType" name="petType" class="form-input"
                                value="{{ ucfirst($pet->type) }}" readonly>
                            <span class="input-icon"><i class="icon-pet"></i></span>
                            <div class="validation-message">Please enter pet type</div>
                        </div>

                        <div class="form-group">
                            <label for="petBreed" class="form-label">Breed/Mix</label>
                            <input type="text" id="petBreed" name="petBreed" class="form-input"
                                value="{{ ucfirst($pet->breed) }}" readonly placeholder="Labrador Mix">
                            <span class="input-icon"><i class="icon-breed"></i></span>
                        </div>

                        <div class="form-group">
                            <label for="petAge" class="form-label">Age</label>
                            <input type="text" id="petAge" name="petAge" class="form-input" required
                                value="{{ \Carbon\Carbon::parse($pet->birth_date)->age }} years" readonly
                                placeholder="3 years">
                            <span class="input-icon"><i class="icon-age"></i></span>
                            <div class="validation-message">Please enter pet's age</div>
                        </div>

                        <div class="form-group">
                            <label for="petGender" class="form-label">Gender</label>
                            <input type="text" id="petGender" name="petGender" class="form-input" required
                                value="{{ ucfirst($pet->gender) }}" readonly placeholder="Male/Female">
                            <div class="validation-message">Please enter pet's gender</div>
                        </div>

                        <!-- New Fields for Height and Weight -->
                        <div class="form-group">
                            <label for="petHeight" class="form-label">Height</label>
                            <input type="text" id="petHeight" name="petHeight" class="form-input"
                                value="{{ $pet->height }} cm" readonly placeholder="50 cm">
                        </div>

                        <div class="form-group">
                            <label for="petWeight" class="form-label">Weight</label>
                            <input type="text" id="petWeight" name="petWeight" class="form-input"
                                value="{{ $pet->weight }} lbs" readonly placeholder="15 lbs">

                        </div>
                    </div>
                </fieldset>



                <!-- Pet Information Section -->
                <fieldset class="form-section pet-info">
                    <legend class="section-title">
                        <span class="section-number">3</span>
                        Desired Meetup Date and Time
                    </legend>

                    <div class="form-grid">
                        <!-- Date Field -->
                        <div class="form-group">
                            <label for="meetupDate" class="form-label">Desired Date*</label>
                            <input type="date" id="meetupDate" name="meet_up_date" class="form-input" required
                                value="{{ old('meet_up_date') }}"
                                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            <span class="input-icon"><i class="icon-calendar"></i></span>
                            <div class="validation-message">Please select a date for the meetup</div>
                            @error('meet_up_date')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- Time Field -->
                        <div class="form-group">
                            <label for="meetupTime" class="form-label">Desired Time*</label>
                            <input type="text" id="meetupTime" name="meet_up_time" class="form-input" required
                                value="{{ old('meet_up_time') }}" placeholder="HH:MM AM/PM">
                            <span class="input-icon"><i class="icon-clock"></i></span>
                            <div class="validation-message">Please select a time for the meetup</div>
                            @error('meet_up_time')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


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

                </fieldset>



                <!-- Additional Sections... -->

                <div class="form-navigation">

                    <button type="submit" class="submit-btn">
                        <i class="icon-submit"></i> Submit Application
                    </button>
                </div>
            </form>
        </div>
    </main>


</x-customer-layout>
