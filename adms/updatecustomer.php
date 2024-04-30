<?php
include('connection.php');

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $location = $conn->real_escape_string($_POST['location']);
    $car_category = $conn->real_escape_string($_POST['car_category']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = $conn->real_escape_string($_POST['password']);

    $update_sql = "UPDATE customer SET First_Name='$fname', Last_Name='$lname', location='$location', Car_Categories='$car_category', email='$email', phone_number='$phone', password='$password' WHERE First_Name='$id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'customerview.php';</script>"; 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data based on the ID from the URL parameter
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $select_sql = "SELECT * FROM customer WHERE First_Name='$id'";
    $result = $conn->query($select_sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $fname = $row['First_Name'];
        $lname = $row['Last_Name'];
        $location = $row['location'];
        $car_category = $row['Car_Categories'];
        $email = $row['email'];
        $phone = $row['phone_number'];
        $password = $row['password'];
    } else {
        echo "Customer not found";
        exit;
    }
    echo "<a href='customerview.php' style='position: absolute; top: 10px; right: 10px; color: black;'>Back</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
</head>
<body>
    <h1>Update Customer Information</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required><br><br>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required><br><br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $location; ?>" required><br><br>
        <label for="car_category">Car Categories:</label>
        <input type="text" id="car_category" name="car_category" value="<?php echo $car_category; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required><br><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>

