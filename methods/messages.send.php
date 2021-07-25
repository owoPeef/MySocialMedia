<?php
session_start();
include('../db/connection.php');
$sel = $_GET['sel'];
$user_id = $_SESSION['user']['user_id'];
$message = $_GET['message'];
if (strlen($message) != 0)
{
    $now = date('Y-m-d H:i:s');
    if (isset($_GET['method']))
    {
        $method = $_GET['method'];
        if ($method == "api")
        {
            mysqli_query($db, "INSERT INTO `messages` (`from_user`, `to_user`, `message`, `send_date`) VALUES ('{$user_id}', '{$sel}', '{$message}', '{$now}')");
            $_SESSION['method_message'] = [
                'message' => '{
                    "response": 0
                }'
            ];
            header('Location: /api/messages.send.php');
        }
    }
    else
    {
        mysqli_query($db, "INSERT INTO `messages` (`from_user`, `to_user`, `message`, `send_date`) VALUES ('{$user_id}', '{$sel}', '{$message}', '{$now}')");
        echo "SUCCESS";
    }
}