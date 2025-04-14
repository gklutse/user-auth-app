<?php
$host = 'localhost';
$db = 'simple_user_auth_db';
$user = 'root';
$pass = ''; // empty password is default for XAMPP

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
