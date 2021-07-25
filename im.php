<?php
session_start();
include('db/connection.php');
if (isset($_SESSION['user']['user_id']))
{
    if (isset($_GET['sel']))
    {
        $sel = $_GET['sel'];
        $user_id = $_SESSION['user']['user_id'];
        $session = $_SESSION['dialogue'] = ['selected_user' => $sel];
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/messenger.css">
    <script type="text/javascript" src="jquery.js"></script>
    <title>Диалоги</title>
</head>
<body>
    <div id="messages_list" class="messages_list"></div>
    <script>
        $(document).ready(function(){
            show();
            setInterval(show, 1000);
        });
        function show() {
            $.ajax({
                url: "methods/messages.get.php",
                cache: false,
                success: function(html){
                    $("#messages_list").html(html);
                }
            });
        }
    </script>
    <div class="sendMsgBox">
        <input type="text" id="input-id" placeholder="Напишите сообщение...">
        <input type="button" id="send_message" value=">">
    </div>
    <script>
        let send_message = document.getElementById("send_message");
        document.addEventListener('keyup', event => {
            if (event.code === 'Enter')
            {
                console.log("Enter pressed");
                sendMsg();
            }
        })
        function sendMsg() {
            let message = $('#input-id').val();
            let selected_user = <?php echo $sel ?>;
            const request = new XMLHttpRequest();
            const url = "/methods/messages.send.php?sel=" + selected_user + "&message=" + message;
            request.open('GET', url);
            request.setRequestHeader('Content-Type', 'application/x-www-form-url');
            request.addEventListener("readystatechange", () => {
                if (request.readyState === 4 && request.status === 200) {

                    if (request.responseText === "SUCCESS")
                    {
                        $('#input-id').val('');
                    }
                }
            });
            request.send();
        }
        send_message.onclick = sendMsg;
    </script>
</body>
</html>