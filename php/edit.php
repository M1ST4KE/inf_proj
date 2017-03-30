<?php
session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
    header("Location: ../index.php");
    exit();
}

require("connect.php");

$username = $_SESSION['username'];
$query = "SELECT id, prev_lvl FROM `user` WHERE username ='$username'";
$prev = $connection->query($query);
$prev = $prev->fetch_assoc();

$id = $_GET['id'];

$query = "SELECT prev_lvl FROM `users` WHERE id ='$id'";
$pr = $connection->query($query);
$pr = $pr->fetch_assoc();

if ($prev['prev_lvl'] - $pr['prev_lvl'] > 0 || $id != $prev['id']) {
    var_dump($pr);
}
?>