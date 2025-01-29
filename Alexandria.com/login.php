<?php
    include "service/database.php";
    session_start();

    $login_massage = '';

    if (isset($_SESSION['Is_login'])) {
        header('location: dashboard.php');
    }
    

    if (isset($_POST['Login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION['Is_login'] = true;

        header("location: dashboard.php");

    }else {
        $login_massage = 'Account Not Found';
    }
    }



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php include "layout/header.html" ?>

    <h3>Account Login</h3>

    <i><?= $login_massage ?></i>

    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username" />
        <input type="password" placeholder="password" name="password" />
        <button type="submit" name="Login">Login</button>
    </form>

    <?php include "layout/footer.html" ?>

</body>

</html>