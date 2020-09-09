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
    <header class="main">
    <link rel="stylesheet" href="style.css">
            <div class="main">
  
            <nav class="nav-header-main">
                       <ul>
                    <li><a href="index.php">Home</li>
                    <li><a href="doctorsclient.php">Doctors</li>
                    
                    <?php
                     if(isset($_SESSION['userId'])){
                         echo '<li><a href="petclient.php">Pets</li>'
                         ;}
                         ?>
                              
                              <?php
                     if(isset($_SESSION['userId'])){
                         echo '<form action="includes/logout.inc.php" method="post">
                            <button class="btnalb" type="submit" name="logout-submit">Log out</button>
                              </form>'
                         ;}
                    else{
                        echo '<form  action="header.php" method="post">
                        <button class="btnalb" type="submit" name="login-submit">Login</button>
                        </form>'
                          ;
                    }
                         ?>     
                    <li><a href="about.php">About</li>
                    <li><a href="schedule.php">Schedule</li>
                    <li><a href="gallery.php">Gallery</li>
                    <li><a href="#">Drug</li>
                </ul>
            </nav>
                </div>
        </header>
 