<?php
// Setup script to create database and tables

// Connect to MySQL (without database)
$conn = mysqli_connect("localhost", "root", "", "");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS DB";
if (mysqli_query($conn, $sql)) {
    echo "Database 'DB' created successfully.<br>";
} else {
    die("Error creating database: " . mysqli_error($conn));
}

// Select database
mysqli_select_db($conn, "DB");

// Create users table
$users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    mobile VARCHAR(20),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (mysqli_query($conn, $users)) {
    echo "Users table created successfully.<br>";
} else {
    die("Error creating users table: " . mysqli_error($conn));
}

// Create bookings table
$bookings = "CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    check_in DATE,
    check_out DATE,
    room_type VARCHAR(50),
    status ENUM('pending', 'confirmed', 'checked_in', 'checked_out', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
if (mysqli_query($conn, $bookings)) {
    echo "Bookings table created successfully.<br>";
} else {
    die("Error creating bookings table: " . mysqli_error($conn));
}

// Create food_menu table
$food_menu = "CREATE TABLE IF NOT EXISTS food_menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    description TEXT,
    category VARCHAR(50)
)";
if (mysqli_query($conn, $food_menu)) {
    echo "Food menu table created successfully.<br>";
} else {
    die("Error creating food menu table: " . mysqli_error($conn));
}

// Create food_orders table
$food_orders = "CREATE TABLE IF NOT EXISTS food_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    food_id INT,
    quantity INT,
    total_price DECIMAL(10,2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'confirmed', 'preparing', 'ready', 'delivered') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (food_id) REFERENCES food_menu(id)
)";
if (mysqli_query($conn, $food_orders)) {
    echo "Food orders table created successfully.<br>";
} else {
    die("Error creating food orders table: " . mysqli_error($conn));
}

// Create payments table
$payments = "CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    amount DECIMAL(10,2),
    payment_method VARCHAR(50),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    related_to ENUM('booking', 'food_order') DEFAULT 'booking',
    related_id INT,
    status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
if (mysqli_query($conn, $payments)) {
    echo "Payments table created successfully.<br>";
} else {
    die("Error creating payments table: " . mysqli_error($conn));
}

// Create roles table
$roles = "CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) UNIQUE,
    description TEXT
)";
if (mysqli_query($conn, $roles)) {
    echo "Roles table created successfully.<br>";
} else {
    die("Error creating roles table: " . mysqli_error($conn));
}

// Create user_roles table
$user_roles = "CREATE TABLE IF NOT EXISTS user_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    role_id INT,
    assigned_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (role_id) REFERENCES roles(id)
)";
if (mysqli_query($conn, $user_roles)) {
    echo "User roles table created successfully.<br>";
} else {
    die("Error creating user roles table: " . mysqli_error($conn));
}

// Create admins table
$admins = "CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
)";
if (mysqli_query($conn, $admins)) {
    echo "Admins table created successfully.<br>";
} else {
    die("Error creating admins table: " . mysqli_error($conn));
}

// Insert sample user
$userPass = password_hash("user123", PASSWORD_DEFAULT);
$sql = "INSERT IGNORE INTO users (full_name, mobile, email, password) VALUES ('Naol Test', '0912345678', 'naol@test.com', '$userPass')";
if (mysqli_query($conn, $sql)) {
    echo "Sample user inserted successfully.<br>";
} else {
    echo "Error inserting user: " . mysqli_error($conn) . "<br>";
}

// Insert admin
$adminPass = password_hash("admin123", PASSWORD_DEFAULT);
$sql = "INSERT IGNORE INTO admins (username, password) VALUES ('admin', '$adminPass')";
if (mysqli_query($conn, $sql)) {
    echo "Admin inserted successfully.<br>";
} else {
    echo "Error inserting admin: " . mysqli_error($conn) . "<br>";
}

// Insert sample food menu
$foodItems = [
    ['Pizza Margherita', 12.99, 'Classic pizza with tomato sauce, mozzarella, and basil', 'Main Course'],
    ['Burger', 8.99, 'Juicy beef burger with lettuce, tomato, and cheese', 'Main Course'],
    ['Caesar Salad', 6.99, 'Fresh salad with romaine lettuce, croutons, and Caesar dressing', 'Appetizer'],
    ['Pasta Carbonara', 10.99, 'Creamy pasta with bacon, eggs, and Parmesan cheese', 'Main Course'],
    ['Ice Cream Sundae', 4.99, 'Vanilla ice cream with chocolate sauce and nuts', 'Dessert'],
    ['Coffee', 2.99, 'Freshly brewed coffee', 'Beverage']
];

foreach ($foodItems as $item) {
    $sql = "INSERT IGNORE INTO food_menu (name, price, description, category) VALUES ('$item[0]', $item[1], '$item[2]', '$item[3]')";
    if (!mysqli_query($conn, $sql)) {
        echo "Error inserting food item: " . mysqli_error($conn) . "<br>";
    }
}
echo "Sample food menu inserted successfully.<br>";

// Insert sample roles
$roleItems = [
    ['Customer', 'Hotel guest who can book rooms and order food'],
    ['Admin', 'System administrator with full access'],
    ['Manager', 'Hotel manager overseeing operations'],
    ['Chef', 'Kitchen staff responsible for food preparation'],
    ['Housekeeper', 'Staff responsible for room cleaning and maintenance'],
    ['Receptionist', 'Front desk staff handling bookings and check-ins']
];

foreach ($roleItems as $role) {
    $sql = "INSERT IGNORE INTO roles (role_name, description) VALUES ('$role[0]', '$role[1]')";
    if (!mysqli_query($conn, $sql)) {
        echo "Error inserting role: " . mysqli_error($conn) . "<br>";
    }
}
echo "Sample roles inserted successfully.<br>";

// Assign roles to sample user and admin
$user_id = 1; // Assuming the inserted user has id 1
$admin_user_id = 2; // Need to get admin user id, but since admin is separate, perhaps assign to a user

// For simplicity, assign Customer role to sample user
$sql = "INSERT IGNORE INTO user_roles (user_id, role_id) VALUES ($user_id, 1)"; // 1 is Customer
mysqli_query($conn, $sql);

echo "Roles assigned successfully.<br>";

echo "Setup completed successfully!";

mysqli_close($conn);
?>