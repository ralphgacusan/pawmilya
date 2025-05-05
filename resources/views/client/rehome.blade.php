<x-customer-layout>

    @section('title', 'Rehome Your Pet - Pawmilya')

    @push('styles')
        @vite(['resources/css/rehome.css', 'resources/css/app.css'])
    @endpush


    <main>
        <section class="rehome-hero">
            <h1>Rehome with Love & Care</h1>
            <p>Finding loving homes for pets when you can no longer care for them</p>
        </section>

        <section class="pet-gallery">
            <div class="gallery-container">
                <div class="gallery-item">
                    <img src="{{ asset('imgs/hug.jpg') }}" alt="Happy dog in new home">
                    <p>Buddy found his forever family</p>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('imgs/hug2.png') }}" alt="Cat being cuddled">
                    <p>Whiskers adjusted beautifully</p>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('imgs/hug3.webp') }}" alt="Rabbit with new owner">
                    <p>Thumper loves his new space</p>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('imgs/hug4.webp') }}" alt="Bird perching happily">
                    <p>Sky is thriving in her fur mom</p>
                </div>
            </div>
        </section>

        <div class="rehome-content">
            <div class="rehome-main">
                <section class="rehome-section">
                    <h2>Rehoming Guidelines</h2>
                    <ul class="guidelines-list">
                        <li>Pack familiar items from home</li>
                        <li>Provide detailed care instructions</li>
                        <li>Arrange a quiet transfer</li>
                        <li>Allow pet to adjust at their own pace</li>
                        <li>Maintain similar routines initially</li>
                        <li>Follow up after placement</li>
                    </ul>
                </section>

                <section class="rehome-section">
                    <h2>Adoption Requirements</h2>
                    <ul class="requirements-list">
                        <li>Valid government-issued ID</li>
                        <li>Current contact information</li>
                        <li>Proof of pet-friendly housing</li>
                        <li>Veterinary reference (if available)</li>
                    </ul>
                </section>

                <section class="rehome-section">
                    <h2>Success Stories</h2>
                    <div class="testimonial">
                        <p>"Lee and Bacon found the perfect match through Pawmilya. Read their heartwarming journey <a
                                href="#">here</a>!"</p>
                    </div>
                </section>
            </div>

            <div class="rehome-sidebar">
                <section class="updates-section">
                    <h2>Stay Connected</h2>
                    <p>We'll provide regular updates about your pet's transition. Many families send photos and progress
                        reports to give you peace of mind.</p>
                </section>

                <section class="request-section">
                    <h2>Begin Rehoming Process</h2>
                    <p>Our compassionate team will guide you every step of the way</p>
                    <a href="{{ route('client.rehome-form') }}" class="rehome-btn">FILL OUT NOW</a>
                </section>
            </div>
        </div>

        <section class="learning-center">
            <h3>Pawmilya Learning Center</h3>
            <address>
                L234 Compassion Blvd, Suite T01<br>
                Brightline, NY 10234<br>
                <span>Phone:</span> (555) 867-6543<br>
                <span>Email:</span> contact@pawmilya.org
            </address>
            <p class="mission">Our non-profit organization rescues and rehabilitates animals throughout the Philippines,
                promoting responsible pet ownership through community education.</p>
            <a href="about.html" class="learn-more">More About Our Mission →</a>
        </section>
    </main>


</x-customer-layout>
