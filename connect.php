<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "main";

// Create connection
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
  echo "Table inventoryDB created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
