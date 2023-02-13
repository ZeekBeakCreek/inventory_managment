<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/29031cc2a5.js" crossorigin="anonymous"></script>
    <title>Edit Product</title>
</head>

<!-- create a edit product page -->

</div>

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
$sql = "SELECT id , product , label , descr , inventory , unit_price FROM inventoryDB WHERE id = " . $_GET['id'] . "";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE inventoryDB SET product='" . $_POST["product"] . "', label='" . $_POST["label"] . "', descr='" . $_POST["descr"] . "', inventory='" . $_POST["inventory"] . "', unit_price='" . $_POST["unit_price"] . "'";

    if ($conn->query($sql) === TRUE) {
        header("Refresh:0");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

while ($row = $result->fetch_assoc()) {
    echo "<div class='main-container'>
<h1>Edit Product</h1>
<form id='add_product' action='edit_product.php' method='post'>
    <label for=' product'>Product</label>
    <input type='text' name='product' value=" . $row["product"] . ">
    <label for='label'>Label</label>
    <input type='text' name='label' value=" . $row["label"] . ">
    <label for='descr'>Description</label>
    <input type='text' name='descr' value=" . $row["descr"] . ">
    <label for='inventory'>Inventory</label>
    <input type='text' name='inventory' value=" . $row["inventory"] . ">
    <label for='unit_price'>Unit Price</label>
    <input type='text' name='unit_price' value=" . $row["unit_price"] . ">
    <div class='button-grouper'>
        <input class='add-product-btn' type='submit' value='Edit Product'>
        <a href='./view_product.php' class='view-btn'>
            <i class='fa-solid fa-eye'></i>
        </a>
    </div>
</form>";
}

//   close connection
$conn->close();
?>

<style>
    <?php include 'css/styles.css'; ?>
</style>