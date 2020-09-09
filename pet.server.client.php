<?php
session_start();
require 'includes/dbh.inc.php';

$petname = "";
$breed = "";
$idpet = 0;
$type = "";
$edit_state = false;

$x =  $_SESSION['userId'] ;
$ownerid = $x;

if (isset($_POST['save'])){
    $petname= $_POST['petname'];
    $breed = $_POST['breed'];
    $type = $_POST['type'];
    $ownerid = $_POST['ownerid'];

    $query = "INSERT INTO PET (petname, breed, type, ownerid) 
        VALUES('$petname', '$breed', '$type', '$ownerid')";
    mysqli_query($conn, $query);
    $_SESSION['msg'] = "Pet Saved";
    header('location:petclient.php'); //redirect catre pag dupa insert
}

if (isset($_POST['update'])){
    $petname = mysqli_real_escape_string($conn, $_POST['petname']);
    $breed = mysqli_real_escape_string($conn, $_POST['breed']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $ownerid = mysqli_real_escape_string($conn, $_POST['ownerid']);
    $idpet = mysqli_real_escape_string($conn, $_POST['idpet']);

    mysqli_query($conn, "UPDATE pet set petname = '$petname', breed='$breed',
        type = '$type' where idpet = $idpet");
    $_SESSION['msg'] = "Pet updated";
    header('location: petclient.php');
}

if (isset($_GET['del'])){
    $idpet = $_GET['del'];
    mysqli_query($conn, "DELETE FROM PET WHERE idpet=$idpet");
    $_SESSION['msg'] = "Pet deleted";
    header('location:petclient.php');
}

$results = mysqli_query($conn, "SELECT * FROM PET where ownerid='$x'");

?>