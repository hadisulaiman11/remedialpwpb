<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "UPDATE user SET name='$name', gmail='$gmail', password='$password', role='$role' WHERE id='$id'";
    if (mysqli_query($config, $query)) {
        header("Location: ../atmin/index.php");
    } else {
        echo "Error: " . mysqli_error($config);
    }
}
?>