<x-customer-layout>

    @section('title', 'Rehoming Application - Pawmilya')

    @push('styles')
        @vite(['resources/css/about.css', 'resources/css/form.css', 'resources/js/app.js'])
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
            <form id="rehomingForm" class="rehoming-form" novalidate action="{{ route('client.rehome-submit') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Personal Information Section -->
                <fieldset class="form-section personal-info">
                    <legend class="section-title">
                        <span class="section-number">1</span>
                        Your Information
                    </legend>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name*</label>
                            <input type="text" id="fullName" name="fullName" class="form-input"
                                value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" readonly
                                placeholder="John Doe" pattern="[A-Za-z ]{3,}">
                            <span class="input-icon"><i class="icon-user"></i></span>
                            <div class="validation-message">Please enter your full name</div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" id="email" name="email" class="form-input"
                                value="{{ Auth::user()->email }}" readonly placeholder="your@email.com">
                            <span class="input-icon"><i class="icon-email"></i></span>
                            <div class="validation-message">Please enter a valid email</div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone*</label>
                            <input type="tel" id="phone" name="phone" class="form-input"
                                value="{{ Auth::user()->phone_number }}" readonly placeholder="(123) 456-7890"
                                pattern="[0-9]{10}">
                            <span class="input-icon"><i class="icon-phone"></i></span>
                            <div class="validation-message">Please enter a valid phone number</div>
                        </div>

                        <div class="form-group full-width">
                            <label for="address" class="form-label">Address*</label>
                            <input type="text" id="address" name="address" class="form-input" readonly
                                placeholder="Street, City, State, ZIP" value="{{ Auth::user()->home_address }}">
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
                            <input type="text" id="petName" name="name" class="form-input" required
                                placeholder="Max" value="{{ old('name') }}">
                            <span class="input-icon"><i class="icon-pet"></i></span>
                            <div class="validation-message">Please enter your pet's name</div>
                            @error('name')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Birth Date -->
                        <div class="form-group">
                            <label for="birthDate" class="form-label">Birth Date*</label>
                            <input type="date" id="birthDate" name="birth_date" class="form-input" required
                                value="{{ old('birth_date') }}" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            <div class="validation-message">Please enter your pet's birth date</div>
                            @error('birth_date')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- Pet Type -->
                        <div class="form-group">
                            <label for="petType" class="form-label">Pet Type*</label>
                            <select id="petType" name="type" class="form-input" required>
                                <option value="" disabled selected>Select Pet Type</option>
                                <option value="dog" {{ old('type') == 'dog' ? 'selected' : '' }}>Dog</option>
                                <option value="cat" {{ old('type') == 'cat' ? 'selected' : '' }}>Cat</option>
                                <option value="exotic" {{ old('type') == 'exotic' ? 'selected' : '' }}>Exotic</option>
                                <option value="special_needs" {{ old('type') == 'special_needs' ? 'selected' : '' }}>
                                    Special Needs</option>
                                <option value="others" {{ old('type') == 'others' ? 'selected' : '' }}>Others</option>
                            </select>
                            <span class="input-icon"><i class="icon-pet"></i></span>
                            <div class="validation-message">Please select pet type</div>
                            @error('type')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Breed -->
                        <div class="form-group">
                            <label for="petBreed" class="form-label">Breed*</label>
                            <select id="petBreed" name="breed" class="form-input" required>
                                <option value="" disabled selected>Select Breed</option>

                                <!-- Dog Breeds -->
                                <option data-type="dog" value="labrador"
                                    {{ old('breed') == 'labrador' ? 'selected' : '' }}>Labrador</option>
                                <option data-type="dog" value="poodle"
                                    {{ old('breed') == 'poodle' ? 'selected' : '' }}>Poodle</option>
                                <option data-type="dog" value="beagle"
                                    {{ old('breed') == 'beagle' ? 'selected' : '' }}>Beagle</option>
                                <option data-type="dog" value="bulldog"
                                    {{ old('breed') == 'bulldog' ? 'selected' : '' }}>Bulldog</option>
                                <option data-type="dog" value="shih_tzu"
                                    {{ old('breed') == 'shih_tzu' ? 'selected' : '' }}>Shih Tzu</option>
                                <option data-type="dog" value="german_shepherd"
                                    {{ old('breed') == 'german_shepherd' ? 'selected' : '' }}>German Shepherd</option>
                                <option data-type="dog" value="golden_retriever"
                                    {{ old('breed') == 'golden_retriever' ? 'selected' : '' }}>Golden Retriever
                                </option>

                                <!-- Cat Breeds -->
                                <option data-type="cat" value="persian"
                                    {{ old('breed') == 'persian' ? 'selected' : '' }}>Persian</option>
                                <option data-type="cat" value="siamese"
                                    {{ old('breed') == 'siamese' ? 'selected' : '' }}>Siamese</option>
                                <option data-type="cat" value="maine_coon"
                                    {{ old('breed') == 'maine_coon' ? 'selected' : '' }}>Maine Coon</option>
                                <option data-type="cat" value="bengal"
                                    {{ old('breed') == 'bengal' ? 'selected' : '' }}>Bengal</option>
                                <option data-type="cat" value="ragdoll"
                                    {{ old('breed') == 'ragdoll' ? 'selected' : '' }}>Ragdoll</option>
                                <option data-type="cat" value="scottish_fold"
                                    {{ old('breed') == 'scottish_fold' ? 'selected' : '' }}>Scottish Fold</option>
                                <option data-type="cat" value="british_shorthair"
                                    {{ old('breed') == 'british_shorthair' ? 'selected' : '' }}>British Shorthair
                                </option>

                                <!-- Exotic Breeds -->
                                <option data-type="exotic" value="macaw"
                                    {{ old('breed') == 'macaw' ? 'selected' : '' }}>Macaw</option>
                                <option data-type="exotic" value="ball_python"
                                    {{ old('breed') == 'ball_python' ? 'selected' : '' }}>Ball Python</option>
                                <option data-type="exotic" value="leopard_gecko"
                                    {{ old('breed') == 'leopard_gecko' ? 'selected' : '' }}>Leopard Gecko</option>
                                <option data-type="exotic" value="iguana"
                                    {{ old('breed') == 'iguana' ? 'selected' : '' }}>Iguana</option>
                                <option data-type="exotic" value="chameleon"
                                    {{ old('breed') == 'chameleon' ? 'selected' : '' }}>Chameleon</option>
                                <option data-type="exotic" value="hedgehog"
                                    {{ old('breed') == 'hedgehog' ? 'selected' : '' }}>Hedgehog</option>
                                <option data-type="exotic" value="fennec_fox"
                                    {{ old('breed') == 'fennec_fox' ? 'selected' : '' }}>Fennec Fox</option>
                                <option data-type="exotic" value="sugar_glider"
                                    {{ old('breed') == 'sugar_glider' ? 'selected' : '' }}>Sugar Glider</option>
                                <option data-type="exotic" value="turtle"
                                    {{ old('breed') == 'turtle' ? 'selected' : '' }}>Turtle</option>
                                <option data-type="exotic" value="axolotl"
                                    {{ old('breed') == 'axolotl' ? 'selected' : '' }}>Axolotl</option>
                                <option data-type="exotic" value="african_grey-parrot"
                                    {{ old('breed') == 'african_grey-parrot' ? 'selected' : '' }}>African Grey Parrot
                                </option>
                                <option data-type="exotic" value="ferret"
                                    {{ old('breed') == 'ferret' ? 'selected' : '' }}>Ferret</option>
                                <option data-type="exotic" value="exotic_fish"
                                    {{ old('breed') == 'exotic_fish' ? 'selected' : '' }}>Exotic Fish</option>

                                <!-- Others -->
                                <option data-type="others" value="others"
                                    {{ old('breed') == 'others' ? 'selected' : '' }}>Others</option>
                            </select>
                            <span class="input-icon"><i class="icon-breed"></i></span>
                            <div class="validation-message">Please select pet breed</div>
                            @error('breed')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- Gender -->
                        <div class="form-group">
                            <label for="petGender" class="form-label">Gender*</label>
                            <select id="petGender" name="gender" class="form-input" required>
                                <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select
                                    Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                            <div class="validation-message">Please select pet's gender</div>
                            @error('gender')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>



                        <!-- Size (Height) -->
                        <div class="form-group">
                            <label for="petHeight" class="form-label">Height in cm*</label>
                            <input type="text" id="petHeight" name="height" class="form-input" required
                                placeholder="Enter pet's height" value="{{ old('height') }}">
                            <div class="validation-message">Please enter pet's height</div>
                            @error('height')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Weight -->
                        <div class="form-group">
                            <label for="petWeight" class="form-label">Weight in lbs*</label>
                            <input type="text" id="petWeight" name="weight" class="form-input" required
                                placeholder="Enter pet's weight" value="{{ old('weight') }}">
                            <div class="validation-message">Please enter pet's weight</div>
                            @error('weight')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Temperament -->
                        <div class="form-group">
                            <label for="petTemperament" class="form-label">Temperament</label>
                            <input type="text" id="petTemperament" name="temperament" class="form-input" required
                                placeholder="Enter pet's temperament" value="{{ old('temperament') }}">
                            <div class="validation-message">Please enter pet's temperament</div>
                            @error('temperament')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Good With -->
                        <div class="form-group">
                            <label for="petGoodWith" class="form-label">Good With</label>
                            <input type="text" id="petGoodWith" name="good_with" class="form-input" required
                                placeholder="Enter what your pet is good with" value="{{ old('good_with') }}">
                            <div class="validation-message">Please enter what your pet is good with</div>
                            @error('good_with')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Spayed/Neutered Status -->
                        <div class="form-group">
                            <label for="spayedNeuteredStatus" class="form-label">Spayed/Neutered Status*</label>
                            <select id="spayedNeuteredStatus" name="spayed_neutered_status" class="form-input"
                                required>
                                <option value="" disabled
                                    {{ old('spayed_neutered_status') == '' ? 'selected' : '' }}>Select status</option>
                                <option value="yes" {{ old('spayed_neutered_status') == 'yes' ? 'selected' : '' }}>
                                    Yes</option>
                                <option value="no" {{ old('spayed_neutered_status') == 'no' ? 'selected' : '' }}>
                                    No</option>
                            </select>
                            <div class="validation-message">Please select spayed/neutered status</div>
                            @error('spayed_neutered_status')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>



                        <!-- Vaccination Status -->
                        <div class="form-group">
                            <label for="vaccinationStatus" class="form-label">Vaccination Status</label>
                            <input type="text" id="vaccinationStatus" name="vaccination_status"
                                class="form-input" required placeholder="Up to date"
                                value="{{ old('vaccination_status') }}" placeholder="Enter pet's vaccination status">
                            <div class="validation-message">Please enter pet's vaccination status</div>
                            @error('vaccination_status')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Existing Conditions -->
                        <div class="form-group">
                            <label for="existingConditions" class="form-label">Existing Conditions</label>
                            <input type="text" id="existingConditions" name="existing_conditions"
                                class="form-input" placeholder="Enter pet's existing conditions"
                                value="{{ old('existing_conditions') }}">
                            @error('existingConditions')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="petDescription" class="form-label">Description*</label>
                            <textarea id="petDescription" name="description" class="form-input" required
                                placeholder="Tell us about your pet's personality, habits, etc." rows="3"
                                value="{{ old('description') }}"></textarea>
                            <div class="validation-message">Please describe your pet</div>
                            @error('description')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Pet Image -->
                        <div class="form-group">
                            <label for="petImage" class="form-label">Pet Image*</label>
                            <input type="file" id="petImage" name="image" class="form-input" required
                                value="{{ old('image') }}">
                            <div class="validation-message">Please upload an image of your pet</div>
                            @error('image')
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
                    </div>
                </fieldset>



                <!-- Additional Sections... -->

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



            <script>
                const petTypeSelect = document.getElementById("petType");
                const petBreedSelect = document.getElementById("petBreed");

                // Save all options for reuse
                const allBreedOptions = Array.from(petBreedSelect.options).slice(1); // Skip default option

                petTypeSelect.addEventListener("change", function() {
                    const selectedType = this.value;

                    // Clear all current breed options (except first)
                    petBreedSelect.innerHTML = '<option value="" disabled selected>Select Breed</option>';

                    // Filter and add only matching options
                    allBreedOptions.forEach(option => {
                        if (option.dataset.type === selectedType) {
                            petBreedSelect.appendChild(option);
                        }
                    });

                    // If no matches found, show "Others" if applicable
                    if (petBreedSelect.options.length === 1) {
                        allBreedOptions.forEach(option => {
                            if (option.dataset.type === "others") {
                                petBreedSelect.appendChild(option);
                            }
                        });
                    }
                });
            </script>
        </div>
    </main>

</x-customer-layout>
