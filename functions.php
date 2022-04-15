<?php 

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
        return $rows;
}

// PHP Pagination

$totalDataPerPage = 5;
$totalData = count(query("SELECT * FROM seiyuu"));
$totalPage = ceil($totalData / $totalDataPerPage);
$activePage = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
$firstData = ( $totalDataPerPage * $activePage ) - $totalDataPerPage;

// navigation

// Function to add new data
function add($data) {
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $date = $data["date"];
    $prefecture = htmlspecialchars($data["prefecture"]);
    $picture = $data["picture"];

    $query = "INSERT INTO seiyuu
                VALUES
            ('', '$name', '$date', '$prefecture', '$picture')
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}

// Function to delete
function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM seiyuu WHERE id=$id");

    return mysqli_affected_rows($conn);
}


// Function to update
function update($data) {
    global $conn;

    $id = intval($data["id"]);
    $name = htmlspecialchars($data["name"]);
    $date = $data["date"];
    $prefecture = htmlspecialchars($data["prefecture"]);
    $picture = $data["picture"];

    $query = "UPDATE seiyuu SET
                name = '$name',
                date = '$date',
                prefecture = '$prefecture',
                picture = '$picture'
            WHERE id = '$id'
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Function to search
function search($keyword){
    $query = "SELECT * FROM seiyuu
                WHERE
            name LIKE '%$keyword%'
            ";
    
    return query($query);
}

?>