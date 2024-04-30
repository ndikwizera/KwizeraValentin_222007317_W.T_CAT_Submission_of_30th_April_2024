<?php
include('connection.php');

echo "<div style='text-align: center;'>"; // Center align content
echo "<h1>DRIVER TABLE</h1>"; // Add the heading for the table

// Check if the delete button is clicked
if (isset($_POST['delete_fname'])) {
    $delete_fname = $conn->real_escape_string($_POST['delete_fname']);
    $delete_sql = "DELETE FROM driver WHERE First_Name = '$delete_fname'";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Retrieve data from the database
$sql = "SELECT * FROM driver";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;' border=1>";
    echo "<tr style='background-color: teal; color: white;'>";
    echo "<th style='padding: 8px; text-align: left;'>First Name</th>";
    echo "<th style='padding: 8px; text-align: left;'>Last Name</th>";
    echo "<th style='padding: 8px; text-align: left;'>Location</th>";
    echo "<th style='padding: 8px; text-align: left;'>Car Category</th>";
    echo "<th style='padding: 8px; text-align: left;'>Email</th>";
    echo "<th style='padding: 8px; text-align: left;'>Phone</th>";
    echo "<th style='padding: 8px; text-align: left;'>Actions</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["First_Name"]."</td>";
        echo "<td>".$row["Last_Name"]."</td>";
        echo "<td>".$row["location"]."</td>";
        echo "<td>".$row["Car_Categories"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["phone_number"]."</td>";
        echo "<td>";
        echo "<form method='POST' action='".$_SERVER["PHP_SELF"]."'>";
        echo "<input type='hidden' name='delete_fname' value='".$row["First_Name"]."'>";
        echo "<button type='submit' style='background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;'>Delete</button>";
        echo "</form>";
        echo "<a href='update.php?id=".$row["First_Name"]."' style='background-color: #28a745; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; text-decoration: none; margin-left: 5px;'>Update</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
 echo "<a href='driver.php' style='position: absolute; top: 10px; right: 10px; color: black;'>Back</a>";
 echo "<a href='driverview.php' style='position: absolute; under: 10px; right: 10px; color: black;'>Back to Top</a>";
$conn->close();
?>
