<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styleCss.css">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Hotel Management'; ?></title>
</head>
<body>
    <!-- Back Button -->
    <?php if (basename($_SERVER['PHP_SELF']) !== 'home.php' && basename($_SERVER['PHP_SELF']) !== 'index.php'): ?>
    <div class="back-button-container">
        <button onclick="goBack()" class="back-button">
            <i class="fas fa-arrow-left"></i> Back
        </button>
    </div>
    <?php endif; ?>

    <!-- Theme Toggle Button -->
    <div class="theme-toggle-container">
        <div class="theme-toggle" onclick="toggleTheme()" title="Change Theme">
            <div class="theme-icon active" data-theme="default"></div>
            <div class="theme-icon" data-theme="dark"></div>
            <div class="theme-icon" data-theme="blue"></div>
            <div class="theme-icon" data-theme="green"></div>
        </div>
    </div>

    <div class="header">
        <h1><u>HOTEL MANAGEMENT</u></h1>
        <div class="navigation">
            <ul class="nav">
                <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>

                <?php if (!isset($_SESSION['user_id'])): ?>
                    <!-- Public Navigation -->
                    <li><a href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="menu.php"><i class="fas fa-utensils"></i> Menu</a></li>
                    <li><a href="rooms.php"><i class="fas fa-bed"></i> Rooms</a></li>
                    <li><a href="gallery.php"><i class="fas fa-images"></i> Gallery</a></li>
                    <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
                    <li><a href="booking.php"><i class="fas fa-calendar-check"></i> Booking</a></li>
                    <li><a href="admin.php"><i class="fas fa-user-shield"></i> Admin</a></li>
                    <li><a href="login.php"><i class="fas fa-user-plus"></i> Register</a></li>
                    <li><a href="userLogin.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>

                <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <!-- Admin Navigation -->
                    <li><a href="adminDash.php"><i class="fas fa-cogs"></i> Admin Dashboard</a></li>
                    <li><a href="adminTable.php"><i class="fas fa-users"></i> Manage Users</a></li>
                    <li><a href="bookingTable.php"><i class="fas fa-calendar-alt"></i> Manage Bookings</a></li>
                    <li><a href="userTable.php"><i class="fas fa-utensils"></i> Manage Orders</a></li>
                    <li><a href="insertAdimn.php"><i class="fas fa-user-plus"></i> Add Admin</a></li>
                    <li><i class="fas fa-user-shield"></i> Welcome Admin, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

                <?php else: ?>
                    <!-- User Navigation -->
                    <li><a href="userDash.php"><i class="fas fa-tachometer-alt"></i> My Dashboard</a></li>
                    <li><a href="booking.php"><i class="fas fa-calendar-check"></i> Book Room</a></li>
                    <li><a href="foodOrder.php"><i class="fas fa-utensils"></i> Order Food</a></li>
                    <li><a href="orderHistory.php"><i class="fas fa-history"></i> My Orders</a></li>
                    <li><a href="payments.php"><i class="fas fa-credit-card"></i> Payments</a></li>
                    <li><a href="rooms.php"><i class="fas fa-bed"></i> View Rooms</a></li>
                    <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
                    <li><i class="fas fa-user"></i> Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <script>
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = 'home.php';
            }
        }
    </script>