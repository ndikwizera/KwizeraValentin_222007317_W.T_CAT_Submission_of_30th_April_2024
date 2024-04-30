<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Light gray background */
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Light gray border */
        }
        
        th {
            background-color: teal; /* Teal background for table headers */
            color: white; /* White text color for table headers */
        }
        
        tr:hover {
            background-color: #f2f2f2; /* Light gray background on hover */
        }
        
        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff; /* Blue color for links */
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        .search-form {
            margin-top: 20px;
        }
        
        .search-form input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 200px;
        }
        
        .search-form input[type="submit"] {
            padding: 8px;
            border: 1px solid #007bff;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    include('connection.php');

    echo "<div style='text-align: center;'>"; 
echo "<h1>MY BOOKINGS </h1>"; 
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_username"])) {
        $search_username = $conn->real_escape_string($_POST["search_username"]);
       
        $sql = "SELECT * FROM booking WHERE user_Name = '$search_username'";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            echo "<table>";
            echo "<tr><th>User Name</th><th>Location</th><th>Estimated Hour</th><th>Payment Code</th><th>Amount Per Hour</th><th>Total Amount</th><th>Booking Date</th><th>Booking Time</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["user_Name"] . "</td>";
                echo "<td>" . $row["location"] . "</td>";
                echo "<td>" . $row["estimated_hour"] . "</td>";
                echo "<td>" . $row["payment_code"] . "</td>";
                echo "<td>" . $row["amount_perhour"] . "</td>";
                echo "<td>" . $row["total_amount"] . "</td>";
                echo "<td>" . $row["booking_date"] . "</td>";
                echo "<td>" . $row["booking_time"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found for username: $search_username";
        }
    }
  
    $conn->close();
    ?>
    <div class="search-form">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="search_username">Search by User Name:</label>
            <input type="text" id="search_username" name="search_username" required>
            <input type="submit" value="Search">
        </form>
    </div>
    
    <a href='booking.php'>Back to Booking Page</a>
</body>
</html>

