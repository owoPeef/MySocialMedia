<?php
session_start();
include('db/connection.php');
if (isset($_POST['name']))
{
    if (count_chars($_POST['name']) != 0)
    {
        $name = $_POST['name'];
        $datetime_now = date("Y-m-d H:i:s");
        mysqli_query($db, "INSERT INTO `users` (`first_name`, `last_name`, `reg_date`, `last_activity`) VALUES ('{$name}', '{$name}', '{$datetime_now}', '{$datetime_now}')");
        $user_id = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `users` WHERE `first_name`='{$name}' AND `last_name`='{$name}'"));
        $_SESSION['user'] = ['user_id' => $user_id[0]];
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
</head>
<body>
    <form action="registration.php" method="post">
        <input type="text" name="name">
        <p><input type="submit" /></p>
    </form>
</body>
</html>
