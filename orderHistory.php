<?php
$pageTitle = 'Order History';
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit();
}

require "connection.php";

$user_id = $_SESSION['user_id'];
?>

<section class="order-history">
    <div class="container">
        <h2>Your Order History</h2>

        <h3>Room Bookings</h3>
        <?php
        $sql = "SELECT * FROM bookings WHERE user_id = $user_id ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0): ?>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Room Type</th>
                        <th>Booked On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['check_in']; ?></td>
                            <td><?php echo $row['check_out']; ?></td>
                            <td><?php echo $row['room_type']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No bookings found.</p>
        <?php endif; ?>

        <h3>Food Orders</h3>
        <?php
        $sql = "SELECT fo.*, fm.name, fm.price FROM food_orders fo JOIN food_menu fm ON fo.food_id = fm.id WHERE fo.user_id = $user_id ORDER BY fo.order_date DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0): ?>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Food Item</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>$<?php echo $row['total_price']; ?></td>
                            <td><?php echo $row['order_date']; ?></td>
                            <td><?php echo ucfirst($row['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No food orders found.</p>
        <?php endif; ?>
    </div>
</section>

<?php
mysqli_close($conn);
include 'footer.php';
?>