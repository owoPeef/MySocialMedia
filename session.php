<?php
session_start();
include('db/connection.php');
$name = $_GET['first_name'];
$query = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `users` WHERE `first_name`='{$name}'"));
unset($_SESSION['user']['user_id']);
$_SESSION['user'] = [
    'user_id' => $query[0]
];
header('Location: /');