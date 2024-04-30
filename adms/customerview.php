<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        table {
            width: 80%; 
            border-collapse: collapse;
            margin:10px auto;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: teal;
            color: white;
        }
        
        tr:hover {
            background-color: #f2f2f2; 
        }
        
        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }
        
        a:hover {
            text-decoration: underline;
        }

        .footer-link {
            position: fixed;
            bottom: 10px;
            left: 10px;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="search-form">
        <form method="POST" action="searchcustomer.php">
            <label for="search_username">Search by User Name:</label>
            <input type="text" id="search_username" name="search_username" required>
            <input type="submit" value="Search">
        </form>
    </div>
    
    <?php
    include('connection.php');
    echo "<div style='text-align: center;'>"; 
echo "<h1>CUSTOMER TABLE</h1>"; 

    $sql = "SELECT * FROM customer";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table >";
        echo "<tr><th>First_Name</th><th>Last_Name</th><th>Location</th><th>Car_Categories</th><th>email</th><th>phone_number</th><th>password</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["First_Name"] . "</td>";
            echo "<td>" . $row["Last_Name"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td>" . $row["Car_Categories"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone_number"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>";
            echo "<a href='updatecustomer.php?id=" . $row["First_Name"] . "'>Update</a>";
            echo "<a href='deletecustomer.php?id=" . $row["First_Name"] . "'>Delete</a>"; 
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
        echo "<a href='driver.php' style='position: absolute; top: 10px; right: 10px; color: black;'>Back to driver Page</a>";
        echo "<a href='customerview.php' style='position: absolute; under: 10px; right: 10px; color: black;'>Back to Top</a>";
    } else {
        echo "No results found";
    }
    
    // Close the database connection
    $conn->close();
    ?>

</body>
</html>