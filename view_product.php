<style>
    <?php include 'css/styles.css'; ?>
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/29031cc2a5.js" crossorigin="anonymous"></script>
    <title>View Products</title>
</head>

<?php

// connect to database
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

// sql to read
$sql = "SELECT id , product , label , descr , inventory , unit_price FROM inventoryDB";

// display all products
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<div class='main-container'>";
    echo "<a style='text-decoration:none;color:black;' href='./add_product.php'><h1>Products +</h1></a>";
    echo "<div class='product-container'>";
    // echo "<h2>Product | Label | Description | Inventory | Unit Price</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='section-container'>";
        echo "<div class='section'>id: " . $row["id"] . "</div><div class='section'>product: " . $row["product"] . "</div><div class='section'>label: " . $row["label"] . "</div><div class='section'>descr: " . $row["descr"] . "</div><div class='section'>inventory: " . $row["inventory"] . "</div><div class='section'>unit_price: " . $row["unit_price"] . "</div><a href='edit_product.php?id=" . $row["id"] . "' class='edit-btn'><i class='fa-solid fa-edit'></i></a><a href='delete_product.php?id=" . $row["id"] . "' class='delete-btn'><i class='fa-solid fa-trash'></i></a>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
} else {
    echo "<div class='main-container'>";
    echo "<h1>0 Results</h1>";
    echo "<h2>Go Add Some Product</h2>";
    echo "<form id='add_product' action='add_product.php' method='post'>
    <label for='product'>Product</label>
    <input type='text' name='product'>
    <label for='label'>Label</label>
    <input type='text' name='label'>
    <label for='descr'>Description</label>
    <input type='text' name='descr'>
    <label for='inventory'>Inventory</label>
    <input type='text' name='inventory'>
    <label for='unit_price'>Unit Price</label>
    <input type='text' name='unit_price'>
    <div class='button-grouper'>
        <input class='add-product-btn' type='submit' value='Add Product'>
        <a href='./view_product.php' class='view-btn'>
            <i class='fa-solid fa-eye'></i>
        </a>
    </div>
</form>";
    echo "</div>";
}

$conn->close();
?>