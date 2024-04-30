<?php
include('connection.php');

echo "<div style='text-align: center;'>"; 
echo "<h1>MESSAGES</h1>"; 


if (isset($_POST['delete_name'])) {
    $delete_name = $conn->real_escape_string($_POST['delete_name']); 
    $delete_sql = "DELETE FROM message WHERE name = '$delete_name'"; 
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$sql = "SELECT * FROM message";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;' border=1>";
    echo "<tr style='background-color: teal; color: white;'>";
    echo "<th style='padding: 8px; text-align: left;'>name</th>";
    echo "<th style='padding: 8px; text-align: left;'>email</th>";
    echo "<th style='padding: 8px; text-align: left;'>message</th>";
    echo "<th style='padding: 8px; text-align: left;'>Actions</th>"; 
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["message"]."</td>";
        echo "<td>";
        echo "<form method='POST' action='".$_SERVER["PHP_SELF"]."'>";
        echo "<input type='hidden' name='delete_name' value='".$row["name"]."'>";
        echo "<button type='submit' name='delete_submit' style='background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;'>Delete</button>"; 
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
 echo "<a href='driver.php' style='position: absolute; top: 10px; right: 10px; color: black;'>Back</a>";
 echo "<a href='messageview.php' style='position: absolute; under: 10px; right: 10px; color: black;'>Back to Top</a>";
echo "</div>";
$conn->close();
?>
