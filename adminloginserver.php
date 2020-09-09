<?php

$servername="localhost:3307";
$dbUsername="root";
$dbPassword="";
$dbName="vets";
$val="";
$conn =  mysqli_connect($servername, $dbUsername,$dbPassword, $dbName);

if (!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $select= "
    select * from admin 
    where username = '".$_POST['username']."' and 
    password =       '".$_POST['password']."'
    ";
    $result=mysqli_query($conn, $select);
    if (mysqli_num_rows($result)==0){
        $val = "Username or password is incorrect!";
    }
    else{
        header('Location:doctors.php');
    }

}