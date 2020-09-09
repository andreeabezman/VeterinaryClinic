<?php 
    require('pet.server.php');
    $servername="localhost:3307";
    $dbUsername="root";
    $dbPassword="";
    $dbName="vets";

    $conn =  mysqli_connect($servername, $dbUsername,$dbPassword, $dbName);

    if (!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

    $petname = "";
    $breed = "";
    $idpet = 0;
    $type = "";
    $edit_state = false;
    $results = mysqli_query($conn, "SELECT * FROM PET");
    if (isset($_GET['edit'])){
        $idpet = $_GET['edit'];

        $edit_state = true;

        $recpet = mysqli_query($conn, "SELECT * FROM PET WHERE idpet =$idpet");
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
<link rel="stylesheet" type="text/css" href="styleh.css">
<link rel="stylesheet" type="text/css" href="style.css">
<header>
    <div class="header">
        <div class="inner_header">
            <div class="logo_container">
                <h1>Admin<span>Veterinary</span><h1>
                <h1> Pets</h1>
            </div>
        
        <ul class="navigation">
            <a href="doctors.php"><li>Doctors</li></a>
            <a href="pet.php"><li>Pets</li></a>
            <a href="drugs.php"><li>Drugs</li></a>
            <a href="user.php"><li>Users</li></a>
            <a href="./includes/logout.inc.php"><li>Log Out</li></a>
            <?php
                     if(isset($_SESSION['manager'])){
                         echo '<form action="includes/logout.inc.php" method="post">
                            <button class="btnalb" type="submit" name="logout-submit">Log out</button>
                              </form>'
                         ;}
                         ?>     
        </ul>
        </div>
 </div>
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
            <tr>
                <th>Pet Name</th>
                <th>Breed</th>
                <th>Type<th>
                <th>Owner Id</th>
                <th colspan="2">Action<th>
            </tr>
        </thead>
        <tbody>
        <?php  while ($row = mysqli_fetch_array($results)){ ?>
                            <tr>
                            <td> <?php echo $row['petname'];?>   </td>
                            <td> <?php echo $row['breed'];?></td>
                            <td> <?php echo $row['type'];?>   </td>
                            <td></td>
                            <td> <?php echo $row['ownerid'];?>   </td>
                            <td>
                                <a class ="edit_btn" href="pet.php?edit=<?php echo $row['idpet']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="del_btn" href="pet.php?del=<?php echo $row['idpet']; ?> ">Delete</a>
                            </td>
                        </tr>
            <?php } ?>

        </tbody>
    </table>
    <form method="post" action="pet.server.php">
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
        <div class="input-group">
            <label>Owner Id</label>
            
            <select name="ownerid">
                <option>Select</option>
            <?php 
                    $query = "SELECT ownerid from owner;";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)){
                        echo '<option>' .$row['ownerid'].'</option>';
                    }
             ?>
            </select>    

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

</header>

        
</head>

 
</html>



