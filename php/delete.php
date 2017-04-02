<?php
session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
    header("Location: ../index.php");
    exit();
} else

    require("connect.php"); //zwraca zmienną $connection

$username = $_SESSION['username'];
$query = "SELECT `id`, `prev_lvl` FROM `user` WHERE `username` ='$username'";
$prev = $connection->query($query);
$prev = $prev->fetch_assoc();

$id = $_GET['id'];

$query = "SELECT `prev_lvl` FROM `user` WHERE `id` ='$id'";
$pr = $connection->query($query);
$pr = $pr->fetch_assoc();

if ($prev['prev_lvl'] - $pr['prev_lvl'] > 0 && $id != $prev['id']) {
    var_dump($id);
    $sql = "DELETE FROM `user` WHERE `id` ='$id'";
    $connection->query($sql);
    header("Location: ../users.php");
} else {
    header("Location: ../users.php?err=1");
}
?>


