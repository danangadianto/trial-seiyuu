<?php 

require 'functions.php';

if( isset($_POST["register"]) ) {

    if( registration($_POST) > 0 ) {
        echo "<script>
                alert('New user has been added!')
              </script>";
    } else {
        echo mysqli_error($conn);
    }

    header("Location: login.php");
    exit;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>

<h1>Sign up first</h1>

<form action="" method="POST">
    <ul>
        <li>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" id="password2">
        </li>
        <li>
            <button type="submit" name="register">Sign Up</button>
        </li>
    </ul>




</form>
    
</body>
</html>