<?php
$servername = "localhost";
$username = "user21109";
$password = "pwd21109";
$dbname = "db21109";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


