<?php
$servername="localhost:3307";
$dbUsername="root";
$dbPassword="";
$dbName="vets";

$conn =  mysqli_connect($servername, $dbUsername,$dbPassword, $dbName);
$con = new mysqli($servername, $dbUsername,$dbPassword, $dbName);
if (!$conn){
    die("Connection failed: " .mysqli_connect_error());
}
if ($con -> connect_error){
    die("failed to connect".$con->connect_error);
}