<?php

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $username = $_POST['username'];
    $password = $_POST['pwd'];

    if (empty($username) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * from owner where username=? or mail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == false){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();

                }else if($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['ownerid'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: ../index.php?login=userId");
                    exit(); 

                }else{
                    header("Location: ../index.php?error=wrongpwd");
                    exit(); 
                }
            }
            else{
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../index.php");
    exit();
}