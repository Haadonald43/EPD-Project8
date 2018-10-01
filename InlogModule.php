<?php
session_start();
include('./connectie.php');
	$name=$_POST['name'];
	$password= md5($_POST['password']);



//Inlog query
$query1="select * from gebruikers where naam = '$name' AND wachtwoord = '$password' ";
$uitvoer1=mysqli_query($connectie,$query1);
	if($nextrecord=mysqli_fetch_assoc($uitvoer1))
		{
			$_SESSION['functie'] = $nextrecord['functie'];
			$_SESSION['name']= $nextrecord['naam'];
			

				if($_SESSION['functie'] == 'ziekenhuis')
				{
					header('Location: ./ziekenhuis.php');
				}
				else
				{
					header('Location: ./Startscherm.php');
				}
		}
	else
		{
			echo "fout";
			header('refresh:3; url=./Inloggen.php');	
		}
?>