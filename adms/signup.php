<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fname = $conn->real_escape_string($_POST["fname"]);
    $lname = $conn->real_escape_string($_POST["lname"]);
    $location = $conn->real_escape_string($_POST["location"]);
    $car_category = $conn->real_escape_string($_POST["car_category"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["Pnumber"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Customer (First_Name, Last_Name, location, Car_Categories, email, phone_number, password)
            VALUES ('$fname', '$lname', '$location', '$car_category', '$email', '$phone', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        
        echo"<script>alert('Registration successful!')</script>";
         header("location: login.php");

    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
echo "<a href='login.php'>Back</a>";
$conn->close();
?>
