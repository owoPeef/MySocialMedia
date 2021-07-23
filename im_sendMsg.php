<?php
include('db/connection.php');
$sel = $_GET['sel'];
$user_id = $_GET['user_id'];
$message = $_GET['message'];
if (strlen($message) != 0)
{
    $now = date('Y-m-d H:i:s');
    mysqli_query($db, "INSERT INTO `messages` (`from_user`, `to_user`, `message`, `send_date`) VALUES ('{$user_id}', '{$sel}', '{$message}', '{$now}')");
}