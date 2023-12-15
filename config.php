<?php

$db = mysqli_connect('localhost','root','','Zospital_Istanbul');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

?>
