<x-customer-layout>

    @section('title', 'Support Our Pets - Pawmilya')


    @push('styles')
        @vite(['resources/css/donate.css', 'resources/css/about.css'])
    @endpush



    <!-- MAIN CONTENT -->
    <main class="donation-section">
        <div class="donation-layout">
            <!-- LEFT SIDE: Donation Form -->
            <div class="form-side">
                <div class="donation-text">
                    <h1>Give the Gift of a Better Life</h1>
                    <p class="subtitle">Your donation helps provide food, shelter, and medical care for animals in need
                    </p>
                    <div class="impact-stats">
                        <div class="stat-item">
                            <div class="stat-number">1,200+</div>
                            <div class="stat-label">Pets Rescued</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">800+</div>
                            <div class="stat-label">Successful Adoptions</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">5,000+</div>
                            <div class="stat-label">Meals Provided</div>
                        </div>
                    </div>
                </div>

                @auth

                    <form class="donation-form" action="{{ route('client.donation-submit') }}" method="POST">
                        @csrf
                        <h2>Kindness Form</h2>

                        <!-- Donation Type -->
                        <div class="payment-methods">
                            <h3>Donation Type:</h3>
                            <div class="payment-options">
                                <label>
                                    <input type="radio" name="donation_type" value="one-time"
                                        {{ old('donation_type') == 'one-time' ? 'checked' : '' }}>
                                    <span class="payment-card"><i class="fas fa-gift"></i> One-Time</span>
                                </label>
                                <label>
                                    <input type="radio" name="donation_type" value="monthly"
                                        {{ old('donation_type') == 'monthly' ? 'checked' : '' }}>
                                    <span class="payment-card"><i class="fas fa-calendar-alt"></i> Monthly</span>
                                </label>
                            </div>
                            @error('donation_type')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- User Information (Read-only and Full Width) -->
                        <div class="form-group">
                            <h4 class="form-label">Donor's Name:</h4>
                            <input type="text" name="fullName" class="form-input full-width" placeholder="Full Name"
                                value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" readonly />
                        </div>
                        <div class="form-group">
                            <h4 class="form-label">Email Address:</h4>
                            <input type="email" name="email" class="form-input full-width" placeholder="Email Address"
                                value="{{ Auth::user()->email }}" readonly />
                        </div>
                        <div class="form-group">
                            <h4 class="form-label">Phone Number:</h4>
                            <input type="tel" name="phone" class="form-input full-width" placeholder="Mobile Number"
                                value="{{ Auth::user()->phone_number }}" readonly />
                        </div>

                        {{-- Donation Amount --}}
                        <div class="form-group">
                            <h4 class="form-label">Donation Amount (₱):</h4>
                            <input type="text" id="donationAmount" name="amount" class="form-input"
                                placeholder="Enter amount" value="{{ old('amount') }}" oninput="formatAmount(this)">
                            @error('amount')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Donation Beneficiary -->
                        <div class="form-group">
                            <h4 class="form-label">Beneficiary:</h4>
                            <select name="beneficiary" class="form-input full-width">
                                <option value="" disabled {{ old('beneficiary') ? '' : 'selected' }}>Where should
                                    your
                                    donation go?</option>
                                <option value="dogs" {{ old('beneficiary') == 'dogs' ? 'selected' : '' }}>Dogs</option>
                                <option value="cats" {{ old('beneficiary') == 'cats' ? 'selected' : '' }}>Cats</option>
                                <option value="exotic" {{ old('beneficiary') == 'exotic' ? 'selected' : '' }}>Exotic Pets
                                </option>
                                <option value="special_needs"
                                    {{ old('beneficiary') == 'special_needs' ? 'selected' : '' }}>Special Needs</option>
                                <option value="all" {{ old('beneficiary') == 'all' ? 'selected' : '' }}>All Pets
                                </option>
                            </select>
                            @error('beneficiary')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- Payment Method Selection -->
                        <div class="payment-methods">
                            <h3>Donation Method:</h3>
                            <div class="payment-options">
                                <label>
                                    <input type="radio" name="donation_method" value="card"
                                        {{ old('donation_method') == 'card' ? 'checked' : '' }}>
                                    <span class="payment-card"><i class="fab fa-cc-visa"></i> <i
                                            class="fab fa-cc-mastercard"></i>Card</span>
                                </label>
                                <label>
                                    <input type="radio" name="donation_method" value="bank_transfer"
                                        {{ old('donation_method') == 'bank_transfer' ? 'checked' : '' }}>
                                    <span class="payment-card"><i class="fas fa-university"></i>Bank</span>
                                </label>
                                <label>
                                    <input type="radio" name="donation_method" value="GCash"
                                        {{ old('donation_method') == 'GCash' ? 'checked' : '' }}>
                                    <span class="payment-card"><i class="fas fa-money-bill-wave"></i>GCash</span>
                                </label>
                            </div>
                            @error('donation_method')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-heart"></i> DONATE NOW
                        </button>

                        <!-- Secure Payment Notice -->
                        <div class="secure-payment">
                            <i class="fas fa-lock"></i> Secure payment processing
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
                @endauth

            </div>


            <!-- RIGHT SIDE: Pet Pictures and Buttons -->
            <div class="media-side">
                <div class="testimonial">
                    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    <p class="quote">"Thanks to generous donors, we were able to rescue Luna from the streets and give
                        her the medical care she desperately needed. She's now in a loving forever home."</p>
                    <div class="author">
                        <img src="{{ asset('imgs/hug3.webp') }}" alt="Volunteer">
                        <div>
                            <div class="name">Maria Santos</div>
                            <div class="role">Pawmilya Volunteer</div>
                        </div>
                    </div>
                </div>

                <div class="pet-images">
                    <div class="pet-image">
                        <img src="{{ asset('imgs/cat1.jpg') }}" alt="Rescued Cat" />
                        <div class="pet-info">
                            <span>Whiskers</span>
                            <span>Rescued 2023</span>
                        </div>
                    </div>
                    <div class="pet-image">
                        <img src="{{ asset('imgs/cat2.png') }}" alt="Rescued Cat" />
                        <div class="pet-info">
                            <span>Mittens</span>
                            <span>Adopted 2024</span>
                        </div>
                    </div>
                    <div class="pet-image">
                        <img src="{{ asset('imgs/dog1.png') }}" alt="Rescued Dog" />
                        <div class="pet-info">
                            <span>Buddy</span>
                            <span>In Care</span>
                        </div>
                    </div>
                    <div class="pet-image">
                        <img src="{{ asset('imgs/dog2.png') }}" alt="Rescued Dog" />
                        <div class="pet-info">
                            <span>Max</span>
                            <span>Adopted 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Function to format number with commas
        function formatAmount(input) {
            let value = input.value;
            // Remove non-numeric characters except dot
            value = value.replace(/[^0-9.]/g, '');

            // Add commas every 3 digits before the decimal point
            if (value) {
                value = parseFloat(value).toLocaleString('en-US');
            }

            // Update the value with commas
            input.value = value;
        }
    </script>


</x-customer-layout>
