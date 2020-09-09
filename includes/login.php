<?php
require 'dbh.inc.php';
session_start();

$sql = "SELECT * FROM admin where username = '".$_POST["username"].
"' and password = '".$_POST["password"]."' ";
$result = $conn->query($sql);
if ($result -> num_rows > 0){
    $_SESSION["user"]=$_POST["username"];
    echo "success";
}else{
    echo "fail";
}