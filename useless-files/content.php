<?php 
require 'functions.php';

$seiyuu = query("SELECT * FROM seiyuu LIMIT $firstData, $totalDataPerPage");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seiyuu List</title>
    <link rel="stylesheet" href="content.css">
</head>
<body>
    
    <!-- navbar -->
    <header>
        <a href="home.php"><img src="img/Logo.png" alt=""></a>
        <input type="checkbox" class="btn">
        <div class="nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#news">News & Article</a></li>
                <li><a href="#event">Event</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </header>

    <!-- table of content -->
    <div class="container">
        <div class="wrapper">
            <h1 class="text">List of Japanese Voice Actrees</h1>
        </div>
        <div class="wrapper">
            <table border="1" cellpadding="5" cellspacing:"0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>Prefecture</th>
                    </tr>
                </thead>
                
                <?php $num = 1 ?>
                <?php foreach ($seiyuu as $va ) : ?>
                <tbody>
                    <tr>
                        <td><?= $num++ ?></td>
                        <td><img src="img/<?= $va["picture"];?>" width="85px"></td>
                        <td><?= $va["name"]; ?></td>
                        <td><?= $va["date"]; ?></td>
                        <td><?= $va["prefecture"]; ?></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

            <!-- Pagination -->
            <!-- Previous -->
            <?php if( $activePage > 1 ) : ?>
                <a href="?page=<?= $activePage - 1; ?>" style="text-decoration: none;">Prev</a>
            <?php endif; ?>

            <!-- Nomor -->
            <?php for( $i = 1; $i <= $totalPage; $i++ ) : ?>
                <?php if( $i == $activePage ) : ?>
                    <a href="?page= <?= $i; ?> " style="font-weight: bold; color: red; text-decoration: none;"><?= $i; ?></a>
                <?php else : ?>
                    <a href="?page= <?= $i; ?> " style="text-decoration: none;" ><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <!-- Next -->
            <?php if( $activePage < $totalPage ) : ?>
                <a href="?page=<?= $activePage + 1; ?>" style="text-decoration: none;">Next</a>
            <?php endif; ?>
        </div>
    </div>

    
    
</body>
</html>