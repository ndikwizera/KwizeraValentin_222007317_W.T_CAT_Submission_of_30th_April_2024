<?php

session_start();

if(!isset($_SESSION["user_type"]) || $_SESSION["user_type"] === null){
    header("Location: login.php");
    exit; 
}

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $conn->real_escape_string($_POST["fname"]);
    $lname = $conn->real_escape_string($_POST["lname"]);
    $location = $conn->real_escape_string($_POST["location"]);
    $Car_Categories = $conn->real_escape_string($_POST["Car_Categories"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone_number = $conn->real_escape_string($_POST["phone_number"]);

    $sql = "INSERT INTO driver (first_name, last_name, location, Car_Categories, email, phone_number)
            VALUES ('$fname', '$lname', '$location', '$Car_Categories', '$email', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully";
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
    <title>Driver</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
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
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .add-button {
            background-color: green;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .view-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .view-button:hover {
            background-color: #0056b3;
        }
        .message-button  {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .message-button :hover {
            background-color: #218838;
        }
        .customers-button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .customers-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
 <header>
       <nav>
    <ul>
       <li class="logo-container">
                    <img class="logo" src="logo.JPG" alt="image" width="70" height="60">
                    <h3><b>Advanced Drivers Management System</b></h3>
                </li>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact us.html">Contact us</a></li>
                <li><a href="adminbookings.php">View Bookings</a></li>
                <li><a href="customerview.php"> View Customers</a></li>
                <li><a href="messageview.php">Messages</a></li>
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
                <h1>REGISTER DRIVER</h1>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="sign in" method="POST">
                <div class="input-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="fname" name="fname" required>
                </div>
                <div class="input-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="lname" name="lname" required>
                </div>
                <div class="input-group">
                    <label for="location">Location</label>
                    <input type="text" class="location" name="location" required>
                </div>
                <div class="input-group">
                    <label for="Car_Categories">Car Categories</label>
                    <input type="text" class="car_category" name="Car_Categories" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" class="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="phone_number">Phone</label>
                    <input type="tel" class="phone" name="phone_number" required>
                </div>
                <div class="button-group">
                    <button type="submit" class="add-button">ADD</button>
                    <button type="submit" class="view-button"><a href="driverview.php">VIEW</a></button>

                </div>
            </form>
        </div>
    </div>
    <footer>
        <p><marquee>&copy; 2024 Advanced Drivers Management System.</marquee></p>
    </footer>
</body>
</html>
