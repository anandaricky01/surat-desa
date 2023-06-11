<?php
session_start();
include('../koneksi/koneksi.php');
$username = $_SESSION['usename'];
if (!isset($username)) {
    header("Location:index.php");
}
?>