<?php
$pageTitle = 'User Login';
include 'header.php';
?>
<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        die("Email and password are required.");
    }

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: adminDash.php");
            } else {
                header("Location: userDash.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    mysqli_close($conn);
}
?>
     <!-- Login Form -->
    <section class="register">
        <div class="form-container">
            <h2 class="form-title">User Login</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn-primary">Login</button>
                </div>
            </form>
        </div>
    </section>
<?php include 'footer.php'; ?>