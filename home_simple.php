<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ginba Hotel - Welcome</title>
    <link rel="stylesheet" href="styleCss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Simple Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Welcome to Ginba Hotel</h1>
                <p>Experience luxury and comfort in the heart of the city</p>
                <div class="hero-buttons">
                    <a href="booking.php" class="btn btn-primary">Book Now</a>
                    <a href="rooms.php" class="btn btn-secondary">View Rooms</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Simple Features Section -->
    <section class="features">
        <div class="container">
            <h2>Why Choose Ginba Hotel?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-concierge-bell"></i>
                    <h3>24/7 Service</h3>
                    <p>Round-the-clock concierge service</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-utensils"></i>
                    <h3>Fine Dining</h3>
                    <p>World-class restaurant and room service</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-wifi"></i>
                    <h3>Free WiFi</h3>
                    <p>High-speed internet throughout the hotel</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-swimming-pool"></i>
                    <h3>Swimming Pool</h3>
                    <p>Relaxing pool with city views</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Simple Rooms Section -->
    <section class="rooms-preview">
        <div class="container">
            <h2>Our Rooms</h2>
            <div class="rooms-grid">
                <div class="room-card">
                    <h3>Standard Room</h3>
                    <p>Comfortable rooms for business travelers</p>
                    <p class="price">From $99/night</p>
                    <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
                <div class="room-card">
                    <h3>Deluxe Room</h3>
                    <p>Spacious rooms with premium amenities</p>
                    <p class="price">From $149/night</p>
                    <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
                <div class="room-card">
                    <h3>Executive Suite</h3>
                    <p>Luxurious suites with living areas</p>
                    <p class="price">From $299/night</p>
                    <a href="booking.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Simple CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Book Your Stay?</h2>
            <p>Experience the best hospitality at Ginba Hotel</p>
            <a href="booking.php" class="btn btn-primary">Book Your Room</a>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        // Simple theme toggle functionality
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.className || 'light';
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            body.className = newTheme;
            localStorage.setItem('theme', newTheme);
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.body.className = savedTheme;
        });
    </script>
</body>
</html>