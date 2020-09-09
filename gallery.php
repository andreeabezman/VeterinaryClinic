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
        <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title> Document</title>
        <link rel="stylesheet" href="css/gallery.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="style.css">

        <header class="main">
            <div class="main">
            <nav class="nav-header-main">   
                <ul>
                    <li><a href="index.php">Home</li>
                    <li><a href="doctorsclient.php">Doctors</li>
                    <?php
                     if(isset($_SESSION['userId'])){
                         echo '<li><a href="petclient.php">Pets</li>';
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
                    <li><a href="schedule.php">Schedual</li>
                    <li><a href="gallery.php">Gallery</li>
                </ul>
        </header>
        <div class="title">
            <h1> Veterinary</h1>
            <p>Thank you for choosing Overland Veterinary Clinic, your Westside LA animal hospital. We are committed to veterinary excellence in every part of our practice, ensuring that we are not only providing your pet with the best care, but also providing you with the most compassionate service. We promise a clean, welcoming facility, with plenty of natural light and a quiet atmosphere. We want you and your pet to feel calm and comforted by our animal hospital and our caring team.

It is an integral part of our practice that you not be separated from your pet during their examination and treatment. We want you to have every opportunity to be with your pet, to be a part of the decision-making process, to witness their treatment, and to comfort them throughout every step of their care.

At our animal hospital, we employ the understanding that our house is your house! We welcome you to make yourself at home, whether that means grabbing a snack from our staff room or sitting through your pet’s treatment. We truly operate with an open door policy at Overland Veterinary Clinic, offering complete transparency to our clients.</p>
        </div>
    </head>

    
    <body>
       
    <section id="index-gallery" class="wrapper-gallery">
        <div class="gallery-img img1">
            <div><a href="#">Ben</a></div>
        </div>
        <div class="gallery-img img2">
            <div><a href="#">Thomas</a></div>
        </div>
        <div class="gallery-img img3">
            <div><a href="#">Felix</a></div>
        </div>
        <div class="gallery-img img4">
            <div><a href="#">Clara</a></div>
        </div>
        <div class="gallery-img img5">
            <div><a href="#">Suzi</a></div>
        </div>
        <div class="gallery-img img6">
            <div><a href="#">Fiona</a></div>
        </div>
        <div class="gallery-img img7">
            <div><a href="#">Paris</a></div>
        </div>
    </section>
    <script src="js/gallery.js"></script>
    </body>

    <?php
    require "footer.php";
    ?>
    </html>
