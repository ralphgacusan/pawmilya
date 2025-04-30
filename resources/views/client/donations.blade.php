<x-customer-layout>

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
                    <div class="toggle-buttons">
                        <button type="button" class="active"><i class="fas fa-gift"></i> One-Time</button>
                        <button type="button"><i class="fas fa-calendar-alt"></i> Monthly</button>
                    </div>

                    <div class="amount-options">
                        <h3>Select donation amount:</h3>
                        <div class="amount-buttons">
                            <button type="button">₱200</button>
                            <button type="button">₱500</button>
                            <button type="button">₱1,000</button>
                            <button type="button">₱2,000</button>
                            <button type="button">₱5,000</button>
                        </div>
                        <div class="custom-amount">
                            <input type="number" placeholder="₱ Other Amount" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="First Name" required />
                        <input type="text" placeholder="Last Name" required />
                    </div>
                    <input type="email" placeholder="Email Address" required />
                    <input type="tel" placeholder="Mobile Number" required />

                    <select required>
                        <option value="" disabled selected>Where should your donation go?</option>
                        <option value="dogs"><i class="fas fa-dog"></i> Dogs</option>
                        <option value="cats"><i class="fas fa-cat"></i> Cats</option>
                        <option value="birds"><i class="fas fa-dove"></i> Birds</option>
                        <option value="general">General Fund</option>
                    </select>

                    <div class="payment-methods">
                        <h3>Payment Method:</h3>
                        <div class="payment-options">
                            <label>
                                <input type="radio" name="payment" checked>
                                <span class="payment-card"><i class="fab fa-cc-visa"></i> <i
                                        class="fab fa-cc-mastercard"></i> Card</span>
                            </label>
                            <label>
                                <input type="radio" name="payment">
                                <span class="payment-card"><i class="fab fa-paypal"></i> PayPal</span>
                            </label>
                            <label>
                                <input type="radio" name="payment">
                                <span class="payment-card"><i class="fas fa-money-bill-wave"></i> GCash</span>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-heart"></i> DONATE NOW
                    </button>

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
