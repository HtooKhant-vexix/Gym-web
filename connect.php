<?php 
  // $conn = mysqli_connect('localhost', 'root', '', 'project2');

$servername = "localhost";
$username = "root";


// Create connection
$conn = new mysqli($servername, $username);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS latest_project";
if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating database: " . $conn->error;
}

$dbname = "latest_project";
$conn = new mysqli($servername, $username,'', $dbname);

$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
  
  if ($conn->query($sql) === TRUE) {
    echo "";
  } else {
    echo "Error creating table: " . $conn->error;
  }

//  $conn->close();
