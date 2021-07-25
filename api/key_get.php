<?php
session_start();
include('../db/connection.php');
$sessionId = $_SESSION['user']['user_id'];
while (true)
{
    $random = md5(rand(1, 999999999999999999));
    $checkApi = mysqli_query($db, "SELECT * FROM `tokens` WHERE `token`='{$random}'");
    if (mysqli_num_rows($checkApi) == 0)
    {
        mysqli_query($db, "INSERT INTO `tokens` (`user_id`, `token`) VALUES ('{$sessionId}', '{$random}')");
        header('Location: /api/');
        break;
    }
}