<?php
session_start();
include('db/connection.php');
if (isset($_SESSION['user']['user_id']))
{
    if (isset($_GET['sel']))
    {
        $sel = $_GET['sel'];
        $user_id = $_SESSION['user']['user_id'];
        if ($sel == $user_id)
        {
            $data = mysqli_query($db, "SELECT * FROM `messages` WHERE `from_user`='{$user_id}' AND `to_user`='{$user_id}' ORDER BY `send_date` ASC LIMIT 10");
        }
        if ($sel != $user_id)
        {
            $data = mysqli_query($db, "SELECT * FROM `messages` WHERE (`from_user`='{$user_id}' OR `to_user`='{$user_id}') AND (`from_user`='{$sel}' OR `to_user`='{$sel}') ORDER BY `send_date` ASC LIMIT 10");
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
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/messenger.css">
    <title>Диалоги</title>
</head>
<body>
    <div class="sendMsgBox">
        <input type="text" id="messageInput" name="messageInput">
        <input type="button" id="send_message" name="sendMessage" value=">">
        <script>
            var send_message = document.getElementById("send_message");
            function sendMsg() {
                let selected_user = <?php echo $sel ?>;
                let current_user = <?php echo $user_id ?>;
                let message = document.getElementById('messageInput').value;
                const request = new XMLHttpRequest();
                const url = "im_SendMsg.php?sel=" + selected_user + "&user_id=" + current_user + "&message=" + message;
                request.open('GET', url);
                request.setRequestHeader('Content-Type', 'application/x-www-form-url');
                request.addEventListener("readystatechange", () => {
                    if (request.readyState === 4 && request.status === 200) {

                        // выводим в консоль то что ответил сервер
                        console.log( request.responseText );
                    }
                });
                request.send();
            }
            send_message.onclick = sendMsg;
        </script>
    </div>
</body>
</html>