<?php

session_start(); 

if(!isset($_SESSION["user_type"]) || $_SESSION["user_type"] === null){
    header("Location: login.php");
    exit; 
}

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $uname = $conn->real_escape_string($_POST["uname"]);
    $location = $conn->real_escape_string($_POST["location"]);
    $ehour = $conn->real_escape_string($_POST["ehour"]);
    $code = 354550; 
    $amount = 10000; 
    $tamount = $conn->real_escape_string($_POST["tamount"]);
    $date = $conn->real_escape_string($_POST["date"]);
    $hour = $conn->real_escape_string($_POST["hour"]);

    $sql = "INSERT INTO booking (user_Name, location, estimated_hour, payment_code, amount_perhour, total_amount, booking_date, booking_time)
            VALUES ('$uname', '$location', '$ehour', '$code', '$amount', '$tamount', '$date', '$hour')";

    if ($conn->query($sql) === TRUE) {
        
        echo "<script>alert('Booking successful!')</script>";
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: ;
        }
      
        .full-screen-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-title h1 {
            margin: 0;
            color: #333;
        }
        .Form {
            display: flex;
            flex-direction: column;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .input-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
 <header>
       <nav>
    <ul>
        <li class="logo-container">
                    <img class="logo" src="logo.JPG" alt="image" width="70" height="60">
                    <h2><b>Advanced Drivers Management System</b></h2>
                </li>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact us.html">Contact us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="bookings.php">My Account</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">settings</a>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
<body>
    <div class="full-screen-container">
        <div class="login-container">
            <div class="login-title">
                <h1>Welcome To Booking</h1>
            </div>

            <form action="booking.php" class="Form" method="post">
                <div class="input-group">
                    <label for="uname">User Name</label>
                    <input type="text" class="name" name="uname" placeholder="Enter your email" required>
                </div>

                <div class="input-group">
                    <label for="location">Location</label>
                    <input type="text" class="name" name="location" required>
                </div>

               <div class="input-group">
                    <label for="code">Payment code</label>
                    <input type="number" class="code" name="code" value="304052" readonly>
                </div>

                
                <div class="input-group">
                    <label for="ehour">Estimated hour</label>
                    <input type="number" class="hour" id="ehour" name="ehour" required>
                </div>

                <div class="input-group">
                    <label for="amount">Amount per hour</label>
                    <input type="number" class="amount" name="amount" value="10000" readonly>
                </div>

                <div class="input-group">
                    <label for="tamount">Total amount</label>
                    <input type="number" class="amount" id="tamount" name="tamount" required readonly>
                </div>

                <button type="button" class="login-button" onclick="calculateTotal()">Calculate Total</button>

                <div class="input-group">
                    <label for="date">Booking date</label>
                    <input type="date" class="date" name="date" required>
                </div>

                <div class="input-group">
                    <label for="hour">Booking Time</label>
                    <input type="time" class="hour" name="hour" required>
                </div>

                <button type="submit" class="login-button">Submit</button>
            </form>
        </div>
    </div>
    <footer>
        <p><marquee>&copy; 2024 Advanced Drivers Management System.</marquee></p>
    </footer>
    <script>
        function calculateTotal() {
            var estimatedHours = parseFloat(document.getElementById("ehour").value);
            var amountPerHour = 10000;
            var totalAmount = estimatedHours * amountPerHour;
            document.getElementById("tamount").value = totalAmount;
        }
    </script>
</body>
</html>