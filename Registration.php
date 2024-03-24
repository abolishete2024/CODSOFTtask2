<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject1";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the registration form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST["fullName"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $party-name = $_POST["party-name"];
    $candidate-name = $_POST["candidate-name"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO login (fullName, gender, age, party-name, candidate-name) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("sssss", $fullName, $gender, $age, $party-name, $candidate-name);

    if ($stmt->execute()) {
        // Registration completed
        echo "Registration Successful!";

        // Redirect to the registration page after a delay
        // header("refresh:3; url=registration.php");
        exit;
    } else {
        // An error occurred while storing credentials
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>