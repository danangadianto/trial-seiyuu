<?php 

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