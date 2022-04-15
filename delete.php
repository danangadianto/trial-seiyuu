<?php 
require 'functions.php';

$id = $_GET["id"];

if( delete($id) > 0 ) {
    echo "
        <script>
            alert('Data has been deleted succsessfully!');
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

?>