<?php 
    require('user.server.php');
    $servername="localhost:3307";
    $dbUsername="root";
    $dbPassword="";
    $dbName="vets";

    $conn =  mysqli_connect($servername, $dbUsername,$dbPassword, $dbName);

    if (!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

    if (isset($_GET['edit'])){
        $ownerid = $_GET['edit'];

        $edit_state = true;

        $recpet = mysqli_query($conn, "SELECT * FROM owner WHERE ownerid =$ownerid");
        $record = mysqli_fetch_array($recpet);
        $username = $record['username'];
        $password = $record['password'];
        $mail = $record['mail'];
        $ownerid = $record['ownerid'];
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
                <h1> Users</h1>
            </div>
        
        <ul class="navigation">
            <a href="doctors.php"><li>Doctors</li></a>
            <a href="pet.php"><li>Pets</li></a>
            <a href="drugs.php"><li>Drugs</li></a>
            <a href="users.php"><li>Users</li></a>
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
                <th>Username</th>
                <th>Password</th>
                <th>Mail</th>
                <th>User</th>
        
                <th colspan="2">Action<th>
            </tr>
        </thead>
        <tbody>
        <?php  while ($row = mysqli_fetch_array($results)){ ?>
                            <tr>
                            <td> <?php echo $row['username'];?>   </td>
                            <td> <?php echo $row['password'];?></td>
                            <td> <?php echo $row['mail'];?>   </td>
                            <td> <?php echo $row['ownerid'];?>   </td>
                            <td></td>
                            <td>
                                <a class ="edit_btn" href="user.php?edit=<?php echo $row['ownerid']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="del_btn" href="user.php?del=<?php echo $row['ownerid']; ?> ">Delete</a>
                            </td>
                        </tr>
            <?php } ?>

        </tbody>
    </table>
    <form method="post" action="user.server.php">
    <input type = "hidden" name="ownerid" value="<?php echo $ownerid; ?>">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $password; ?>">
        </div>
        <div class="input-group">
            <label>Mail</label>
            <input type="text" name="mail" value="<?php echo $mail; ?>">
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



