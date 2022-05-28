<?php 

require '../functions/functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM seiyuu 
            WHERE
            name LIKE '%$keyword%'
        ";

$seiyuu = query($query);

?>

<script src="../js/"></script>

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
                <td><img src="../img/<?= $va["picture"]; ?>" width="85px"></td>
                <td><?= $va["name"]; ?></td>
                <td><?= $va["date"]; ?></td>
                <td><?= $va["prefecture"]; ?></td>
                <td>
                    <a href="../features/update.php?id=<?= $va["id"] ?>">Update</a> |
                    <a href="../features/delete.php?id=<?= $va["id"]; ?>" onclick="return confirm('Are You Sure?'); ">Delete</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
