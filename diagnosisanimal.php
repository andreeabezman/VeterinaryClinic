<?php 
    require('diagnosisanimal.server.php');
    $servername="localhost:3307";
    $dbUsername="root";
    $dbPassword="";
    $dbName="vets";

    $conn =  mysqli_connect($servername, $dbUsername,$dbPassword, $dbName);

    if (!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

    if (isset($_GET['edit'])){
        $iddiagnosispet = $_GET['edit'];

        $edit_state = true;

        $rec = mysqli_query($conn, "SELECT * FROM diagnosispet WHERE iddiagnosispet =$iddiagnosispet");
        $record = mysqli_fetch_array($rec);
        $iddiagnosispet = $record['iddiagnosispet'];
        $diagnosisname = $record['diagnosisname'];
        $idpet = $record['idpet'];
    }


?>
<!DOCTYPE html>
<html>
<head>
    <title>Diagnosis</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

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
                <th>Id Pet</th>
                <th>Diagnosis Name</th>
                <th colspan="2">Action<th>
            </tr>
        </thead>
        <tbody>
        <?php  while ($row = mysqli_fetch_array($results)){ ?>
                            <tr>
                            <td> <?php echo $row['idpet'];?>   </td>
                            <td> <?php echo $row['diagnosisname'];?></td>
                            <td></td>
                            <td>
                                <a class ="edit_btn" href="diagnosisanimal.php?edit=<?php echo $row['iddiagnosispet']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="del_btn" href="diagnosisanimal.php?del=<?php echo $row['iddiagnosispet']; ?> ">Delete</a>
                            </td>
                        </tr>
            <?php } ?>

        </tbody>
    </table>
    <form method="post" action="diagnosisanimal.server.php">
    <input type = "hidden" name="iddiagnosispet" value="<?php echo $iddiagnosispet; ?>">
        <div class="input-group">
            <label>Pet Id</label>
            
            <select name="idpet">
                <option>Select</option>
            <?php 
                    $query = "SELECT idpet from pet;";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)){
                        echo '<option>' .$row['idpet'].'</option>';
                    }
             ?>
            </select>    

        </div>
        <div class="input-group">
            <label>Diagnosis Name</label>
            <input type="text" name="diagnosisname" value="<?php echo $diagnosisname; ?>">
        </div>
        <div class="input-group">
        <?php if($edit_state == false): ?>
            <button type="submit" name="save" class="btn">Save</button>
        <?php else: ?>
            <button type="submit" name="update" class="btn">Update</button>
        <?php endif ?>
        </div>
    </form>
</body>
</html>



