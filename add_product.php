 <?php
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $product = $_POST['product'];
        $label = $_POST['label'];
        $descr = $_POST['descr'];
        $inventory = $_POST['inventory'];
        $unit_price = $_POST['unit_price'];

        $sql = "INSERT INTO inventoryDB (product , label , descr , inventory , unit_price) VALUES ('$product', '$label','$descr','$inventory','$unit_price')";

        if ($conn->query($sql) === TRUE) {
            header("Refresh:0");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>

 <style>
     <?php include 'css/styles.css'; ?>
 </style>

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/29031cc2a5.js" crossorigin="anonymous"></script>
     <title>Add Product</title>
 </head>

 <!-- create a add product page -->
 <div class="main-container">
     <h1>Add Product</h1>
     <form id="add_product" action="add_product.php" method="post">
         <label for="product">Product</label>
         <input type="text" name="product">
         <label for="label">Label</label>
         <input type="text" name="label">
         <label for="descr">Description</label>
         <input type="text" name="descr">
         <label for="inventory">Inventory</label>
         <input type="text" name="inventory">
         <label for="unit_price">Unit Price</label>
         <input type="text" name="unit_price">
         <div class="button-grouper">
             <input class="add-product-btn" type="submit" value="Add Product">
             <a href="./view_product.php" class="view-btn">
                 <i class="fa-solid fa-eye"></i>
             </a>
         </div>
     </form>
 </div>