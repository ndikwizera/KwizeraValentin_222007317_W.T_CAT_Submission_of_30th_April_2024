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
    </style>
</head>
<body>
    <?php
    include('connection.php');

     echo "<div style='text-align: center;'>"; 
echo "<h1>  BOOKING TABLE</h1>"; 
    
    // SQL query to retrieve all data from the booking table
    $sql = "SELECT * FROM booking";
    
    // Execute the query and fetch the result
    $result = $conn->query($sql);
    
    // Check if there are any rows in the result
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table>";
        echo "<tr><th>User Name</th><th>Location</th><th>Estimated Hour</th><th>Payment Code</th><th>Amount Per Hour</th><th>Total Amount</th><th>Booking Date</th><th>Booking Time</th><th>Actions</th></tr>";
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
            echo "<td>";
            echo "<a href='updatebooking.php?id=" . $row["user_Name"] . "'>Update</a>"; // Update action link using user name
            echo "<a href='delete.php?id=" . $row["user_Name"] . "'>Delete</a>"; // Delete action link using user name
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
        // Add back button
        echo "<a href='driver.php' style='position: absolute; top: 10px; right: 10px; color: black;'>Back</a>";
        echo "<a href='adminbookings.php' style='position: absolute; under: 10px; right: 10px; color: black;'>Back to Top</a>";
    } else {
        echo "No results found";
    }
    
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
