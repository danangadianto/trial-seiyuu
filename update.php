<?php 
require 'functions.php';

// take data from url
$id = $_GET["id"];

// query data based on id
$va = query("SELECT * FROM seiyuu WHERE id=$id")[0];

// check if button is clicked
if( isset($_POST["submit"]) ) {

    // check if data has been updated successfully or not
    if( update($_POST) > 0 ) {
        echo "
            <script>
                alert('Data has been updated succsessfully!');
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
        <input type="hidden" name="id" value="<?= $va["id"]; ?>">
        <ul>
            <li><input type="text" name="name" id="name" placeholder="Name" value="<?= $va["name"]; ?>" required></li>
        </ul>
        <ul>
            <li><input type="date" name="date" id="date" placeholder="Birthday" <?= $va["date"]; ?>></li>
        </ul>
        <ul>
            <li><input type="text" name="prefecture" id="prefecture" placeholder="Prefecture" <?= $va["prefecture"]; ?>></li>
        </ul>
        <ul>
            <li><input type="file" name="picture" id="picture" placeholder="Photo" <?= $va["picture"]; ?>></li>
        </ul>
        <ul>
            <button name="submit">Update</button>
        </ul>
    </form>
    
</body>
</html>