<?php
include('connection.php');

if (isset($_GET['id'])) {
    $fname = $_GET['id']; // Assuming id in the URL is the user name
    
    // Perform the delete query based on the user name
    $sql = "DELETE FROM customer WHERE first_Name = '$fname'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
        echo "<script>window.location.href = 'customerview.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
