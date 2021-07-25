<?php
session_start();
include('db/connection.php');
$query = mysqli_query($db, "SELECT * FROM `users`");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <?php
    if (isset($_SESSION['user']))
    {
        echo "You " . $_SESSION['user']['user_id'] . "<br>";
    }
    while ($row = mysqli_fetch_array($query))
    {
        echo "<a href='session.php?first_name=" . $row[1] . "'>" . $row[1] . "</a><br>";
    }
    ?>
</body>
</html>