<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <img src="logo.jpg" alt="Pawmilya Logo">
                <span>Pawmilya</span>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="#"><i class="fas fa-paw"></i> Pets</a></li>
                    <li><a href="adopt.html"><i class="fas fa-home"></i> Adopt</a></li>
                    <li><a href="rehome.html"><i class="fas fa-heart"></i> Rehome</a></li>
                    <li><a href="donate.html" class="active"><i class="fas fa-hand-holding-heart"></i> Donation</a></li>
                    <li><a href="service.html"><i class="fas fa-concierge-bell"></i> Services</a></li>
                    <li><a href="about.html"><i class="fas fa-info-circle"></i> About Us</a></li>
                    <li><a href="Index.html" class="sign-in-btn"><i class="fas fa-home"></i> Home</a></li>
                </ul>
            </nav>
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <main class="main-container">
        {{ $slot }}
    </main>

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

</body>

</html>
