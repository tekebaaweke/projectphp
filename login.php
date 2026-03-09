<?php
$pageTitle = 'Register';
include 'header.php';
?>
<?php
require "connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data and trim spaces
    $name     = trim($_POST["name"]);
    $mobile   = trim($_POST["mobile"]);
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Regular Expressions
    $nameRegex     = "/^[A-Za-z\s]+$/";
    $mobileRegex   = "/^[0-9]+$/";
    $passwordRegex = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]{7,}$/";

    // Name Validation
    if (!preg_match($nameRegex, $name)) {
        die("❌ Invalid Name: Only letters and spaces allowed.");
    }

    // Mobile Validation
    if (!preg_match($mobileRegex, $mobile)) {
        die("❌ Invalid Mobile Number: Only numbers allowed.");
    }

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Invalid Email Address.");
    }

    // Password Validation
    if (!preg_match($passwordRegex, $password)) {
        die("❌ Password must be at least 7 characters and contain at least one letter and one number.");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (full_name, mobile, email, password) VALUES ('$name', '$mobile', '$email', '$hashedPassword')";
    if (mysqli_query($conn, $sql)) {
        $user_id = mysqli_insert_id($conn);
        // Assign Customer role (assuming role_id 1 is Customer)
        $role_sql = "INSERT INTO user_roles (user_id, role_id) VALUES ($user_id, 1)";
        mysqli_query($conn, $role_sql);
        echo "✅ Registration Successful!";
    } else {
        if (mysqli_errno($conn) == 1062) { // Duplicate email
            echo "❌ Email already exists.";
        } else {
            echo "❌ Registration failed: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
     <!-- Registration Form -->
    <section class="register">
        <div class="form-container">
            <h2 class="form-title">Register With Us</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn-primary">Register</button>
                    <button type="button" class="btn-secondary">Logout</button>
                            
            </form>
        </div>
    </section>
<?php include 'footer.php'; ?>