<?php
session_start();
include('../db/connection.php');
if (isset($_SESSION['method_message']))
{
    $msg = $_SESSION['method_message']['message'];
    echo $msg;
    unset($_SESSION['method_message']);
}
else
{
    if (isset($_GET['k']) || isset($_GET['key']))
    {
        $key = "";
        if (isset($_GET['k']))
        {
            $key = $_GET['k'];
        }
        if (isset($_GET['key']))
        {
            $key = $_GET['key'];
        }
        $query = mysqli_query($db, "SELECT * FROM `tokens` WHERE `token`='{$key}'");
        if (mysqli_num_rows($query) == 0)
        {
            header('Location: /api/');
        }
        else
        {
            if (isset($_GET['id']) && isset($_GET['message']))
            {
                header('Location: /methods/messages.send.php?sel=' . $_GET["id"] . '&message=' . $_GET["message"] . "&method=api");
            }
            if (!isset($_GET['id']))
            {
                echo "Enter 'id' key <br>";
            }
            if (!isset($_GET['message']))
            {
                echo "Enter 'message' key";
            }
        }
    }
    else
    {
        header('Location: /api/');
    }
}