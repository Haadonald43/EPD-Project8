<?php
session_start();
include('./connectie.php');

$query1="select * from gebruikers where naam = '$name' AND wachtwoord = '$password' ";
$uitvoer1=mysqli_query($connectie,$query1);
	if(isset($_POST['submit'])){