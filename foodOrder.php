<?php
$pageTitle = 'Food Order';
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit();
}

require "connection.php";

$user_id = $_SESSION['user_id'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_id = $_POST["food_id"];
    $quantity = $_POST["quantity"];

    // Get food price
    $sql = "SELECT price FROM food_menu WHERE id = $food_id";
    $result = mysqli_query($conn, $sql);
    $food = mysqli_fetch_assoc($result);
    $total_price = $food['price'] * $quantity;

    // Insert order
    $sql = "INSERT INTO food_orders (user_id, food_id, quantity, total_price) VALUES ($user_id, $food_id, $quantity, $total_price)";
    if (mysqli_query($conn, $sql)) {
        $order_id = mysqli_insert_id($conn);
        // Insert payment record
        $payment_sql = "INSERT INTO payments (user_id, amount, payment_method, related_to, related_id) VALUES ($user_id, $total_price, 'Credit Card', 'food_order', $order_id)";
        mysqli_query($conn, $payment_sql);
        echo "<script>alert('Food order placed successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Get food menu
$sql = "SELECT * FROM food_menu";
$result = mysqli_query($conn, $sql);
?>

<section class="food-order">
    <div class="container">
        <h2>Order Food</h2>
        <div class="food-menu">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="food-item">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <p class="price">$<?php echo $row['price']; ?></p>
                    <form action="" method="post">
                        <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
                        <label>Quantity: <input type="number" name="quantity" min="1" value="1" required></label>
                        <button type="submit" class="btn-primary">Order</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php
mysqli_close($conn);
include 'footer.php';
?>