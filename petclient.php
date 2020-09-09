<?php 
    require('pet.server.client.php');
    $servername="localhost:3307";
    $dbUsername="root";
    $dbPassword="";
    $dbName="vets";

    $conn =  mysqli_connect($servername, $dbUsername,$dbPassword, $dbName);

    if (!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

   //     
    $petname = "";
    $breed = "";
    $idpet = 0;
    $type = "";
    $edit_state = false;
    $z =  $_SESSION['userId'] ;
    $results = mysqli_query($conn, "SELECT * FROM PET WHERE ownerid ='$z'");
    echo $z;



    if (isset($_GET['edit'])){
        $idpet = $_GET['edit'];
        $edit_state = true;

        $recpet = mysqli_query($conn, "SELECT * FROM PET WHERE idpet ='$idpet'");
        $record = mysqli_fetch_array($recpet);
        $petname = $record['petname'];
        $breed = $record['breed'];
        $type = $record['type'];
        $ownerid = $record['ownerid'];
        $idpet = $record['idpet'];

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
                         ?>     
                    <li><a href="about.php">About</li>
                    <li><a href="#">Schedual</li>
                    <li><a href="#">Gallery</li>
                </ul>
        
            <div class="main"> 
               
               
                <div class="input-group">
   
<?php 
    if (isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>
<?php endif?>
    <table>
        <thead>
            <tr class="trpet">
                <th>Pet Name</th>
                <th>Breed</th>
                <th>Type<th>
                <th>Pet Id<th>
                <th colspan="2">Action<th>
            </tr>
        </thead>
        <tbody class="tab1">
        <?php  
        while ($row = mysqli_fetch_array($results)){
        ?>
            
                            <tr>
                            <td> <?php echo $row['petname'];?>   </td>
                            <td> <?php echo $row['breed'];?></td>
                            <td> <?php echo $row['type'];?>   </td>
                            <td></td>
                            <td> <?php echo $row['idpet'];?>   </td>
                            <td>
                                <a class ="edit_btn" href="petclient.php?edit=<?php echo $row['idpet']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="del_btn" href="petclient.php?del=<?php echo $row['idpet']; ?> ">Delete</a>
                            </td>
                        </tr>
            <?php } ?>

        </tbody>
    </table>
    <form method="post" action="pet.server.client.php">
    <input type = "hidden" name="idpet" value="<?php echo $idpet; ?>">
        <div class="input-group">
            <label>Pet Name</label>
            <input type="text" name="petname" value="<?php echo $petname; ?>">
        </div>
        <div class="input-group">
            <label>Breed</label>
            <input type="text" name="breed" value="<?php echo $breed; ?>">
        </div>
        <div class="input-group">
            <label>Type</label>
            <input type="text" name="type" value="<?php echo $type; ?>">
        </div>
        <input type = "hidden" name="ownerid" value="<?php echo $x;?>">
        <div class="input-group">

        </div>
        <div class="input-group">
        <?php if($edit_state == false): ?>
            <button type="submit" name="save" class="btn">Save</button>
        <?php else: ?>
            <button type="submit" name="update" class="btn">Update</button>
        <?php endif ?>
        </div>
    </form>
    
                </div>
                </div>
        </header>
</body>
        <?php
    require "footer.php";   
        ?>
    