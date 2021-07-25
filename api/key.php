<?php
session_start();
include('../db/connection.php');
$sessionId = $_SESSION['user']['user_id'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="../jquery.js"></script>
    <title>Key Get</title>
</head>
<body>
    <form method="post" action="key_get.php">
        <input type="text" placeholder="API Title" id="apiTitle" name="apiTitle">
        <input type="submit" class="button" value="Create API-key" id="submitBttn" name="submitBttn">
    </form>
</body>
</html>