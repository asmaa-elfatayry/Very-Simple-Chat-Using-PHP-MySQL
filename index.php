<?php
include './db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.min.css" rel="stylesheet" media="all">
    <title>Chat_Room</title>


    <script>
    function ajax() {
        let req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('chat').innerHTML = req.responseText;

            }
        }
        req.open("GET", 'chat.php', true);

        req.send();
    }
    setInterval(function() {
        ajax()
    }, 1000);
    </script>


</head>

<body onload="ajax()">
    <div id="container">
        <h1>Get Your Message Easily</h1>
        <div id="chat-box">
            <div id="chat"></div>
        </div>

        <form method="post" action="index.php">
            <?php

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $msg=$_POST['msg'];
    if(!empty($name) && !empty($msg)){
    $query="INSERT INTO chatroom (name,msg) VALUES ('$name','$msg')";
    // $insert = mysqli_query($con, $query);
    $run=$con->query($query);
    
    if ($run) {
        header("Location: index.php");
        exit();
    } 
}
}
?>
            <input type="text" name="name" placeholder="insert your name" />
            <input type="text" name="msg" placeholder="insert your message" />
            <input type="submit" name="submit" value="Send" />

        </form>
    </div>

</body>

</html>