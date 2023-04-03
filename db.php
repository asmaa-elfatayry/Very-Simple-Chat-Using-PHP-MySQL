<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

function formatData($data){
    return date('g:i a',strtotime($data));
}

?>