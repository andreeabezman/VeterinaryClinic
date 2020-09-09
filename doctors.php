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

    if (isset($_GET['edit'])){
        $idvet = $_GET['edit'];

        $edit_state = true;

        $rec = mysqli_query($conn, "SELECT * FROM VET WHERE idvet =$idvet");
        $record = mysqli_fetch_array($rec);
        $doctorname = $record['doctorname'];
        $doctorsurname = $record['doctorsurname'];
        $doctormail = $record['doctormail'];
        $specialization = $record['specialization'];
        $idvet = $record['idvet'];

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
                <h1>Doctors</h1>
            </div>
        
        <ul class="navigation">
            <a href="doctors.php"><li>Doctors</li></a>
            <a href="pet.php"><li>Pets</li></a>
            <a href="searchdrug.php"><li>Drugs</li></a>
            <a href="user.php"><li>Users</li></a>
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
                <th>Name</th>
                <th>Surname</th>
                <th>E-Mail<th>
                <th>Specialization</th>
                <th colspan="2">Action<th>
            </tr>
        </thead>
        <tbody class="tbodydoc">
            <?php  while ($row = mysqli_fetch_array($results)){ ?>
                            <tr>
                            <td> <?php echo $row['doctorname'];?>   </td>
                            <td> <?php echo $row['doctorsurname'];?></td>
                            <td> <?php echo $row['doctormail'];?>   </td>
                            <td></td>
                            <td> <?php echo $row['specialization'];?>   </td>
                            <td>
                                <a class ="edit_btn" href="doctors.php?edit=<?php echo $row['idvet']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="del_btn" href="doctors.php?del=<?php echo $row['idvet']; ?> ">Delete</a>
                            </td>
                        </tr>
            <?php } ?>

        </tbody>
    </table>
    <form method="post" action="doctors.server.php">
    <input type = "hidden" name="idvet" value="<?php echo $idvet; ?>">
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="doctorname" value="<?php echo $doctorname; ?>">
        </div>
        <div class="input-group">
            <label>Surname</label>
            <input type="text" name="doctorsurname" value="<?php echo $doctorsurname; ?>">
        </div>
        <div class="input-group">
            <label>E-Mail</label>
            <input type="text" name="doctormail" value="<?php echo $doctormail; ?>">
        </div>
        <div class="input-group">
            <label>Specialization</label>
            <input type="text" name="specialization" value="<?php echo $specialization; ?>">
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