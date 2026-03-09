<?php
$pageTitle = 'Payments';
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit();
}

require "connection.php";

$user_id = $_SESSION['user_id'];

// Get payments
$sql = "SELECT * FROM payments WHERE user_id = $user_id ORDER BY payment_date DESC";
$result = mysqli_query($conn, $sql);
?>

<section class="payments">
    <div class="container">
        <h2>Your Payments</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="payments-table">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Date</th>
                        <th>Related To</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>$<?php echo number_format($row['amount'], 2); ?></td>
                            <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                            <td><?php echo date('M d, Y H:i', strtotime($row['payment_date'])); ?></td>
                            <td><?php echo ucfirst(str_replace('_', ' ', $row['related_to'])); ?> #<?php echo $row['related_id']; ?></td>
                            <td><span class="status-<?php echo strtolower($row['status']); ?>"><?php echo ucfirst($row['status']); ?></span></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No payments found.</p>
        <?php endif; ?>
    </div>
</section>

<?php
mysqli_close($conn);
include 'footer.php';
?>