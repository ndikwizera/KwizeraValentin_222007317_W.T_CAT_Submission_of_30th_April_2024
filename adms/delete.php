<?php
include('connection.php');

if (isset($_GET['id'])) {
    $userName = $_GET['id']; // Assuming id in the URL is the user name
    
    // Perform the delete query based on the user name
    $sql = "DELETE FROM booking WHERE user_Name = '$userName'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
        echo "<script>window.location.href = 'adminbookings.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
