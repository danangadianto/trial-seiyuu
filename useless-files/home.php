<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1> Selamat Datang <?php if( isset($_POST["username"])) : ?>
        <?= $_POST["username"] ?> 
    <?php else : ?>
        <?= "" ?>
    <?php endif; ?>
    </h1>
</body>
</html>