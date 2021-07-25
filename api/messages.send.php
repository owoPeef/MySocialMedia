<?php
session_start();
include('../db/connection.php');
if (isset($_GET['k']) || isset($_GET['key']))
{
    if (isset($_GET['k']))
    {
        $key = $_GET['k'];
    }
    if (isset($_GET['key']))
    {
        $key = $_GET['key'];
    }
    mysqli_query($db, "SELECT * FROM `tokens` WHERE `token`='{$key}'");
}
else
{
    header('Location: /api/');
}