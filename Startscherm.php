<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./startscherm.css">
<?php
	session_start();
	include('./connectie.php');
	include('./Menu.php');
	include('./dboop.php');
	?>
	<title>EPD</title>
</head>
<body>


<div id="blok-rechts">
	<h1>Selecteer Patiënt</h1>
	<form name="myForm" action="#" method="post">
	<select name="select" id="selectbox">
<?php
error_reporting(E_ERROR | E_PARSE);


$oDB = new db();


		$query1="SELECT gebruikers.BSN, gebruikers.naam, patient.adres, patient.woonplaats, patient.bloedgroep FROM gebruikers INNER JOIN patient ON gebruikers.BSN = patient.BSN";
		$result=$oDB->getResult($query1);

			while ($nextrecord=$result->fetch_assoc())
				{
					echo "<option value='" .$nextrecord[BSN]. "'>" .$nextrecord[BSN]. " - " .$nextrecord[naam]. "</option>";
				}
?>
	</select>
		<input type='submit' name='submit' id='selectbutton' value='Selecteer'/>
	</form>

</div>

<div id="blok">
	<h1>Gegevens</h1>
<?php
	if(isset($_POST['submit'])){
	$selected = $_POST['select'];

	}

	$query1="SELECT * FROM patient WHERE patient.BSN = '$selected'";
		$result1=$oDB->getResult($query1);
?>
<table>
<?php
			while ($nextrecord=$result1->fetch_assoc())
				{
					echo "<tr><td>Naam</td><td>" .$nextrecord['naam']. "</tr>";
					echo "<tr><td>BSN</td><td>" .$nextrecord['BSN']. "</tr>";
					echo "<tr><td>Adres</td><td>" .$nextrecord['adres']. "</tr>";
					echo "<tr><td>Woonplaats</td><td>" .$nextrecord['woonplaats']. "</tr>";
					echo "<tr><td>Bloedgroep</td><td>" .$nextrecord['bloedgroep']. "</tr>";
					echo "<tr><td>Huisarts</td><td>" .$nextrecord['huisarts']. "</tr>";
					echo "<tr><td>Verzekering</td><td>" .$nextrecord['verzekeringsmaatschappij']. "</tr>";
				}

?>
</table>
</div>

<div id="blok">
	<h1>Medicatie</h1>
<?php
	if(isset($_POST['submit'])){
	$selected = $_POST['select'];

	}

	$query1="SELECT * FROM medicatie WHERE medicatie.BSN = '$selected'";
		$result1=$oDB->getResult($query1);
?>
<table>
<?php
			while ($nextrecord=$result1->fetch_assoc())
				{
					echo "<tr><td>Type medicijn</td><td>" .$nextrecord['type']. "</tr>";
					echo "<tr><td>Beschrijving</td><td>" .$nextrecord['beschrijving']. "</tr>";
					echo "<tr><td></td><td></td></tr>";
				}

?>
</table>
</div>

<div id="blok">
	<h1>Aandoeningen</h1>
<?php
	if(isset($_POST['submit'])){
	$selected = $_POST['select'];

	}

	$query1="SELECT * FROM aandoeningen WHERE aandoeningen.BSN = '$selected'";
		$result1=$oDB->getResult($query1);
?>
<table>
<?php
			while ($nextrecord=$result1->fetch_assoc())
				{
					echo "<tr><td>Type aandoening</td><td>" .$nextrecord['type']. "</tr>";
					echo "<tr><td>Beschrijving</td><td>" .$nextrecord['aandoening']. "</tr>";
					echo "<tr><td></td><td></td></tr>";
				}

?>
</table>
</div>
</body>
</html>