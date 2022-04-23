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
    // Upload image
    $picture = upload();

    if( !$picture ) {
        return false;
    }

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

    $oldPicture = $data["oldPicture"];

    // check if users change picture or not
    if( $_FILES['picture']['error'] === 4 ) {
        $picture = $oldPicture;
    } else {
        $picture = upload();
    }



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

// Function to upload
function upload() {
    $fileName = $_FILES['picture']['name'];
    $fileSize = $_FILES['picture']['size'];
    $fileError = $_FILES['picture']['error'];
    $tmpName = $_FILES['picture']['tmp_name'];

    // check if there is uploaded img
    if( $fileError === 4 ) {
        echo "<script>
                alert('Please pick an image first!')
              </script>";
        return false;
    }

    // check if the uploaded file is image or not
    $extensionValidImg = ['jpg', 'jpeg', 'png'];
    $extensionImg = explode('.', $fileName);
    $extensionImg = strtolower(end($extensionImg));

    if( !in_array($extensionImg, $extensionValidImg) ) {
        echo "<script>
                alert('The file is not image!')
              </script>";
        return false;
    }

    // check if the size is too large
    if( $fileSize > 1000000 ) {
        echo "<script>
                alert('Your file size is too large!')
              </script>";
        return false;
    }

    // if passed, ready to upload
    // generate new img name
    $nameNewFile = uniqid();
    $nameNewFile .= '.';
    $nameNewFile .= $extensionImg;

    move_uploaded_file($tmpName, 'img/' . $nameNewFile);

    return $nameNewFile;
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