<?php
$pageTitle = 'Book Your Stay';
include 'header.php';
?>
<?php
require "connection.php";

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to make a booking.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $check_in = trim($_POST["check_in"]);
    $check_out = trim($_POST["check_out"]);
    $room_type = trim($_POST["room_type"]);

    // Basic validation
    if (empty($check_in) || empty($check_out) || empty($room_type)) {
        die("All fields are required.");
    }

    $sql = "INSERT INTO bookings (user_id, check_in, check_out, room_type) VALUES ('$user_id', '$check_in', '$check_out', '$room_type')";
    if (mysqli_query($conn, $sql)) {
        $booking_id = mysqli_insert_id($conn);
        // Insert payment record
        $amount = 100.00; // Fixed amount for demo
        $payment_sql = "INSERT INTO payments (user_id, amount, payment_method, related_to, related_id) VALUES ('$user_id', '$amount', 'Credit Card', 'booking', '$booking_id')";
        mysqli_query($conn, $payment_sql);
        echo "Booking inserted successfully";
    } else {
        echo "Error inserting booking: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

  <!-- booking the customer -->
     
    <section class="booking-section">
        <div class="container">
            <h2>Book Your Stay</h2>
            <div class="booking-form-container">
                <form class="booking-form" action="" method="post">
                    <div class="form-group">
                        <label for="check_in">Check-in Date</label>
                        <input type="date" id="check_in" name="check_in" required>
                    </div>
                    <div class="form-group">
                        <label for="check_out">Check-out Date</label>
                        <input type="date" id="check_out" name="check_out" required>
                    </div>
                    <div class="form-group">
                        <label for="room_type">Room Type</label>
                        <select id="room_type" name="room_type" required>
                            <option value="">Select Room Type</option>
                            <option value="Standard Room">Standard Room - $100/night</option>
                            <option value="Deluxe Room">Deluxe Room - $150/night</option>
                            <option value="Executive Suite">Executive Suite - $250/night</option>
                        </select>
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn-primary">Complete Booking</button>
                        <a href="userDash.php" class="btn-secondary">Back to Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
     </section>
     <!-- footer -->
<?php include 'footer.php'; ?> 