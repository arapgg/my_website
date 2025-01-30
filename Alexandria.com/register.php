<?php
include "service/database.php";
session_start();

$register_message = "";

if (isset($_SESSION['Is_login'])) {
    header('location: dashboard.php');
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $sql = "INSERT INTO userss (username, password) VALUES ('$username', '$password')";

        if ($db->query($sql)) {
            $register_message = "Registration success";
        } else {
            $register_message = "Register Failed, Try again";
        }
    } catch (mysqli_sql_exception) {
        $register_message = 'Username already exists';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Get started today</h1>
            <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                Please sign up for your account to continue using our services,Thankyou.
            </p>
            <form action="register.php" method="POST" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                <p class="text-center text-lg font-medium">Sign up for your account</p>
                <div>
                    <label for="username" class="sr-only">Username</label>
                    <div class="relative">
                        <input
                            type="text"
                            name="username"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Enter username"
                            required
                        />
                    </div>
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Enter password"
                            required
                        />
                    </div>
                </div>
                <button
                    type="submit"
                    name="register"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white"
                >
                    Sign up
                </button>
                <p class="text-center text-sm text-gray-500">
                    Already have an account?
                    <a class="underline" href="login.php">Sign in</a>
                </p>
            </form>
            <?php if ($register_message): ?>
                <p class="text-center text-red-500 mt-4"><?= $register_message ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>