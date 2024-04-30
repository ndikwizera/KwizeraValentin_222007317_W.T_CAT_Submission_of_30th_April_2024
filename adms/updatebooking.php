<?php
include('connection.php');

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $uname = $conn->real_escape_string($_POST['user_Name']);
    $location = $conn->real_escape_string($_POST['location']);
    $ehour = $conn->real_escape_string($_POST['estimated_hour']);
    $code = $conn->real_escape_string($_POST['payment_code']);
    $amount = $conn->real_escape_string($_POST['amount_perhour']);
    $tamount = $conn->real_escape_string($_POST['total_amount']);
    $date = $conn->real_escape_string($_POST['booking_date']);
    $hour = $conn->real_escape_string($_POST['booking_time']);

    $update_sql = "UPDATE booking SET user_Name='$uname', location='$location', estimated_hour='$ehour', payment_code='$code', amount_perhour='$amount', total_amount='$tamount', booking_date='$date', booking_time='$hour' WHERE user_Name='$id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'adminbookings.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data based on the ID from the URL parameter
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $select_sql = "SELECT * FROM booking WHERE user_Name='$id'";
    $result = $conn->query($select_sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $uname = $row['user_Name'];
        $location = $row['location'];
        $ehour = $row['estimated_hour'];
        $code = $row['payment_code'];
        $amount = $row['amount_perhour'];
        $tamount = $row['total_amount'];
        $date = $row['booking_date'];
        $hour = $row['booking_time'];
    } 
    else {
        echo "Booking not found";
        exit;
    }
    echo "<a href='adminbookings.php' style='position: absolute; top: 10px; right: 10px; color: black;'>Back</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .form-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Booking Information</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="uname">User Name:</label>
                <input type="text" id="uname" name="user_Name" value="<?php echo $uname; ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo $location; ?>" required>
            </div>
            <div class="form-group">
                <label for="ehour">Estimated Hour:</label>
                <input type="number" id="ehour" name="estimated_hour" value="<?php echo $ehour; ?>" required>
            </div>
            <div class="form-group">
                <label for="code">Payment Code:</label>
                <input type="number" id="code" name="payment_code" value="<?php echo $code; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="amount">Amount per Hour:</label>
                <input type="number" id="amount" name="amount_perhour" value="<?php echo $amount; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="tamount">Total Amount:</label>
                <input type="number" id="tamount" name="total_amount" value="<?php echo $tamount; ?>" required>
            </div>
            <div class="form-group">
                <label for="date">Booking Date:</label>
                <input type="date" id="date" name="booking_date" value="<?php echo $date; ?>" required>
            </div>
            <div class="form-group">
                <label for="hour">Booking Time:</label>
                <input type="time" id="hour" name="booking_time" value="<?php echo $hour; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="update">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
