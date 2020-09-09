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


if ($_POST){
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

?>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="styleh.css">
<script language="javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.1.min.js"></script>
<script src="validate.js"></script>
</head>
<body class="login-admin">

<div class="header-login">
    <div class="input-group">
        <h2>Admin</h2>
        <h2>Log In</h2>
        <form action="adminloginserver.php" id="myform" method="post" onsubmit="return check_empty_field()" >

        <label> Username: </label>
        <input type="text"  class="login"  placeholder= "Username" name="username" id="username"/>
        <label> Password: </label>
        <input type="password"  class="login" placeholder="Password" name="password" id="password"/>
        <br>

        <div id="error_message"></div>
        <input type="submit" name="submit" value="Submit" class="btn"/>

        </form>
    </div>
</div>
</body>
</html>
