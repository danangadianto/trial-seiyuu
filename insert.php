<?php 
require 'functions.php';

// check if button is clicked
if( isset($_POST["submit"]) ) {

    // check if data has been added successfully or not
    if( add($_POST) > 0 ) {
        echo "
            <script>
                alert('Data has been added succsessfully!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST">
        <ul>
            <li><input type="text" name="name" id="name" placeholder="Name" required></li>
        </ul>
        <ul>
            <li><input type="date" name="date" id="date" placeholder="Birthday"></li>
        </ul>
        <ul>
            <li><input type="text" name="prefecture" id="prefecture" placeholder="Prefecture"></li>
        </ul>
        <ul>
            <li><input type="file" name="picture" id="picture" placeholder="Photo"></li>
        </ul>
        <ul>
            <button name="submit">Add</button>
        </ul>
    </form>
    
</body>
</html>