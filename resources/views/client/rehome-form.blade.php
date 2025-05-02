<x-customer-layout>

    @section('title', 'Rehoming Application - Pawmilya')

    @push('styles')
        @vite(['resources/css/about.css', 'resources/css/form.css'])
    @endpush

    <main class="main-content">
        <section class="form-hero">
            <div class="hero-content">
                <h1 class="hero-title">Rehoming Application</h1>
                <p class="hero-subtitle">Help your pet find their perfect forever home</p>
                <div class="progress-indicator">
                    <div class="progress-bar" style="width: 0%"></div>
                </div>
            </div>
        </section>

        <div class="form-container">
            <form id="rehomingForm" class="rehoming-form" novalidate>
                <!-- Personal Information Section -->
                <fieldset class="form-section personal-info">
                    <legend class="section-title">
                        <span class="section-number">1</span>
                        Your Information
                    </legend>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name*</label>
                            <input type="text" id="fullName" name="fullName" class="form-input" value="John Doe"
                                readonly placeholder="John Doe" pattern="[A-Za-z ]{3,}">
                            <span class="input-icon"><i class="icon-user"></i></span>
                            <div class="validation-message">Please enter your full name</div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" id="email" name="email" class="form-input"
                                value="your@email.com" readonly placeholder="your@email.com">
                            <span class="input-icon"><i class="icon-email"></i></span>
                            <div class="validation-message">Please enter a valid email</div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone*</label>
                            <input type="tel" id="phone" name="phone" class="form-input"
                                value="(123) 456-7890" readonly placeholder="(123) 456-7890" pattern="[0-9]{10}">
                            <span class="input-icon"><i class="icon-phone"></i></span>
                            <div class="validation-message">Please enter a valid phone number</div>
                        </div>

                        <div class="form-group full-width">
                            <label for="address" class="form-label">Address*</label>
                            <input type="text" id="address" name="address" class="form-input" readonly
                                placeholder="Street, City, State, ZIP" value="Street, City, State, ZIP">
                            <span class="input-icon"><i class="icon-address"></i></span>
                            <div class="validation-message">Please enter your address</div>
                        </div>


                    </div>
                </fieldset>


                <fieldset class="form-section pet-info">
                    <legend class="section-title">
                        <span class="section-number">2</span>
                        Pet Information
                    </legend>

                    <div class="form-grid">
                        <!-- Pet Name -->
                        <div class="form-group">
                            <label for="petName" class="form-label">Pet's Name*</label>
                            <input type="text" id="petName" name="petName" class="form-input" required
                                placeholder="Max">
                            <span class="input-icon"><i class="icon-pet"></i></span>
                            <div class="validation-message">Please enter your pet's name</div>
                        </div>

                        <!-- Birth Date -->
                        <div class="form-group">
                            <label for="birthDate" class="form-label">Birth Date*</label>
                            <input type="date" id="birthDate" name="birthDate" class="form-input" required>
                            <div class="validation-message">Please enter your pet's birth date</div>
                        </div>

                        <!-- Pet Type -->
                        <div class="form-group">
                            <label for="petType" class="form-label">Pet Type*</label>
                            <input type="text" id="petType" name="petType" class="form-input" required
                                placeholder="Dog">
                            <span class="input-icon"><i class="icon-pet"></i></span>
                            <div class="validation-message">Please enter pet type</div>
                        </div>

                        <!-- Breed -->
                        <div class="form-group">
                            <label for="petBreed" class="form-label">Breed*</label>
                            <input type="text" id="petBreed" name="petBreed" class="form-input" required
                                placeholder="Labrador Mix">
                            <span class="input-icon"><i class="icon-breed"></i></span>
                            <div class="validation-message">Please enter pet breed</div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group">
                            <label for="petGender" class="form-label">Gender*</label>
                            <input type="text" id="petGender" name="petGender" class="form-input" required
                                placeholder="Male/Female">
                            <div class="validation-message">Please enter pet's gender</div>
                        </div>

                        <!-- Size (Height) -->
                        <div class="form-group">
                            <label for="petHeight" class="form-label">Height*</label>
                            <input type="text" id="petHeight" name="petHeight" class="form-input" required
                                placeholder="50 cm">
                            <div class="validation-message">Please enter pet's height</div>
                        </div>

                        <!-- Weight -->
                        <div class="form-group">
                            <label for="petWeight" class="form-label">Weight*</label>
                            <input type="text" id="petWeight" name="petWeight" class="form-input" required
                                placeholder="15 kg">
                            <div class="validation-message">Please enter pet's weight</div>
                        </div>

                        <!-- Temperament -->
                        <div class="form-group">
                            <label for="petTemperament" class="form-label">Temperament*</label>
                            <input type="text" id="petTemperament" name="petTemperament" class="form-input"
                                required placeholder="Friendly, playful">
                            <div class="validation-message">Please enter pet's temperament</div>
                        </div>

                        <!-- Good With -->
                        <div class="form-group">
                            <label for="petGoodWith" class="form-label">Good With*</label>
                            <input type="text" id="petGoodWith" name="petGoodWith" class="form-input" required
                                placeholder="Other pets, kids, etc.">
                            <div class="validation-message">Please enter what your pet is good with</div>
                        </div>

                        <!-- Spayed/Neutered Status -->
                        <div class="form-group">
                            <label for="spayedNeuteredStatus" class="form-label">Spayed/Neutered Status*</label>
                            <select id="spayedNeuteredStatus" name="spayedNeuteredStatus" class="form-input"
                                required>
                                <option value="" disabled selected>Select status</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            <div class="validation-message">Please select spayed/neutered status</div>
                        </div>


                        <!-- Vaccination Status -->
                        <div class="form-group">
                            <label for="vaccinationStatus" class="form-label">Vaccination Status*</label>
                            <input type="text" id="vaccinationStatus" name="vaccinationStatus" class="form-input"
                                required placeholder="Up to date">
                            <div class="validation-message">Please enter pet's vaccination status</div>
                        </div>

                        <!-- Existing Conditions -->
                        <div class="form-group">
                            <label for="existingConditions" class="form-label">Existing Conditions</label>
                            <input type="text" id="existingConditions" name="existingConditions"
                                class="form-input" placeholder="Allergies, etc.">
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="petDescription" class="form-label">Description*</label>
                            <textarea id="petDescription" name="petDescription" class="form-input" required
                                placeholder="Tell us about your pet's personality, habits, etc." rows="4"></textarea>
                            <div class="validation-message">Please describe your pet</div>
                        </div>

                        <!-- Pet Image -->
                        <div class="form-group">
                            <label for="petImage" class="form-label">Pet Image*</label>
                            <input type="file" id="petImage" name="petImage" class="form-input" required>
                            <div class="validation-message">Please upload an image of your pet</div>
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
                            <input type="date" id="meetupDate" name="meetupDate" class="form-input" required>
                            <span class="input-icon"><i class="icon-calendar"></i></span>
                            <div class="validation-message">Please select a date for the meetup</div>
                        </div>

                        <!-- Time Field -->
                        <div class="form-group">
                            <label for="meetupTime" class="form-label">Desired Time*</label>
                            <input type="time" id="meetupTime" name="meetupTime" class="form-input" required>
                            <span class="input-icon"><i class="icon-clock"></i></span>
                            <div class="validation-message">Please select a time for the meetup</div>
                        </div>
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
