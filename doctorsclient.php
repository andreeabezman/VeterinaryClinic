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
            
        </div>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header class="main">
            <div class="main">
            <nav class="nav-header-main">   
                <ul>
                    <li><a href="index.php">Home</li>
                    <li><a href="doctors.php">Doctors</li>
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
                        echo '<form action="includes/login.inc.php" method="post">
                        <button class="btnalb" type="submit" name="login-submit">Log in</button>
                          </form>'
                     ;
                    }
                         ?>     
                    <li><a href="about.php">About</li>
                    <li><a href="schedule.php">Schedule</li>
                    <li><a href="gallery.php">Gallery</li>
                </ul>
                <div class="header-login">
                <div class="input-group">
    <table>
        <thead>
            <tr class="trdoc">
                <th>Name</th>
                <th>Surname</th>
                <th>E-Mail<th>
                <th>Specialization</th>
               
            </tr>
        </thead>
        <tbody class="tab1">
            <?php  while ($row = mysqli_fetch_array($results)){ ?>
                            <tr>
                            <td> <?php echo $row['doctorname'];?>   </td>
                            <td> <?php echo $row['doctorsurname'];?></td>
                            <td> <?php echo $row['doctormail'];?>   </td>
                            <td></td>
                            <td> <?php echo $row['specialization'];?>   </td>


                        </tr>
            <?php } ?>

        </tbody>
    </table>
                </div>
                </div>
            </nav>
                </div>
        </header>
</body>
        <?php
    require "footer.php";   
        ?>
    