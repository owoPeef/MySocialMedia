<?php
session_start();
include('db/connection.php');
if (isset($_SESSION['dialogue']['selected_user']))
{
    $sel = $_SESSION['dialogue']['selected_user'];
}
if (isset($_SESSION['user']['user_id']))
{
    $user_id = $_SESSION['user']['user_id'];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <?php
    if (isset($_SESSION['user']['user_id']) && isset($_SESSION['dialogue']['selected_user']))
    {
        if ($sel == $user_id)
        {
            $data = mysqli_query($db, "SELECT * FROM `messages` WHERE `from_user`='{$user_id}' AND `to_user`='{$user_id}' ORDER BY `send_date` ASC LIMIT 5");
        }
        if ($sel != $user_id)
        {
            $data = mysqli_query($db, "SELECT * FROM `messages` WHERE (`from_user`='{$user_id}' OR `to_user`='{$user_id}') AND (`from_user`='{$sel}' OR `to_user`='{$sel}') ORDER BY `send_date` ASC LIMIT 5");
        }
        while($row = mysqli_fetch_array($data))
        {
            $send_time = date('H:i:s', strtotime($row[4]));
            if ($row[1] == $user_id)
            {
                echo "<div class='left_message'><h2 class='left_offset'>$row[3]</h2><h5 class='left_date'>$send_time</h5></div>";
            }
            if ($row[2] == $user_id && $row[1] != $row[2])
            {
                echo "<div class='right_message'><h2 class='right_offset'>$row[3]</h2><h5 class='right_date'>$send_time</h5></div>";
            }
        }
    }
    ?>
</body>
</html>
