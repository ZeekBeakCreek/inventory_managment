<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>PHP Inventory Manegment</title>
</head>

<body>
    <?php
    $msg = 'wrong password or username please try again';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // create login page 
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == 'admin' && $password == 'admin') {
            // create a session
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: add_product.php");
        } else {
            echo $msg;
        }
    }
    ?>

    <!-- create a login page -->
    <div class="container">
        <h1>Login</h1>

        <form id="login-form" action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>