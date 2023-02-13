<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/29031cc2a5.js" crossorigin="anonymous"></script>
    <title>Delete Product</title>
</head>

<?php
ob_start();
// add product to database

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
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // create delete button 
    $sql = "DELETE FROM inventoryDB WHERE id = " . $_POST['id'];

    if ($conn->query($sql) === TRUE) {
        header("Refresh:0");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if ($result->num_rows > 0) {
    // output data of each row
    echo "<div class='main-container'>";
    echo "<h1>Delete Products</h1>";
    echo "<div class='product-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<form action='delete_product.php' method='post' class='section-container'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<div class='section'>id: " . $row["id"] . "</div><div class='section'>product: " . $row["product"] . "</div><div class='section'>label: " . $row["label"] . "</div><div class='section'>descr: " . $row["descr"] . "</div><div class='section'>inventory: " . $row["inventory"] . "</div><div class='section'>unit_price: " . $row["unit_price"] . "</div><a href='edit_product.php?id=" . $row["id"] . "' class='edit-btn'><i class='fa-solid fa-edit'></i></a><input class='delete-btn' type='submit' value='Delete'>";
        echo "</form>";
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

<style>
    <?php include 'css/styles.css'; ?>
</style>

<!-- echo "<h1>Products</h1>";
    echo "<form action='delete_product.php' method='post>";
    echo "<div class='product-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='section-container'>";
        echo "<div class='section'>id: " . $row["id"] . "</div><div class='section'>product: " . $row["product"] . "</div><div class='section'>label: " . $row["label"] . "</div><div class='section'>descr: " . $row["descr"] . "</div><div class='section'>inventory: " . $row["inventory"] . "</div><div class='section'>unit_price: " . $row["unit_price"] . "</div><a href='edit_product.php?id=" . $row["id"] . "' class='edit-btn'><i class='fa-solid fa-edit'></i></a><input type='submit' value='DELETE'class='delete-btn'><a href='add_product.php?id=" . $row["id"] . "' class='add-btn'><i class='fa-solid fa-plus'></i></a>";
        echo "</div>";
    }
    echo "</div>";
    echo "</form>";
    echo "</div>"; -->