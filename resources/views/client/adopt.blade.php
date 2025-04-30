<x-customer-layout>

    @push('styles')
        @vite(['resources/css/adopt.css', 'resources/css/about.css'])
    @endpush

    <!-- Adoption Page Hero -->
    <section class="page-hero adopt-hero">
        <div class="herocontainer">
            <h1>Find your new friend here!</h1>
            <p class="subtitle">Browse our available pets waiting for their forever homes</p>
        </div>
    </section>

    <!-- Available Pets Section -->
    <section class="section pets-section">
        <div class="container">
            <h2><i class="fas fa-paw"></i> Available Pets</h2>
            <div class="pets-grid">
                <div class="pet-card">
                    <div class="pet-image">
                        <img src="/Asset/pet1.png" alt="Chromeranz">
                        <span class="pet-badge">Available</span>
                    </div>
                    <div class="pet-info">
                        <h3>Chromeranz</h3>
                        <p><i class="fas fa-birthday-cake"></i> 2 years old</p>
                        <a href="/Webpages/pet.html">
                            <button class="btn btn-primary">Meet Me</button>
                        </a>

                    </div>
                </div>

                <div class="pet-card">
                    <div class="pet-image">
                        <img src="/Asset/pet2.png" alt="Isagi Yoichi">
                        <span class="pet-badge">Available</span>
                    </div>
                    <div class="pet-info">
                        <h3>Isagi Yoichi</h3>
                        <p><i class="fas fa-birthday-cake"></i> 1 year old</p>
                        <button class="btn btn-primary">Meet Me</button>
                    </div>
                </div>

                <div class="pet-card">
                    <div class="pet-image">
                        <img src="/Asset/pet3.png" alt="Hortal">
                        <span class="pet-badge">Available</span>
                    </div>
                    <div class="pet-info">
                        <h3>Hortal</h3>
                        <p><i class="fas fa-birthday-cake"></i> 3 years old</p>
                        <button class="btn btn-primary">Meet Me</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Adoption Process Section -->
    <section class="section process-section">
        <div class="container">
            <h2><i class="fas fa-question-circle"></i> Adoption FAQ</h2>
            <h3>How to adopt?</h3>

            <div class="process-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Submit Application</h4>
                        <p>Complete our online adoption form with your details</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Zoom Interview</h4>
                        <p>We'll schedule a virtual meeting to discuss your application</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Shelter Visit</h4>
                        <p>Meet our animals in person at our facility</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h4>Confirm Choice</h4>
                        <p>Visit your chosen pet to finalize your decision</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h4>Vet Clearance</h4>
                        <p>Wait for medical clearance and schedule pickup</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">6</div>
                    <div class="step-content">
                        <h4>Adoption Fee</h4>
                        <p>Pay the adoption fee (P500 for cats / P1000 for dogs)</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">7</div>
                    <div class="step-content">
                        <h4>Take Home</h4>
                        <p>Bring your new family member home!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Requirements Section -->
    <section class="section requirements-section">
        <div class="container">
            <h2><i class="fas fa-clipboard-check"></i> Adoption Requirements</h2>
            <div class="requirements-grid">
                <div class="requirement-card">
                    <i class="fas fa-id-card"></i>
                    <h4>Valid I.D.</h4>
                    <p>Government-issued identification</p>
                </div>

                <div class="requirement-card">
                    <i class="fas fa-phone"></i>
                    <h4>Contact Info</h4>
                    <p>Current address and phone number</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories Section -->
    <section class="section stories-section">
        <div class="container">
            <h2><i class="fas fa-heart"></i> Success Stories</h2>
            <div class="story-card">
                <div class="story-content">
                    <h3>Read Lee and Bacon's hopeful story here!</h3>
                    <p>Discover how this pair found their forever home through Pawmilya's adoption program.</p>
                    <a href="#" class="btn btn-secondary">Read Story</a>
                </div>

            </div>
        </div>
    </section>

    <!-- Meet & Greet Section -->
    <section class="section meet-section">
        <div class="container">
            <h2><i class="fas fa-calendar-alt"></i> Schedule a Meet & Greet</h2>
            <div class="meet-content">
                <div class="meet-info">
                    <h3>Visit Pawmilya</h3>
                    <p>Come meet our animals in person and find your perfect match!</p>

                    <div class="contact-method">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Call Us</h4>
                            <p>09052162094</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email Us</h4>
                            <p>contact@pawnniya.org</p>
                        </div>
                    </div>
                </div>

                <div class="meet-form">
                    <h3>Schedule Your Visit</h3>
                    <form>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Preferred Date</label>
                            <input type="date" id="date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Schedule Visit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- About Pawmilya Section -->
    <section class="section about-section">
        <div class="container">
            <h2><i class="fas fa-info-circle"></i> About Pawmilya</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Pawmilya Adoption Center<br>
                        1234 Compassion Blvd.<br>
                        Suite 101<br>
                        Brightville, NY 10234</p>

                    <p><strong>Phone:</strong> (555) 987-6543<br>
                        <strong>Email:</strong> contact@pawnniya.org
                    </p>

                    <p>We are a Non-Profit Government funded organization that rehabilitates stray and abandoned animals
                        in the Philippines. We also promote adoption and spay/neuter programs for responsible pet
                        ownership.</p>

                    <a href="/Webpages/about.html" class="btn btn-outline">Learn more about us</a>
                </div>
                <div class="about-image">
                    <img src="/Asset/logo.jpg" alt="Pawmilya shelter">
                </div>
            </div>
        </div>
    </section>

</x-customer-layout>
