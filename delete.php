<?php
session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
    header("Location: index.php");
    exit();
}

require("connect.php");

$id = $_GET['id'];

$sql = "DELETE FROM `user` WHERE id =`$id`";
$connection->query($sql);

header("Location; users.php");

?>