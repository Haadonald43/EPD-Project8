<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project7";

// Create connection
$connectie = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connectie->connect_error) {
    die("Connection failed: " . $connectie->connect_error);
} 
?>
