<?php
    include "service/database.php";
    session_start();

    $register_massage = "";

    if (isset($_SESSION['Is_login'])) {
        header('location: dashboard.php');
    }

    if(isset($_POST ['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
    try {
        $sql = "INSERT INTO users (username, password) VALUES ('$username' , '$password')";

        if($db->query($sql)) {
            $register_massage = "registration success";
        }else {
            $register_massage = "Register Failed, Try again";
        }
    } catch (mysqli_sql_exception) {
        $register_massage = 'Username already exists';
    }

        
    }

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <?php include "layout/header.html" ?>

    <h3>Signup</h3>

    <i><?= $register_massage ?></i>

    <form action="register.php" method="POST">
        
        <input type="text" placeholder="username" name="username" />
        <input type="password" placeholder="password" name="password" />
        <button type="submit" name="register">Signup</button>
    </form>

    <?php include "layout/footer.html" ?>

</body>

</html>