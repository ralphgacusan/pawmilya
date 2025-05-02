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

                <form class="donation-form">

                    <h2>Kindness Form</h2>

                    <!-- Donation Type -->
                    <div class="payment-methods">
                        <h3>Donation Type:</h3>
                        <div class="payment-options">
                            <label>
                                <input type="radio" name="donation_type" value="one-time" checked>
                                <span class="payment-card"><i class="fas fa-gift"></i> One-Time</span>
                            </label>
                            <label>
                                <input type="radio" name="donation_type" value="monthly">
                                <span class="payment-card"><i class="fas fa-calendar-alt"></i> Monthly</span>
                            </label>
                        </div>
                    </div>


                    <!-- User Information (Read-only and Full Width) -->
                    <div class="form-group">
                        <input type="text" name="fullName" class="form-input full-width" placeholder="Full Name"
                            value="John Doe" readonly />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-input full-width" placeholder="Email Address"
                            value="your@email.com" readonly />
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-input full-width" placeholder="Mobile Number"
                            value="(123) 456-7890" readonly />
                    </div>

                    <!-- Donation Beneficiary -->
                    <div class="form-group">
                        <select name="beneficiary" class="form-input full-width" required>
                            <option value="" disabled selected>Where should your donation go?</option>
                            <option value="dogs">Dogs</option>
                            <option value="cats">Cats</option>
                            <option value="birds">Birds</option>
                            <option value="general">General Fund</option>
                        </select>
                    </div>

                    <!-- Payment Method Selection -->
                    <div class="payment-methods">
                        <h3>Donation Method:</h3>
                        <div class="payment-options">
                            <label>
                                <input type="radio" name="payment" value="Card" checked>
                                <span class="payment-card"><i class="fab fa-cc-visa"></i> <i
                                        class="fab fa-cc-mastercard"></i> Card</span>
                            </label>
                            <label>
                                <input type="radio" name="payment" value="PayPal">
                                <span class="payment-card"><i class="fab fa-paypal"></i> PayPal</span>
                            </label>
                            <label>
                                <input type="radio" name="payment" value="GCash">
                                <span class="payment-card"><i class="fas fa-money-bill-wave"></i> GCash</span>
                            </label>
                        </div>
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
            </div>


            <!-- RIGHT SIDE: Pet Pictures and Buttons -->
            <div class="media-side">
                <div class="testimonial">
                    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    <p class="quote">"Thanks to generous donors, we were able to rescue Luna from the streets and give
                        her the medical care she desperately needed. She's now in a loving forever home."</p>
                    <div class="author">
                        <img src="/Asset/hug3.webp" alt="Volunteer">
                        <div>
                            <div class="name">Maria Santos</div>
                            <div class="role">Pawmilya Volunteer</div>
                        </div>
                    </div>
                </div>

                <div class="pet-images">
                    <div class="pet-image">
                        <img src="/Asset/cat1.jpg" alt="Rescued Cat" />
                        <div class="pet-info">
                            <span>Whiskers</span>
                            <span>Rescued 2023</span>
                        </div>
                    </div>
                    <div class="pet-image">
                        <img src="/Asset/cat2.png" alt="Rescued Cat" />
                        <div class="pet-info">
                            <span>Mittens</span>
                            <span>Adopted 2024</span>
                        </div>
                    </div>
                    <div class="pet-image">
                        <img src="/Asset/dog1.png" alt="Rescued Dog" />
                        <div class="pet-info">
                            <span>Buddy</span>
                            <span>In Care</span>
                        </div>
                    </div>
                    <div class="pet-image">
                        <img src="/Asset/dog2.png" alt="Rescued Dog" />
                        <div class="pet-info">
                            <span>Max</span>
                            <span>Adopted 2023</span>
                        </div>
                    </div>
                </div>

                <div class="additional-options">
                    <button class="extra-btn">
                        <i class="fas fa-box-open"></i> Donate Supplies
                    </button>
                    <div class="update-buttons">
                        <button class="extra-btn">
                            <i class="fas fa-envelope"></i> Get Updates
                        </button>
                        <button class="extra-btn">
                            <i class="fas fa-share-alt"></i> Share
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>


</x-customer-layout>
