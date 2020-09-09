<?php 
session_start();


?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    include "../includes/dbh.inc.php"; 
    $con = mysqli_connect("localhost","root","","vets") or die ("could not connect to mysql");	
	$query = "SELECT adminid FROM admin WHERE username='$manager' AND password='$password';";
	$sql = mysqli_query($con,$query); // query the person
	
    // ------- persoana sa fie in baza sql xampp---------
    $existCount = mysqli_num_rows($sql); // count the row nums
    if ($existCount == 0) { // evaluate the count
	     while($row = mysqli_fetch_array($sql)){ 
             $adminid = $row["adminid"];
		 }
		 $_SESSION["adminid"] = $adminid;
		 $_SESSION["username"] = $manager;
		 $_SESSION["password"] = $password;
		 header("location: doctors.php");
         exit();
    } else {
		echo 'Wrong username/password <a href="http://localhost/clinica/admin_login.php">AICI</a>';
		exit();
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Home Admin Page</title>
 <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>

<body class="login-admin">
<div class="header-login">
    <div class="input-group">
 <script type="text/javascript">
function validate(event) {
	event.preventDefault();
	document.getElementById("username_error").innerHTML = "";
	document.getElementById("password_error").innerHTML = "";
 const username = document.getElementById("username").value;
 const password = document.getElementById("password").value;
 if (!!username == false){
	document.getElementById("username_error").innerHTML = "Please fill in the username";
 }
if (!!password == false){
	document.getElementById("password_error").innerHTML = "Please fill in the password";
 }
if (!!username == true && !!password == true){
	const params = {
	username: username,
	password: password
	};
	const XML = new XMLHttpRequest();
	XML.open("POST", "admin_login.php", true);
	XML.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
	XML.send(JSON.stringify(params));
	XML.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        window.location.assign("doctors.php");
        
    }	
    if (this.readyState === XMLHttpRequest.DONE && this.status === 404) {
		alert("Eroare la logare")
	}
}
}
};

</script>  

</div>
</div>
 <div allign="center" id="pageContent">

    
      <h2>Admin Log In</h2></br>
	  <table width="35%"  cellspacing="0" cellpadding="5"><tr><td><div allign="Center"></br></br>
      <form id="form1" name="form1" onsubmit="validate(event)">
       <div allign="left"> User Name:</div>
          <input name="username" type="text" id="username" class="login" size="40" />
		  <div id = "username_error" class="error_message"> </div>
        <br /><br /> 
        <div allign="left"> Password:</div>
       <input name="password" type="password" id="password" class="login" size="40" />
	   <div id = "password_error" class="error_message"> </div>
       <br />
       <br />
       <br />
         <input type="submit" name="button" id="button" class="btn" value="Log In" />
		 
	 
       
      </form>
         
		 <br />
		 <br />
		 <br />
		 <br /></td></tr></div></table>
  
</div>


</body>


</body>

</html>