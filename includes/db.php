<?php
$host = "localhost";
$user = "root";  // Default for XAMPP/Laragon
$pass = "";       // Leave empty unless you set one
$db   = "blog_showcase";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: set charset
$conn->set_charset("utf8mb4");
?>
