<?php
session_start();
require 'includes/dbh.inc.php';

$drugname = "";
$drugclass = "";
$drugid = 0;
$drugprice = "";
$edit_state = false;


if (isset($_POST['save'])){
    $drugname= $_POST['drugname'];
    $drugclass = $_POST['drugclass'];
    $drugprice = $_POST['drugprice'];

    $query = "INSERT INTO DRUG (drugname, drugclass, drugprice) 
        VALUES('$drugname', '$drugclass', '$drugprice')";
    mysqli_query($conn, $query);
    $_SESSION['msg'] = "Drug Saved";
    header('location:drugs.php'); //redirect catre pag dupa insert
}

if (isset($_POST['update'])){
    $drugname = mysqli_real_escape_string($conn, $_POST['drugname']);
    $drugclass = mysqli_real_escape_string($conn, $_POST['drugclass']);
    $drugprice = mysqli_real_escape_string($conn, $_POST['drugprice']);
    $drugid = mysqli_real_escape_string($conn, $_POST['drugid']);

    mysqli_query($conn, "UPDATE drug set drugname = '$drugname', drugclass='$drugclass',
        drugprice = '$drugprice'
        WHERE drugid = $drugid");
    $_SESSION['msg'] = "Drug updated";
    header('location: drugs.php');
}

if (isset($_GET['del'])){
    $idvet = $_GET['del'];
    mysqli_query($conn, "DELETE FROM drug WHERE drugid=$drugid");
    $_SESSION['msg'] = "Drug deleted";
    header('location:drugs.php');
}

$results = mysqli_query($conn, "SELECT * FROM drug");

?>