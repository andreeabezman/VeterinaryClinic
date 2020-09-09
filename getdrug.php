<?php $q=$_GET["q"]; 
$server = 'localhost:3307';
$database = 'vets';
$username = 'root';
$pass = '';


$conn = new mysqli($server, $username, $pass, $database);

$sql="SELECT * FROM drug WHERE drugname = '".$q."'"; 
$result = mysqli_query($conn, $sql); 
echo "<table border='1'>       <tr>       
	<th>Id</th>       
	<th>Drug Name</th>       
	<th>Drug Class</th>       
	<th>Price</th>              
	</tr>"; 
	
while($row = mysqli_fetch_array($result)) 
{   
	echo "<tr>";   
	echo "<td>" . $row['drugid'] . "</td>";   
	echo "<td>" . $row['drugname'] . "</td>";   
	echo "<td>" . $row['drugclass'] . "</td>";   
	echo "<td>" . $row['drugprice'] . "</td>";   
	echo "</tr>"; 
} 

?>