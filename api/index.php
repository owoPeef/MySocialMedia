<?php
session_start();
include('../db/connection.php');
$sessionId = $_SESSION['user']['user_id'];
$query = mysqli_query($db, "SELECT * FROM `tokens` WHERE `user_id`='{$sessionId}'");
$tokenAvailable = mysqli_fetch_array($query);
if (mysqli_num_rows($query) == 0)
{
    echo "<form method='post' action='key_get.php'><input type='submit' value='Get API Key'></form>";
}
else
{
    echo "Your API-key: " . $tokenAvailable[2];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>API</title>
</head>
<body>

</body>
</html>
