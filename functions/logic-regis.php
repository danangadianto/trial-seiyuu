<?php 

if( isset($_POST["register"]) ) {

    if( registration($_POST) > 0 ) {
        echo "<script>
                alert('New user has been added!')
              </script>";
    } else {
        echo mysqli_error($conn);
    }

    header("Location: ../regis-login/login.php");
    exit;
}

?>