<?php
$servername = "localhost";
$username = "valentin";
$password = "222007317";
$dbname = "advanced_drivers_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
