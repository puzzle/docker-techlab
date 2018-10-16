<?php
$servername = "mariadb-container-with-existing-external-volume";
$username = "peter";
$password = "venkman";

// Create connection
$conn = new \mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
