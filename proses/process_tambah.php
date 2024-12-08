<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "INSERT INTO user (name, gmail, password, role) VALUES ('$name', '$gmail', '$password', '$role')";
    if (mysqli_query($config, $query)) {
        header("Location: ../atmin/index.php");
    } else {
        echo "Error: " . mysqli_error($config);
    }
}
?>