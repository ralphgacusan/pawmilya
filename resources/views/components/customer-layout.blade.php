<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'Pawmilya')</title>
    <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('styles')
    @yield('styles') <!-- This will allow child layout to inject styles -->
</head>

<body>
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

    <main class="main-container">

        {{ $slot }}
    </main>

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
