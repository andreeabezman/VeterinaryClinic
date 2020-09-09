<?php
session_start();
require 'includes/dbh.inc.php';

$idpet = "";
$iddiagnosispet = 0;
$diagnosisname = "";
$edit_state = false;

if (isset($_POST['save'])){
    $idpet= $_POST['idpet'];
    $iddiagnosispet = $_POST['iddiagnosis'];
    $diagnosisname = $_POST['diagnosisname'];

    $query = "INSERT INTO diagnosispet (idpet, diagnosisname) 
        VALUES('$idpet', '$diagnosisname')";
    mysqli_query($conn, $query);
    $_SESSION['msg'] = "Diagnosis Saved";
    header('location:diagnosisanimal.php'); //redirect catre pag dupa insert
}

if (isset($_POST['update'])){
    $iddiagnosispet = mysqli_real_escape_string($conn, $_POST['iddiagnosispet']);
    $diagnosisname = mysqli_real_escape_string($conn, $_POST['diagnosisname']);
    $idpet = mysqli_real_escape_string($conn, $_POST['idpet']);

    mysqli_query($conn, "UPDATE diagnosispet set diagnosisname = '$diagnosisname', idpet='$idpet'
        WHERE iddiagnosispet = $iddiagnosispet");
    $_SESSION['msg'] = "Diagnosis updated";
    header('location:diagnosisanimal.php'); //redirect catre pag dupa insert}
}
if (isset($_GET['del'])){
    $iddiagnosispet = $_GET['del'];
    mysqli_query($conn, "DELETE FROM diagnosispet WHERE iddiagnosispet=$iddiagnosispet");
    $_SESSION['msg'] = "Diagnosis deleted";
    header('location:diagnosisanimal.php');
}

$results = mysqli_query($conn, "SELECT * FROM diagnosispet;");

