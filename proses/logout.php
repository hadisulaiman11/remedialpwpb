<?php
session_start();
session_destroy();
setcookie("id", "", time() - 3600, "/"); // Hapus cookie
header("Location: ../index.php"); // Redirect ke halaman utama
?>