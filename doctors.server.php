<?php
session_start();
require 'includes/dbh.inc.php';

$doctorname = "";
$doctorsurname = "";
$idvet = 0;
$doctormail = "";
$specialization = "";
$edit_state = false;


if (isset($_POST['save'])){
    $doctorname= $_POST['doctorname'];
    $doctorsurname = $_POST['doctorsurname'];
    $doctormail = $_POST['doctormail'];
    $specialization = $_POST['specialization'];

    $query = "INSERT INTO VET (doctorname, doctorsurname, doctormail, specialization) 
        VALUES('$doctorname', '$doctorsurname', '$doctormail', '$specialization')";
    mysqli_query($conn, $query);
    $_SESSION['msg'] = "Doctor Saved";
    header('location:doctors.php'); //redirect catre pag dupa insert
}

if (isset($_POST['update'])){
    $doctorname = mysqli_real_escape_string($conn, $_POST['doctorname']);
    $doctorsurname = mysqli_real_escape_string($conn, $_POST['doctorsurname']);
    $doctormail = mysqli_real_escape_string($conn, $_POST['doctormail']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $idvet = mysqli_real_escape_string($conn, $_POST['idvet']);

    mysqli_query($conn, "UPDATE vet set doctorname = '$doctorname', doctorsurname='$doctorsurname',
        doctormail = '$doctormail', specialization = '$specialization' 
        WHERE idvet = $idvet");
    $_SESSION['msg'] = "Veterinary updated";
    header('location: doctors.php');
}

if (isset($_GET['del'])){
    $idvet = $_GET['del'];
    mysqli_query($conn, "DELETE FROM VET WHERE idvet=$idvet");
    $_SESSION['msg'] = "Veterinary deleted";
    header('location:doctors.php');
}

$results = mysqli_query($conn, "SELECT * FROM VET");

?>