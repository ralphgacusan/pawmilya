<x-customer-layout>

    @section('title', 'About Us - Pawmilya')

    @push('styles')
        @vite(['resources/css/about.css'])
    @endpush


    <main class="about-page">
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1>About <span>Pawmilya</span></h1>
                    <p class="lead">Discover our mission to create lasting bonds between pets and families</p>
                </div>
            </div>
        </section>

        <section class="about-section section-padding">
            <div class="container">
                <div class="section-header">
                    <h2>Our Story</h2>
                    <p class="section-subtitle">How we became the leading pet adoption platform</p>
                </div>

                <div class="about-content">
                    <div class="about-text">
                        <h3>Founded in 2023</h3>
                        <p>Pawmilya began as a small group of animal lovers who wanted to make a difference in pet
                            adoption. What started as a local initiative has grown into a nationwide network connecting
                            thousands of pets with loving families each year.</p>
                        <p>Our team of veterinarians, animal behaviorists, and adoption specialists work tirelessly to
                            ensure every pet finds their perfect forever home.</p>
                    </div>

                </div>
            </div>

        </section>

        <section class="mission-section section-padding">
            <div class="container">
                <div class="mission-stats">
                    <div class="stat-item">
                        <div class="stat-number">10,000+</div>
                        <div class="stat-label">Pets Helped</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">200+</div>
                        <div class="stat-label">Shelter Partners</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Team Members</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-section section-padding">
            <div class="container">
                <div class="section-header">
                    <h2>Meet Our Founders</h2>
                    <p class="section-subtitle">The passionate people behind Pawmilya</p>
                </div>

                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-photo">
                            <img src="/Asset/jarl.jpg" alt="Founder 1">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <h3>Jarl</h3>
                        <p class="position">President</p>
                    </div>

                    <div class="team-member">
                        <div class="member-photo">
                            <img src="/Asset/ralph.jpg" alt="Founder 2">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <h3>Ralph</h3>
                        <p class="position">Senior VP</p>
                    </div>

                    <div class="team-member">
                        <div class="member-photo">
                            <img src="/Asset/oriel.jpg" alt="Founder 3">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <h3>Oriel</h3>
                        <p class="position">Vice President</p>
                    </div>

                    <div class="team-member">
                        <div class="member-photo">
                            <img src="/Asset/zai.jpg" alt="Founder 4">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <h3>Zai</h3>
                        <p class="position">VP of Finance</p>
                    </div>

                    <div class="team-member">
                        <div class="member-photo">
                            <img src="/Asset/king.jpg" alt="Founder 5">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <h3>King</h3>
                        <p class="position">VP of Development</p>
                    </div>

                    <div class="team-member">
                        <div class="member-photo">
                            <img src="/Asset/luis.jpg" alt="Founder 6">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <h3>Luis</h3>
                        <p class="position">VP of Operations</p>
                    </div>
                </div>
            </div>
        </section>
    </main>



</x-customer-layout>
