<?php
// Replace these values with your MySQL database credentials
$hostname = "localhost";     // Usually 'localhost' if using a local server
$username = "root";     // MySQL username
$password = "";     // MySQL password
$database = "newsportal";     // MySQL database name

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else{
//     echo "sucess";
// }

?>