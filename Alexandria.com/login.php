<?php
include "service/database.php";
session_start();

$login_message = "";

if (isset($_SESSION['Is_login'])) {
    header('location: dashboard.php');
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM userss WHERE username='$username' AND password='$password'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['Is_login'] = true;
        $_SESSION['username'] = $username;
        header('location: dashboard.php');
    } else {
        $login_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Welcome Back</h1>
            <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                Please login to your account to continue.
            </p>
            <form action="login.php" method="POST" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                <p class="text-center text-lg font-medium">Sign in to your account</p>
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
                    name="login"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white"
                >
                    Sign in
                </button>
                <p class="text-center text-sm text-gray-500">
                    No account?
                    <a class="underline" href="register.php">Sign up</a>
                </p>
            </form>
            <?php if ($login_message): ?>
                <p class="text-center text-red-500 mt-4"><?= $login_message ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>