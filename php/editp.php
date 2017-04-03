<?php
session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
    header("Location: index.php");
    exit();
} else {
}

require("connect.php");

$username = $_SESSION['username'];
$query = "SELECT `prev_lvl` FROM `user` WHERE `username` ='$username'";
$prev = $connection->query($query);
$prev = $prev->fetch_assoc();

$id = $_POST['id'];
$username = $_POST['nazwa'];
$email = $_POST['email'];

$query = "SELECT `username` FROM `user` WHERE `username` ='$username'";
$username = $connection->query($query);
$username = $username->fetch_assoc();

$_SESSION['username'] = $username;

if (empty($_POST['passwd'])) {
    if ($prev['prev_lvl'] == 3) {
        $poz = $_POST['poz'];
        if ($poz > 2)
            $poz = 1;
        $qr = "UPDATE `user` SET `username`='$username', `email`='$email', `prev_lvl`='$poz' WHERE `id` = '$id'";
    } else {
        $qr = "UPDATE `user` SET `username`='$username', `email`='$email' WHERE `id` = '$id'";
    }
} else {
    $password = $_POST['passwd'];
    if ($prev['prev_lvl'] == 3) {
        $poz = $_POST['poz'];
        if ($poz > 2)
            $poz = 1;
        $qr = "UPDATE `user` SET `username`='$username', `email`='$email', `password`='$password', `prev_lvl`='$poz' WHERE `id` = '$id'";
    } else {
        $qr = "UPDATE `user` SET `username`='$username', `email`='$email', `password`='$password', WHERE `id` = '$id'";
    }
}
$connection->query($qr);
header('Location: ../users.php');