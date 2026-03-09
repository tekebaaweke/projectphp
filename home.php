<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - Luxury & Comfort</title>
    <link rel="stylesheet" href="styleCss.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Welcome to Ginba Hotel</h1>
            <p class="hero-subtitle">Experience luxury, comfort, and exceptional service in the heart of the city</p>
            <div class="hero-buttons">
                <a href="booking.php" class="btn-primary">Book Your Stay</a>
                <a href="rooms.php" class="btn-secondary">Explore Rooms</a>
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-overlay"></div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Why Choose Us?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                    <h3>24/7 Concierge</h3>
                    <p>Round-the-clock assistance for all your needs during your stay.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>Fine Dining</h3>
                    <p>Experience world-class cuisine in our award-winning restaurants.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h3>Spa & Wellness</h3>
                    <p>Relax and rejuvenate in our luxurious spa facilities.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-swimming-pool"></i>
                    </div>
                    <h3>Swimming Pool</h3>
                    <p>Enjoy our Olympic-sized pool with panoramic city views.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h3>High-Speed WiFi</h3>
                    <p>Stay connected with complimentary high-speed internet throughout the hotel.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shuttle-van"></i>
                    </div>
                    <h3>Airport Transfer</h3>
                    <p>Complimentary airport pickup and drop-off services.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms Preview Section -->
    <section class="rooms-preview">
        <div class="container">
            <h2 class="section-title">Our Rooms</h2>
            <div class="rooms-grid">
                <div class="room-card">
                    <div class="room-image">
                        <img src="images/standard.jpg" alt="Standard Room" onerror="this.src='https://via.placeholder.com/300x200/667eea/white?text=Standard+Room'">
                    </div>
                    <div class="room-content">
                        <h3>Standard Room</h3>
                        <p>Comfortable and cozy rooms perfect for business travelers.</p>
                        <div class="room-features">
                            <span><i class="fas fa-wifi"></i> Free WiFi</span>
                            <span><i class="fas fa-tv"></i> Smart TV</span>
                            <span><i class="fas fa-bed"></i> King Bed</span>
                        </div>
                        <p class="room-price">From $99/night</p>
                    </div>
                </div>
                <div class="room-card">
                    <div class="room-image">
                        <img src="images/deluxe.jpg" alt="Deluxe Room" onerror="this.src='https://via.placeholder.com/300x200/764ba2/white?text=Deluxe+Room'">
                    </div>
                    <div class="room-content">
                        <h3>Deluxe Room</h3>
                        <p>Spacious rooms with premium amenities and city views.</p>
                        <div class="room-features">
                            <span><i class="fas fa-wifi"></i> Free WiFi</span>
                            <span><i class="fas fa-tv"></i> Smart TV</span>
                            <span><i class="fas fa-bed"></i> King Bed</span>
                            <span><i class="fas fa-city"></i> City View</span>
                        </div>
                        <p class="room-price">From $149/night</p>
                    </div>
                </div>
                <div class="room-card">
                    <div class="room-image">
                        <img src="images/suite.jpg" alt="Executive Suite" onerror="this.src='https://via.placeholder.com/300x200/f093fb/white?text=Executive+Suite'">
                    </div>
                    <div class="room-content">
                        <h3>Executive Suite</h3>
                        <p>Luxurious suites with separate living areas and premium services.</p>
                        <div class="room-features">
                            <span><i class="fas fa-wifi"></i> Free WiFi</span>
                            <span><i class="fas fa-tv"></i> Smart TV</span>
                            <span><i class="fas fa-bed"></i> King Bed</span>
                            <span><i class="fas fa-couch"></i> Living Area</span>
                            <span><i class="fas fa-utensils"></i> Kitchen</span>
                        </div>
                        <p class="room-price">From $299/night</p>
                    </div>
                </div>
            </div>
            <div class="text-center" style="margin-top: 3rem;">
                <a href="rooms.php" class="btn-primary">View All Rooms</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Guests Say</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"An absolutely wonderful experience! The staff was incredibly attentive and the rooms were immaculate. Will definitely be back!"</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://via.placeholder.com/60x60/667eea/white?text=JD" alt="John Doe">
                        <div>
                            <h4>John Doe</h4>
                            <span>Business Traveler</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"The food was exceptional and the spa treatments were heavenly. Ginba Hotel exceeded all our expectations!"</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://via.placeholder.com/60x60/764ba2/white?text=JS" alt="Jane Smith">
                        <div>
                            <h4>Jane Smith</h4>
                            <span>Leisure Traveler</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Perfect location, amazing amenities, and top-notch service. This hotel sets the standard for luxury hospitality."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://via.placeholder.com/60x60/f093fb/white?text=MJ" alt="Mike Johnson">
                        <div>
                            <h4>Mike Johnson</h4>
                            <span>Frequent Guest</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready for an Unforgettable Experience?</h2>
                <p>Book your stay today and discover why Ginba Hotel is the preferred choice for discerning travelers worldwide.</p>
                <div class="cta-buttons">
                    <a href="booking.php" class="btn-primary">Book Now</a>
                    <a href="contact.php" class="btn-secondary">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        // Back button functionality
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = 'home.php';
            }
        }

        // Theme switching functionality
        let currentTheme = localStorage.getItem('theme') || 'default';
        const themes = ['default', 'dark', 'blue', 'green'];

        function applyTheme(theme) {
            // Remove all theme classes
            document.body.classList.remove('dark-theme', 'blue-theme', 'green-theme');

            // Apply new theme
            if (theme !== 'default') {
                document.body.classList.add(theme + '-theme');
            }

            // Update active theme icon
            const themeIcons = document.querySelectorAll('.theme-icon');
            themeIcons.forEach(icon => {
                icon.classList.remove('active');
                if (icon.dataset.theme === theme) {
                    icon.classList.add('active');
                }
            });

            // Save theme preference
            localStorage.setItem('theme', theme);
            currentTheme = theme;
        }

        function toggleTheme() {
            const currentIndex = themes.indexOf(currentTheme);
            const nextIndex = (currentIndex + 1) % themes.length;
            const nextTheme = themes[nextIndex];
            applyTheme(nextTheme);
        }

        // Dynamic cursor color effects
        let cursorGlow, cursorTrail, dynamicBg;
        let mouseX = 50, mouseY = 50;
        let hueRotate = 0;

        function createCursorEffects() {
            // Create dynamic background only (no cursor effects)
            dynamicBg = document.createElement('div');
            dynamicBg.className = 'dynamic-bg';
            document.body.appendChild(dynamicBg);
        }

        function updateCursorEffects(e) {
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            // Check if cursor is over the header
            const header = document.querySelector('.header');
            if (header) {
                const headerRect = header.getBoundingClientRect();
                if (mouseX >= headerRect.left && mouseX <= headerRect.right &&
                    mouseY >= headerRect.top && mouseY <= headerRect.bottom) {
                    // Reset all dynamic elements when cursor is over header
                    const dynamicElements = document.querySelectorAll('.dynamic-element');
                    dynamicElements.forEach(element => {
                        element.style.transform = 'scale(1)';
                        element.style.boxShadow = '0 4px 15px rgba(0,0,0,0.1)';
                    });
                    return; // Exit function, don't apply any effects
                }
            }

            // Simple hover effects without color changes or cursor visuals
            const dynamicElements = document.querySelectorAll('.dynamic-element');
            dynamicElements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const elementCenterX = rect.left + rect.width / 2;
                const elementCenterY = rect.top + rect.height / 2;
                const distance = Math.sqrt(Math.pow(mouseX - elementCenterX, 2) + Math.pow(mouseY - elementCenterY, 2));

                if (distance < 100) {
                    element.style.transform = 'scale(1.02)';
                    element.style.boxShadow = '0 6px 20px rgba(0,0,0,0.15)';
                } else {
                    element.style.transform = 'scale(1)';
                    element.style.boxShadow = '0 4px 15px rgba(0,0,0,0.1)';
                }
            });
        }

        function handleMouseLeave() {
            // No cursor effects to hide
        }

        function handleMouseEnter() {
            // No cursor effects to show
        }

        // Initialize theme on page load
        document.addEventListener('DOMContentLoaded', function() {
            applyTheme(currentTheme);

            // Add click handlers for individual theme icons
            const themeIcons = document.querySelectorAll('.theme-icon');
            themeIcons.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const theme = this.dataset.theme;
                    applyTheme(theme);
                });
            });

            // Initialize cursor effects
            createCursorEffects();

            // Add mouse event listeners
            document.addEventListener('mousemove', updateCursorEffects);
            document.addEventListener('mouseleave', handleMouseLeave);
            document.addEventListener('mouseenter', handleMouseEnter);

            // Add simple hover effects to cards
            const cards = document.querySelectorAll('.feature-card, .room-card, .testimonial-card');
            cards.forEach(card => {
                card.classList.add('dynamic-element');
            });

            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(btn => {
                btn.classList.add('dynamic-element');
            });

            // Scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-on-scroll');
                    }
                });
            }, observerOptions);

            const animatedElements = document.querySelectorAll('.feature-card, .room-card, .testimonial-card, .section-title, .section-subtitle');
            animatedElements.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>