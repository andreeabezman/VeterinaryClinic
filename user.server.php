<?php
session_start();
require 'includes/dbh.inc.php';

$username = "";
$password = "";
$ownerid = 0;
$mail = "";
$edit_state = false;


if (isset($_POST['save'])){
    $username= $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];
    $ownerid = $_POST['ownerid'];

    $query = "INSERT INTO owner (username, password, mail) 
        VALUES('$username', '$password', '$mail')";
    mysqli_query($conn, $query);
    $_SESSION['msg'] = "Owner Saved";
    header('location:user.php'); //redirect catre pag dupa insert
}

if (isset($_POST['update'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $ownerid = mysqli_real_escape_string($conn, $_POST['ownerid']);


    mysqli_query($conn, "UPDATE owner set username = '$username', password='$password',
        mail = '$mail'
        WHERE ownerid = $ownerid");
    $_SESSION['msg'] = "Owner updated";
    header('location: user.php');
}

if (isset($_GET['del'])){
    $ownerid = $_GET['del'];
    mysqli_query($conn, "DELETE FROM owner WHERE ownerid=$ownerid");
    $_SESSION['msg'] = "Owner deleted";
    header('location:user.php');
}

$results = mysqli_query($conn, "SELECT * FROM owner");

?>