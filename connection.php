<?php
$conn = mysqli_connect("localhost", "root", "", "DB");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
