<?php
$pageTitle = 'Admin Dashboard';
include 'header.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin.php");
    exit();
}

require "connection.php";

// Handle POST requests for updates
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_booking'])) {
        $booking_id = $_POST['booking_id'];
        $status = $_POST['status'];
        $sql = "UPDATE bookings SET status = '$status' WHERE id = $booking_id";
        mysqli_query($conn, $sql);
    } elseif (isset($_POST['update_food_order'])) {
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];
        $sql = "UPDATE food_orders SET status = '$status' WHERE id = $order_id";
        mysqli_query($conn, $sql);
    } elseif (isset($_POST['update_payment'])) {
        $payment_id = $_POST['payment_id'];
        $status = $_POST['status'];
        $sql = "UPDATE payments SET status = '$status' WHERE id = $payment_id";
        mysqli_query($conn, $sql);
    } elseif (isset($_POST['assign_role'])) {
        $user_id = $_POST['user_id'];
        $role_id = $_POST['role_id'];
        $sql = "INSERT INTO user_roles (user_id, role_id) VALUES ($user_id, $role_id) ON DUPLICATE KEY UPDATE role_id = $role_id";
        mysqli_query($conn, $sql);
    }
}
?>

<section class="admin-dashboard">
    <div class="container">
        <h2>Admin Dashboard - Full Control</h2>
        <p class="admin-subtitle">Manage users, bookings, orders, and payments with comprehensive administrative tools</p>

        <!-- Manage Users -->
        <h3>Manage Users & Roles</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Current Roles</th>
                    <th>Assign Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT u.id, u.full_name, u.email, GROUP_CONCAT(r.role_name SEPARATOR ', ') as roles FROM users u LEFT JOIN user_roles ur ON u.id = ur.user_id LEFT JOIN roles r ON ur.role_id = r.id GROUP BY u.id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['roles'] ?: 'None'; ?></td>
                        <td>
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <select name="role_id">
                                    <?php
                                    $role_sql = "SELECT * FROM roles";
                                    $role_result = mysqli_query($conn, $role_sql);
                                    while ($role = mysqli_fetch_assoc($role_result)) {
                                        echo "<option value='{$role['id']}'>{$role['role_name']}</option>";
                                    }
                                    ?>
                                </select>
                                <button type="submit" name="assign_role" class="btn-small">Assign</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Manage Bookings -->
        <h3>Manage Bookings (Assign Rooms)</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Room Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT b.*, u.full_name FROM bookings b JOIN users u ON b.user_id = u.id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['check_in']; ?></td>
                        <td><?php echo $row['check_out']; ?></td>
                        <td><?php echo $row['room_type']; ?></td>
                        <td><?php echo isset($row['status']) ? $row['status'] : 'Pending'; ?></td>
                        <td>
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                <select name="status">
                                    <option value="confirmed">Confirm</option>
                                    <option value="checked_in">Check In</option>
                                    <option value="checked_out">Check Out</option>
                                    <option value="cancelled">Cancel</option>
                                </select>
                                <button type="submit" name="update_booking" class="btn-small">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Manage Food Orders -->
        <h3>Manage Food Orders (Prepare & Deliver)</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT fo.*, u.full_name, fm.name as food_name FROM food_orders fo JOIN users u ON fo.user_id = u.id JOIN food_menu fm ON fo.food_id = fm.id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['food_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>$<?php echo $row['total_price']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                <select name="status">
                                    <option value="confirmed">Confirm</option>
                                    <option value="preparing">Preparing</option>
                                    <option value="ready">Ready</option>
                                    <option value="delivered">Deliver</option>
                                </select>
                                <button type="submit" name="update_food_order" class="btn-small">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Manage Payments -->
        <h3>Manage Payments</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Related To</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT p.*, u.full_name FROM payments p JOIN users u ON p.user_id = u.id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td>$<?php echo $row['amount']; ?></td>
                        <td><?php echo $row['payment_method']; ?></td>
                        <td><?php echo ucfirst($row['related_to']); ?> #<?php echo $row['related_id']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="payment_id" value="<?php echo $row['id']; ?>">
                                <select name="status">
                                    <option value="pending">Pending</option>
                                    <option value="completed">Complete</option>
                                    <option value="failed">Failed</option>
                                </select>
                                <button type="submit" name="update_payment" class="btn-small">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

<?php
mysqli_close($conn);
include 'footer.php';
?>