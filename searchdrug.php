<html> 
	<head> 
	<div class="title">
            <h1> Veterinary</h1>
            <p>Thank you for choosing Overland Veterinary Clinic, your Westside LA animal hospital. We are committed to veterinary excellence in every part of our practice, ensuring that we are not only providing your pet with the best care, but also providing you with the most compassionate service. We promise a clean, welcoming facility, with plenty of natural light and a quiet atmosphere. We want you and your pet to feel calm and comforted by our animal hospital and our caring team.

It is an integral part of our practice that you not be separated from your pet during their examination and treatment. We want you to have every opportunity to be with your pet, to be a part of the decision-making process, to witness their treatment, and to comfort them throughout every step of their care.

At our animal hospital, we employ the understanding that our house is your house! We welcome you to make yourself at home, whether that means grabbing a snack from our staff room or sitting through your pet’s treatment. We truly operate with an open door policy at Overland Veterinary Clinic, offering complete transparency to our clients.</p>
        </div>
	<script type="text/javascript"> 
	function showHint(str) {   
		if (str.length == 0) {      
			document.getElementById("txtHint").innerHTML = "";     
			return;   }   
			if (window.XMLHttpRequest) {     
			// code for IE7+, Firefox, Chrome, Opera, Safari     
			xmlhttp = new XMLHttpRequest();   
			}   else {     
			// code for IE6, IE5     
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   
			}   
			xmlhttp.onreadystatechange = function() 
			{     
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {       
				document.getElementById("txtHint").innerHTML = xmlhttp.responseText;     
			}   
			
			}   
				xmlhttp.open("GET", "getdrug.php?q="+str, true);   
				xmlhttp.send(); } 
		</script> 
		
		
		
	</head> 
	<?php
    require "h.php";   
	        ?>
	<body>   
		<form class="drugsearch">      Type drug name: <input type="text" class="drug" onkeyup="showHint(this.value)" size="20" />   
		</form>   
		<p5>Suggestions: <span id="txtHint"></span></p5> 
		</body> 
        <?php
    require "footer.php";   
        ?>
