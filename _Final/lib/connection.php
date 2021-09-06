<?php
include('../config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$GLOBALS['conn'] = $conn;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>