<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawmilya - Pet Adoption & Rescue</title>
    <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

</head>

<body>
    <!-- Header with Navigation -->
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <img src="{{ asset('imgs/logo.jpg') }}" alt="Pawmilya Logo">
                <span>Pawmilya</span>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="{{ route('client.pets') }}"><i class="fas fa-paw"></i> Pets</a></li>
                    <li><a href="{{ route('client.adopt') }}"><i class="fas fa-home"></i> Adopt</a></li>
                    <li><a href="{{ route('client.rehome') }}"><i class="fas fa-heart"></i> Rehome</a></li>
                    <li><a href="{{ route('client.donation') }}" class="active"><i
                                class="fas fa-hand-holding-heart"></i>
                            Donation</a></li>
                    <li><a href="{{ route('client.services') }}"><i class="fas fa-concierge-bell"></i> Services</a></li>
                    <li><a href="{{ route('client.about') }}"><i class="fas fa-info-circle"></i> About Us</a></li>
                    <li><a href="{{ route('auth.signin') }}"><i class="fas fa-user"></i> Account</a></li>
                    <li><a href="{{ route('client.home') }}" class="sign-in-btn"><i class="fas fa-home"></i> Home</a>
                    </li>
                </ul>
            </nav>
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Every Pet Deserves <span>Love</span></h1>
                <p class="subtitle">Find your perfect companion and give them a forever home through our adoption
                    network</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> Browse Pets</a>
                    <a href="#" class="btn btn-secondary"><i class="fas fa-heart"></i> How to Help</a>
                </div>
            </div>
            <div class="pet-showcase">
                <div class="pet-card">
                    <div class="pet-image">
                        <img src="/Asset/husky.webp" alt="Happy Dog">
                        <div class="pet-badge">Adopt Me!</div>
                    </div>
                    <div class="pet-info">
                        <h3>Falcon</h3>
                        <p>Siberian Husky • 2 years</p>
                    </div>
                </div>
                <div class="pet-card featured">
                    <div class="pet-image">
                        <img src="/Asset/navbg.jpeg" alt="Playful Cat">
                        <div class="pet-badge">Featured</div>
                    </div>
                    <div class="pet-info">
                        <h3>Luna and Sol</h3>
                        <p>Cat and Dog • 1 year</p>
                    </div>
                </div>
                <div class="pet-card">
                    <div class="pet-image">
                        <img src="/Asset/cat1.jpg" alt="Cute Rabbit">
                        <div class="pet-badge">Adopt Me!</div>
                    </div>
                    <div class="pet-info">
                        <h3>Cotton</h3>
                        <p>Holland Lop • 6 months</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <div class="section-header">
                <h2>Creating Lasting Bonds Between Pets and Families</h2>
                <p class="section-subtitle">We advocate responsible pet ownership through education and community
                    support</p>
            </div>
            <div class="about-grid">
                <div class="about-content">
                    <h3>Our Mission</h3>
                    <p>Pawmilya is dedicated to connecting pets with loving families. We believe every pet deserves a
                        home filled with care and warmth. Through our adoption and rehoming services, we ensure that
                        every furry friend finds their perfect match.</p>
                    <div class="mission-stats">
                        <div class="stat-item">
                            <div class="stat-number">1,200+</div>
                            <div class="stat-label">Pets Rescued</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">800+</div>
                            <div class="stat-label">Happy Adoptions</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">5,000+</div>
                            <div class="stat-label">Meals Provided</div>
                        </div>
                    </div>
                    <a href="about.html" class="btn btn-outline">Learn More</a>
                </div>
                <div class="about-gallery">
                    <div class="gallery-item">
                        <img src="{{ asset('imgs/dogown1.jpg') }}" alt="Happy family with pet">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('imgs/bg.jpeg') }}" alt="Pet care">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="process">
        <div class="container">
            <div class="section-header">
                <h2>How Adoption Works</h2>
                <p class="section-subtitle">Our simple 3-step process to find your perfect companion</p>
            </div>
            <div class="process-steps">
                <div class="step">
                    <div class="step-icon">
                        <div class="icon-circle">1</div>
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Browse Pets</h3>
                    <p>View our available pets with detailed profiles and personality descriptions</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <div class="icon-circle">2</div>
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Meet & Greet</h3>
                    <p>Schedule a visit to meet potential pets with our adoption counselors</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <div class="icon-circle">3</div>
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>Adoption</h3>
                    <p>Complete the process and bring your new family member home</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>Happy Tails</h2>
                <p class="section-subtitle">Stories from our Pawmilya community</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">"Adopting Max through Pawmilya was the best decision we ever made. The
                        team was so helpful throughout the entire process."</p>
                    <div class="testimonial-author">
                        <img src="hug4.webp" alt="Sarah J.">
                        <div class="author-info">
                            <h4>Sarah J.</h4>
                            <p>Adopted Max in 2023</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">"As a foster parent, I've seen firsthand the incredible work they do.
                        The support makes it so rewarding to help these animals."</p>
                    <div class="testimonial-author">
                        <img src="hug.jpg" alt="Michael T.">
                        <div class="author-info">
                            <h4>Michael T.</h4>
                            <p>Foster Parent</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Make a Difference?</h2>
                <p>Join our community and help pets in need today</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary btn-large"><i class="fas fa-paw"></i> Adopt Today</a>
                    <a href="donate.html" class="btn btn-secondary btn-large"><i
                            class="fas fa-hand-holding-heart"></i> Donate Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <div class="footer-logo">
                        <img src="logo.jpg" alt="Pawmilya Logo">
                        <span>Pawmilya</span>
                    </div>
                    <p>We are a non-profit organization dedicated to rescuing and rehabilitating stray and abandoned
                        animals in the Philippines. Our goal is to promote adoption and responsible pet care through
                        education and outreach programs.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Available Pets</a></li>
                        <li><a href="#">Adoption Process</a></li>
                        <li><a href="#">Foster Program</a></li>
                        <li><a href="#">Volunteer</a></li>
                        <li><a href="#">Events</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Pet Lane, Animal City</p>
                    <p><i class="fas fa-phone"></i> (555) 123-4567</p>
                    <p><i class="fas fa-envelope"></i> info@pawmilya.org</p>
                </div>
                <div class="footer-newsletter">
                    <h3>Stay Updated</h3>
                    <p>Subscribe to our newsletter for the latest updates</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Pawmilya. All rights reserved.</p>
                <div class="legal-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>
