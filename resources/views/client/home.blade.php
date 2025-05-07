<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawmilya - Pet Adoption & Rescue</title>
    <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body> <!-- Header with Navigation -->
    <!-- Header with Navigation -->
    <header class="main-header">
        <div class="container">
            <a href="{{ route('client.home') }}" style="text-decoration: none;">
                <div class="logo">
                    <img src="{{ asset('imgs/logo.jpg') }}" alt="Pawmilya Logo">
                    <span>Pawmilya</span>
                </div>
            </a>

            <nav class="main-nav">
                <ul>
                    <li>
                        <a href="{{ route('client.pets') }}"
                            class="{{ request()->routeIs('client.pets') ? 'active' : '' }}">
                            <i class="fas fa-paw"></i> Pets
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.adopt') }}"
                            class="{{ request()->routeIs('client.adopt') ? 'active' : '' }}">
                            <i class="fas fa-home"></i> Adopt
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.rehome') }}"
                            class="{{ request()->routeIs('client.rehome') ? 'active' : '' }}">
                            <i class="fas fa-heart"></i> Rehome
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.donation') }}"
                            class="{{ request()->routeIs('client.donation') ? 'active' : '' }}">
                            <i class="fas fa-hand-holding-heart"></i> Donation
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.services') }}"
                            class="{{ request()->routeIs('client.services') ? 'active' : '' }}">
                            <i class="fas fa-concierge-bell"></i> Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.about') }}"
                            class="{{ request()->routeIs('client.about') ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i> About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.home') }}"
                            class="{{ request()->routeIs('client.home') ? 'active' : '' }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li>
                        <div class="user-dropdown">
                            <a href="#" class="sign-in-btn">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu">
                                @auth
                                    {{-- user account page --}}
                                    <a href="{{ route('auth.user-profile') }}">View Account</a>

                                    <form method="POST" action="{{ route('auth.logout') }}">
                                        @csrf
                                        <button type="submit">Log Out</button>
                                    </form>
                                @endauth

                                @guest
                                    <a href="{{ route('auth.signin') }}">Sign In</a>
                                    <a href="{{ route('auth.signup') }}">Sign Up</a>
                                @endguest
                            </div>
                        </div>

                    </li>

                </ul>
            </nav>
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- Notification System -->
    <div id="notification-container"></div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                showNotification(@json(session('success')), 'success');
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                showNotification(@json(session('error')), 'error');
            });
        </script>
    @endif

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Every Pet Deserves <span>Love</span></h1>
                <p class="subtitle">Find your perfect companion and give them a forever home through our adoption
                    network</p>
                <div class="cta-buttons"> <a href="{{ route('client.pets') }}" class="btn btn-primary"><i
                            class="fas fa-search"></i> Browse
                        Pets</a> <a href="{{ route('client.donation') }}" class="btn btn-secondary"><i
                            class="fas fa-heart"></i> How to
                        Help</a> </div>
            </div>
            <div class="pet-showcase">
                @foreach ($pets as $pet)
                    <div class="pet-card">
                        <div class="pet-image"> <img src="{{ asset('storage/' . $pet->image) }}" alt="Happy Dog">
                            <div class="pet-badge">Adopt Me!</div>
                        </div>
                        <div class="pet-info">
                            <h3>{{ $pet->name }}</h3>
                            <p>{{ $pet->breed }} • {{ \Carbon\Carbon::parse($pet->birth_date)->age }} years old</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> <!-- About Section -->
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
                    </div> <a href="{{ route('client.about') }}" class="btn btn-outline">Learn More</a>
                </div>
                <div class="about-gallery">
                    <div class="gallery-item"> <img src="{{ asset('imgs/dogown1.jpg') }}" alt="Happy family with pet">
                    </div>
                    <div class="gallery-item"> <img src="{{ asset('imgs/bg.jpeg') }}" alt="Pet care"> </div>
                </div>
            </div>
        </div>
    </section> <!-- How It Works Section -->
    <section class="process">
        <div class="container">
            <div class="section-header">
                <h2>How Adoption Works</h2>
                <p class="section-subtitle">Our simple 3-step process to find your perfect companion</p>
            </div>
            <div class="process-steps">
                <div class="step">
                    <div class="step-icon">
                        <div class="icon-circle">1</div> <i class="fas fa-search"></i>
                    </div>
                    <h3>Browse Pets</h3>
                    <p>View our available pets with detailed profiles and personality descriptions</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <div class="icon-circle">2</div> <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Meet & Greet</h3>
                    <p>Schedule a visit to meet potential pets with our adoption counselors</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <div class="icon-circle">3</div> <i class="fas fa-home"></i>
                    </div>
                    <h3>Adoption</h3>
                    <p>Complete the process and bring your new family member home</p>
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
                <div class="cta-buttons"> <a href="{{ route('client.adopt') }}" class="btn btn-primary btn-large"><i
                            class="fas fa-paw"></i> Adopt Today</a> <a href="{{ route('client.donation') }}"
                        class="btn btn-secondary btn-large"><i class="fas fa-hand-holding-heart"></i> Donate Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <a href="{{ route('client.home') }}" style="text-decoration: none; color: inherit;"
                        onmouseover="this.style.color='inherit'" onmousedown="this.style.color='inherit'">
                        <div class="footer-logo">
                            <img src="{{ asset('imgs/logo.jpg') }}" alt="Pawmilya Logo">
                            <span>Pawmilya</span>
                        </div>
                    </a>
                    <p>We are a non-profit organization dedicated to rescuing and rehabilitating stray and abandoned
                        animals in the Philippines. Our goal is to promote adoption and responsible pet care through
                        education and outreach programs.</p>
                    <div class="social-links"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a
                            href="#"><i class="fab fa-instagram"></i></a> <a href="#"><i
                                class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ route('client.pets') }}">Available Pets</a></li>
                        <li><a href="{{ route('client.adopt') }}">Adoption Process</a></li>
                        <li><a href="{{ route('client.rehome') }}">Rehoming Proccess</a></li>
                        <li><a href="{{ route('client.donation') }}">How to Donate?</a></li>
                        <li><a href="{{ route('client.services') }}">Services</a></li>
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
                    <form class="newsletter-form" action="{{ route('client.home') }}"> <input type="email"
                            placeholder="Your email address"> <button type="submit"><i
                                class="fas fa-paper-plane"></i></button> </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Pawmilya. All rights reserved.</p>
                <div class="legal-links"> <a href="{{ route('client.about') }}">Privacy Policy</a> <a
                        href="{{ route('client.about') }}">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
    <script>
        function showNotification(message, type = 'success', duration = 6000) {
            const container = document.getElementById('notification-container');
            const notif = document.createElement('div');
            notif.className = `notification ${type}`;
            notif.innerHTML = `
                <span>${message}</span>
                <span class="close-btn" onclick="this.parentElement.remove()">×</span>
            `;

            container.appendChild(notif);

            setTimeout(() => {
                notif.remove();
            }, duration);
        }
    </script>
</body>

</html>
