<?php
$pageTitle = 'Admin Login';
include 'header.php';
?>
<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        $error_message = "Username and password are required.";
    } else {
        $sql = "SELECT * FROM admins WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $admin = mysqli_fetch_assoc($result);
            if (password_verify($password, $admin['password'])) {
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];
                header("Location: adminDash.php"); // Redirect to admin dashboard
                exit();
            } else {
                $error_message = "Invalid password.";
            }
        } else {
            $error_message = "Admin not found.";
        }
    }

    mysqli_close($conn);
}
?>

<div class="admin-login-page">
    <div class="admin-login-container">
        <h2 class="admin-login-title">Admin Login</h2>

        <?php if (isset($error_message)): ?>
            <div class="admin-error-message">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="admin-form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="admin-form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="admin-form-buttons">
                <button type="submit" class="admin-btn-primary">Login</button>
            </div>
        </form>

        <div class="admin-login-footer">
            <p><a href="home.php">← Back to Home</a></p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>