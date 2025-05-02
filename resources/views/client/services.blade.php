<x-customer-layout>

    @section('title', 'Our Services - Pawmilya')


    @push('styles')
        @vite(['resources/css/service.css', 'resources/css/about.css'])
    @endpush



    <main>
        <section class="services-hero">
            <div class="services-hero-content">
                <h1>Our Professional Pet Services</h1>
                <p>Comprehensive care for your furry family members</p>
            </div>
        </section>

        <section class="services-container">
            <div class="services-intro">
                <h2>Exceptional Care for Your Pets</h2>
                <p>At Pawmilya, we offer a full range of services to keep your pets healthy, happy, and looking their
                    best. Our experienced team provides compassionate care with your pet's wellbeing as our top
                    priority.</p>
            </div>

            <div class="services-grid">
                <!-- Grooming Service -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <img src="/Asset/groom.webp" alt="Grooming">
                        </div>
                        <h3>Professional Grooming</h3>
                        <ul>
                            <li>Bath & blow dry</li>
                            <li>Haircut & styling</li>
                            <li>Nail trimming</li>
                            <li>Ear cleaning</li>
                            <li>Teeth brushing</li>
                        </ul>
                    </div>
                    <a href="#" class="service-btn">Book Now</a>
                </div>

                <!-- Health Checkup -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <img src="/Asset/checkup.webp" alt="Health Checkup">
                        </div>
                        <h3>Health Checkups</h3>
                        <ul>
                            <li>Comprehensive physical exams</li>
                            <li>Vaccinations</li>
                            <li>Parasite screening</li>
                            <li>Senior pet wellness</li>
                            <li>Nutrition counseling</li>
                        </ul>
                    </div>
                    <a href="#" class="service-btn">Schedule Appointment</a>
                </div>

                <!-- Training -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <img src="/Asset/train.webp" alt="Training">
                        </div>
                        <h3>Obedience Training</h3>
                        <ul>
                            <li>Puppy kindergarten</li>
                            <li>Basic obedience</li>
                            <li>Behavior modification</li>
                            <li>Potty training</li>
                            <li>Socialization classes</li>
                        </ul>
                    </div>
                    <a href="#" class="service-btn">Learn More</a>
                </div>

                <!-- Spay/Neuter -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <img src="/Asset/neuter.jpg" alt="Spay/Neuter">
                        </div>
                        <h3>Spay & Neuter</h3>
                        <ul>
                            <li>Safe surgical procedures</li>
                            <li>Pre-op blood work</li>
                            <li>Pain management</li>
                            <li>Recovery monitoring</li>
                            <li>Post-op care instructions</li>
                        </ul>
                    </div>
                    <a href="#" class="service-btn">Get Details</a>
                </div>

                <!-- Deworming -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <img src="/Asset/deworm.webp" alt="Deworming">
                        </div>
                        <h3>Deworming Treatments</h3>
                        <ul>
                            <li>Intestinal parasite screening</li>
                            <li>Comprehensive deworming</li>
                            <li>Preventative medications</li>
                            <li>Fecal testing</li>
                            <li>Follow-up care</li>
                        </ul>
                    </div>
                    <a href="#" class="service-btn">View Options</a>
                </div>

                <!-- Other Services -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <img src="/Asset/add.png" alt="Other Services">
                        </div>
                        <h3>Additional Services</h3>
                        <ul>
                            <li>Microchipping</li>
                            <li>Dental cleaning</li>
                            <li>Pet boarding</li>
                            <li>Emergency care</li>
                            <li>Specialty referrals</li>
                        </ul>
                    </div>
                    <a href="#" class="service-btn">Explore All</a>
                </div>
            </div>


            <div class="service-cta">
                <h2>Ready to Schedule a Service?</h2>
                <p>Contact us today to book an appointment or learn more about our offerings.</p>
                <div class="cta-buttons">
                    <a href="#" class="service-btn">Call Now</a>

                    <a href="mailto:services@pawmilya.org" class="cta-btn email">Email Us</a>
                </div>
            </div>
        </section>
    </main>

</x-customer-layout>
