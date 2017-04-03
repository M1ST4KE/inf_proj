<?php
session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
    header("Location: index.php");
    exit();
} else {
}

require("connect.php");

$username = $_POST['nazwa'];
$email = $_POST['email'];
$_SESSION['username'] = $username;

$qr = "UPDATE `user` SET `username`='$username', `email`='$email' WHERE `id` = '$id'";
$connection->query($qr);
header('Location: ../users.php');