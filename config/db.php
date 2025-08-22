<?php

$host = "localhost";
$username = "your_username";
$password = "your_password";
$db = "your_database";

$conn = new mysqli($host, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->$connect_error);
}
