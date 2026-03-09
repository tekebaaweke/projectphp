<?php
$pageTitle = 'User Dashboard';
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>

<section class="dashboard">
    <div class="container">
        <h2>Welcome to Your Dashboard, <?php echo htmlspecialchars($user_name); ?>!</h2>
        <p>Manage your bookings, orders, and payments here.</p>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3><i class="fas fa-calendar-check"></i> Room Booking</h3>
                <p>Book your rooms and manage existing bookings.</p>
                <a href="booking.php" class="btn-primary">Book Now</a>
            </div>

            <div class="dashboard-card">
                <h3><i class="fas fa-utensils"></i> Food Order</h3>
                <p>Order delicious food from our menu.</p>
                <a href="foodOrder.php" class="btn-primary">Order Food</a>
            </div>

            <div class="dashboard-card">
                <h3><i class="fas fa-credit-card"></i> Payments</h3>
                <p>View and manage your payment history.</p>
                <a href="payments.php" class="btn-primary">View Payments</a>
            </div>

            <div class="dashboard-card">
                <h3><i class="fas fa-history"></i> Order History</h3>
                <p>Check your booking and food order history.</p>
                <a href="orderHistory.php" class="btn-primary">View History</a>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>