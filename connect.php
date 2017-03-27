<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 */

$connection = mysqli_connect('localhost', 'owczarzk', 'hXZs27Q8VpRaDS8Y', 'owczarzk');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'test');
if (!$select_db) {
    die("Database Selection Failed" . mysqli_error($connection));
}
?>
