<?php 

// // Database connection parameters
//     $servername = "sql305.infinityfree.com"; // Change this to your MySQL server hostname
//     $username = "if0_36483111"; // Change this to your MySQL username
//     $password = "LNgUzSm4mze"; // Change this to your MySQL password
// $dbname = "if0_36483111_chatbox"; // Change this to your MySQL database name
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "chat"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>