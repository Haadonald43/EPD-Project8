<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	include("./connectie.php");
	include("./dboop.php");
	?>
	<title>Inloggen</title>
	<link rel="stylesheet" type="text/css" href="Inloggen.css">
</head>
<body>
	<div id="topbalk">
	</div>

	<!--inlogformulier-->
	<div id="inlog">
	<h1>Inloggen</h1>
	<form name="myForm" action="InlogModule.php" onsubmit="return validateForm()" method="post">
		Name: </br><input type="text" name="name" id="name"><br>
		Password: </br><input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Uw wachtwoord moet minstens 8 tekens lang zijn, ook moet het minstens een nummer, hoofdletter en kleine letter bevatten." required><br>
		<input type='submit' name='submit' id='button' value='Inloggen'/>
	</form>
	</div>

	<!--Validatie-->
	<script type="text/javascript">

	function validateForm() {
   	var x = document.forms["myForm"]["name"].value;
    if (x == "") {
        alert("Vul uw naam in");
        return false;
    	}
 	else {
 		return true;
 		}
	}

     
	</script>
</body>
</html>