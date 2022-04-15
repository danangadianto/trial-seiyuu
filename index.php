<?php
require 'functions.php';

$seiyuu = query("SELECT * FROM seiyuu LIMIT $firstData, $totalDataPerPage");

// searchbar
if( isset($_POST["search"]) ) {
    $seiyuu = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        ul li {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <h1>Japanese Seiyuu</h1>
        <!-- insert -->
        <a href="insert.php">Add New Seiyuu</a>

        <!-- searchbar -->
        <form action="" method="POST">
            <input type="text" placeholder="Search seiyuu name..." autocomplete="off" autofocus name="keyword" size="30">
            <button type="submit" name="search">Search</button>
        </form>

        <table border="1" cellpadding="5" cellspacing:"0" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Birth Date</th>
                    <th>Prefecture</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php $num = 1 ?>
            <?php foreach ($seiyuu as $va) : ?>
                <tbody>
                    <tr>
                        <td><?= $num++ ?></td>
                        <td><img src="img/<?= $va["picture"]; ?>" width="85px"></td>
                        <td><?= $va["name"]; ?></td>
                        <td><?= $va["date"]; ?></td>
                        <td><?= $va["prefecture"]; ?></td>
                        <td>
                            <a href="update.php?id=<?= $va["id"] ?>">Update</a> |
                            <a href="delete.php?id=<?= $va["id"]; ?>" onclick="return confirm('Are You Sure?'); ">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>

    <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <?php if ($activePage > 1) : ?>
                    <a href="?page=<?= $activePage - 1; ?>" class="page-link">Prev</a>
                <?php endif; ?>
            </li>
            <li class="page-item">
                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                    <?php if ($i == $activePage) : ?>
                        <a href="?page= <?= $i; ?> " style="font-weight: bold; color: red; text-decoration: none;" class="page-link"><?= $i; ?></a>
                    <?php else : ?>
                        <a href="?page= <?= $i; ?> " class="page-link"><?= $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
            </li>
            <li class="page-item">
                <?php if ($activePage < $totalPage) : ?>
                    <a href="?page=<?= $activePage + 1; ?>" class="page-link">Next</a>
                <?php endif; ?>
            </li>
        </ul>

    </div>
</body>

</html>