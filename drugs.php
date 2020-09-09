<?php 
    require('drugs.server.php');
    $servername="localhost:3307";
    $dbUsername="root";
    $dbPassword="";
    $dbName="vets";

    $conn =  mysqli_connect($servername, $dbUsername,$dbPassword, $dbName);

    if (!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

    if (isset($_GET['edit'])){
        $drugid = $_GET['edit'];

        $edit_state = true;

        $rec = mysqli_query($conn, "SELECT * FROM drug WHERE drugid =$drugid");
        $record = mysqli_fetch_array($rec);
        $drugname = $record['drugname'];
        $drugclass = $record['drugclass'];
        $drugprice = $record['drugprice'];
        $drugid = $record['drugid'];
    }
?>
<!DOCTYPE html>
<html>
<head>
<div class="title">
    </div>
    <link rel="stylesheet" type="text/css" href="styleh.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <header>
    <div class="header">
        <div class="inner_header">
            <div class="logo_container">
                <h1>Admin<span>Veterinary</span><h1>
                <h1>Drugs</h1>
            </div>
        
        <ul class="navigation">
            <a href="doctors.php"><li>Doctors</li></a>
            <a href="pet.php"><li>Pets</li></a>
            <a href="searchdrug.php"><li>Drugs</li></a>
            <a href="users.php"><li>Users</li></a>
            <a href="diagnosisanimal.php"><li>Diagnosis</li></a>
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
 <div class="header-login">
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
        <tr class="trdoc">
                <th>Drug Name</th>
                <th>Drug Class</th>
                <th>Drug Price<th>
                <th colspan="2">Action<th>
            </tr>
        </thead>
        <tbody class="tbodydoc">
            <?php  while ($row = mysqli_fetch_array($results)){ ?>
                            <tr>
                            <td> <?php echo $row['drugname'];?>   </td>
                            <td> <?php echo $row['drugclass'];?></td>
                            <td> <?php echo $row['drugprice'];?>   </td>
                            <td></td>
                            <td>
                                <a class ="edit_btn" href="drugs.php?edit=<?php echo $row['drugid']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="del_btn" href="drugs.php?del=<?php echo $row['drugid']; ?> ">Delete</a>
                            </td>
                        </tr>
            <?php } ?>

        </tbody>
    </table>
    <form method="post" action="drugs.server.php">
    <input type = "hidden" name="drugid" value="<?php echo $drugid; ?>">
        <div class="input-group">
            <label>Drug Name</label>
            <input type="text" name="drugname" value="<?php echo $drugname; ?>">
        </div>
        <div class="input-group">
            <label>Drug Class</label>
            <input type="text" name="drugclass" value="<?php echo $drugclass; ?>">
        </div>
        <div class="input-group">
            <label>Price</label>
            <input type="text" name="drugprice" value="<?php echo $drugprice; ?>">
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

</head>
<body>

</body>
</html>