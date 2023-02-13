<?php


$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "main";

//create connection 
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// create database
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully with the name newDB";
} else {
  echo "Error creating database: " . $conn->error;
}

// Create connection if database is created successfully

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE inventoryDB (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product VARCHAR(30) NOT NULL,
label VARCHAR(30) NOT NULL,
descr VARCHAR(50), 
inventory INT(6),
unit_price FLOAT(6,2) NOT NULL, 
restock_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo " & Table inventoryDB created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
