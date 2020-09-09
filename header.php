<?php   
    require('doctors.server.php');
    $servername="localhost:3307";
    $dbUsername="root";
    $dbPassword="";
    $dbName="vets";

    $conn =  mysqli_connect($servername, $dbUsername,$dbPassword, $dbName);

    if (!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Example">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <div class="title">
            <h1> Veterinary</h1>
        </div>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header class="main">
            <div class="main">
            <nav class="nav-header-main">   
                <ul>
                    <li><a href="index.php">Home</li>
                    <li><a href="schedule.php">Schedule</li>

                    <li><a href="doctorsclient.php">Doctors</li>
                    <?php
                     if(isset($_SESSION['userId'])){
                         $idul = userId;
                         echo '<li><a href="petclient.php">Pets</li>'
                         ;
                        }
                         ?>
                              
                              <?php
                     if(isset($_SESSION['userId'])){
                         echo '<form action="includes/logout.inc.php" method="post">
                            <button class="btnalb" type="submit" name="logout-submit">Log out</button>
                              </form>'
                         ;}else{
                            echo '<form action="includes/login.inc.php" method="post">
                            <button class="btnalb" type="submit" name="login-submit">Log in</button>
                              </form>'
                         ;
                         }
                         ?>     
                    <li><a href="about.php">About</li>
                    <li><a href="#">Drug</li>
                </ul>

            </nav>
                </div>
                <div class="header-login">
                <div class="input-group">
                    <?php
                    if(isset($_SESSION['userId'])){
                        echo '<form action="includes/logout.inc.php" method="post">
                                    <button class="btn" type="submit" name="logout-submit">Logout</button>
                              </form>';
                    } else{
                        echo ' <form  action="includes/login.inc.php" method="post">
                                <input  class="login"type="text" name="username" placeholder="Username">
                                <br>

                                <input  class="login" type="password" name="pwd" placeholder="Password">
                                <br>
                                <button class="btn" type="submit" name="login-submit">Login</button>
                                </form>
                        <a href="signup.php" class="header-signup">Signup</a>'; 
                    }
                    ?>
                </div>
                </div>
        </header>
        <?php
    require "footer.php";   
        ?>
    