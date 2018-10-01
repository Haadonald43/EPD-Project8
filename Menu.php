<!DOCTYPE html>
<html>
<head>
	<?php
	include('./connectie.php');
	?>
	<link rel="stylesheet" href="Menu.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

<!--Menu-->
<div id="menu">
	<ul>
<?php
	$functie = $_SESSION['functie'];
	switch ($functie) {
		case 'admin':
			echo '<li id="blauw"><a href="./Startscherm.php"><i class="fas fa-home"></i></a></li>';
			echo '<li id="blauw"><a href="./startscherm2.php"><i class="fas fa-address-card"></i></a></li>';
			echo '<li id="blauw"><a href="./Agenda.php"><i class="fas fa-calendar-alt"></i></a></li>';	
			echo '<li id="default"><a href="./uitloggen.php"><i class="fas fa-power-off"></i></a></li>';
			break;

		case 'huisarts':
			echo '<li id="default"><a href="./Startscherm.php">Home</a></li>';
			echo '<li id="rood"><a href="./Gegevens.php">Gegevens</a></li>';
			echo '<li id="blauw"><a href="./Aandoeningen.php">Aandoeningen</a></li>';
			echo '<li id="groen"><a href="./Medicatie.php">Medicatie</a></li>';
			echo '<li id="blauw"><a href="./Aandoeningentoevoegen.php">Aandoeningen toevoegen</a></li>';
			echo '<li id="groen"><a href="./Medicatietoevoegen.php">Medicatie toevoegen</a></li>';
			echo '<li id="rood"><a href="./Agenda.php">Agenda</a></li>';
			echo '<li id="blauw"><a href="./Beeldbank.php">Beeldbank</a></li>';
			echo '<li id="blauw"><a href="./Grafieken.php">Grafiek</a></li>';
			echo '<li id="groen"><a href="./startscherm2.php">Profiel</a></li>';
			break;

		case 'ziekenhuis':
			echo '<li id="default"><a href="./ziekenhuis.php">Home</a></li>';
			echo '<li id="blauw"><a href="./Beeldbank.php">Beeldbank</a></li>';
			echo '<li id="blauw"><a href="./Grafieken.php">Grafiek</a></li>';
			break;

		case 'specialist':
			echo '<li id="default"><a href="./Startscherm.php">Home</a></li>';
			echo '<li id="rood"><a href="./Gegevens.php">Gegevens</a></li>';
			echo '<li id="blauw"><a href="./Aandoeningen.php">Aandoeningen</a></li>';
			echo '<li id="blauw"><a href="./Aandoeningentoevoegen.php">Aandoeningen toevoegen</a></li>';
			echo '<li id="rood"><a href="./Agenda.php">Agenda</a></li>';
			echo '<li id="blauw"><a href="./Grafieken.php">Grafiek</a></li>';
			echo '<li id="groen"><a href="./startscherm2.php">Profiel</a></li>';
			break;

		case 'apotheek':
			echo '<li id="default"><a href="./Startscherm.php">Home</a></li>';
			echo '<li id="groen"><a href="./Medicatie.php">Medicatie</a></li>';
			break;

		case 'verzekeringsmaatschappij':
			echo '<li id="default"><a href="./Startscherm.php">Home</a></li>';
			echo '<li id="rood"><a href="./Gegevens.php">Gegevens</a></li>';
			echo '<li id="blauw"><a href="./Aandoeningen.php">Aandoeningen</a></li>';
			echo '<li id="groen"><a href="./Medicatie.php">Medicatie</a></li>';
			echo '<li id="rood"><a href="./Gebruikerstoevoegen.php">Gebruikers toevoegen</a></li>';
			echo '<li id="blauw"><a href="./Aandoeningentoevoegen.php">Aandoeningen toevoegen</a></li>';
			echo '<li id="groen"><a href="./Medicatietoevoegen.php">Medicatie toevoegen</a></li>';
			echo '<li id="blauw"><a href="./Grafieken.php">Grafiek</a></li>';
			echo '<li id="groen"><a href="./startscherm2.php">Profiel</a></li>';
			break;
		
		default:
			echo '<li id="default"><a href="./Startscherm.php">Home</a></li>';
			echo '<li id="rood"><a href="./Agenda.php">Agenda</a></li>';
			echo '<li id="blauw"><a href="./Grafieken.php">Grafiek</a></li>';
			echo '<li id="groen"><a href="./startscherm2.php">Profiel</a></li>';
			break;
	}
?>
			
	</ul>
</div>

</body>
</html>