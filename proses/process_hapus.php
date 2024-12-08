<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM user WHERE id='$id'";
    if (mysqli_query($config, $query)) {
        header("Location: ../atmin/index.php");
    } else {
        echo "Error: " . mysqli_error($config);
    }
}
?>