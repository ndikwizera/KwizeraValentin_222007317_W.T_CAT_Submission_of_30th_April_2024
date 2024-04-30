<?php
// Include the database connection file
include('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // SQL query to insert message data into the database
    $sql = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute the statement using the database connection object
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

      echo "<a href='index.html'>Back</a>";
    
    $conn->close();
}
?>
