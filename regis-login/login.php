<?php 
session_start();

require '../functions/functions.php';

// check cookie
if( isset($_COOKIE["id"]) && isset($_COOKIE["key"]) ) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // take username based on id
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // check cookie and username
    if( $key === hash('sha256', $row["username"]) ) {
        $_SESSION["login"] = true;
    }
}

if( isset($_SESSION["login"]) ) {
    header("Location: ../content/index.php");
    exit;
}



if( isset($_POST["submit"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $result = mysqli_num_rows($query);

    // check username
    if( $result === 1 ) {

        // check password
        $row = mysqli_fetch_assoc($query);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // check remember me
            if( isset($_POST['remember']) ) {
                // create cookie
                setcookie('id', $row['id'], time()+60*60*24*14); 
                setcookie('key', hash('sha256', $row['username']), time()+60*60*24*14);
            }

            header("Location: ../content/index.php");
            exit;
        }

    }

    $hasNoResult = true;
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="logo.png" alt="" width="190">
        </div>
        <div class="input-box">
            <p>Log in to Seiyuu Paradise</p>
            <?php if( isset($hasNoResult) ) : ?>
                <p style="color: red; font-style:italic;">Username/password wrong!</p>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="text" placeholder="Email address or phone number"  name="username" class="input" required>
                <input type="password" placeholder="Password" name="password" class="input" required>
                <input type="checkbox" name="remember" id="remember"><label for="remember">Remember me</label>
                <button type="submit" name="submit" value="Log in">Log in</buttonS>
            </form>
            <div class="links">
                <a href="">Forgot password</a>
                <a href="../regis-login/regis.php">Sign up</a>
            </div>
        </div>
    </div>
</body>
</html>