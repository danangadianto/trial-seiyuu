<?php 
require 'functions.php';

if( isset($_POST["submit"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // check username
    if( mysqli_num_rows($result) === 1 ) {

        // check password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            header("Location: index.php");
            exit;
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="logo.png" alt="" width="190">
        </div>
        <div class="input-box">
            <p>Log in to Seiyuu Paradise</p>
            <form action="" method="POST">
                <input type="text" placeholder="Email address or phone number"  name="username" class="input" required>
                <input type="password" placeholder="Password" name="password" class="input" required>
                <button type="submit" name="submit" value="Log in">Log in</buttonS>
            </form>
            <div class="links">
                <a href="">Forgot password</a>
                <a href="regis.php">Sign up</a>
            </div>
        </div>
    </div>
</body>
</html>