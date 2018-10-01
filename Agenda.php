<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./Agenda.css">
  <meta charset='utf-8' />
  <link href='calendar/fullcalendar.min.css' rel='stylesheet' />
  <link href='calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <script src='calendar/lib/moment.min.js'></script>
  <script src='calendar/lib/jquery.min.js'></script>
  <script src='calendar/fullcalendar.min.js'></script>
<?php
  session_start();
  include('./connectie.php');
  include('./Menu.php');
  include('./dboop.php');
  ?>
  <title>EPD</title>
</head>
<body>

<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month, agendaWeek, agendaDay, listMonth'
      },
      defaultDate: '2018-06-18',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      //editable: true,
      events: [

<?php

  $name = $_SESSION['name'];  

    $query1="SELECT afspraken.afspraak, afspraken.startdatum, afspraken.einddatum, patient.naam FROM afspraken INNER JOIN patient ON afspraken.BSN = patient.BSN";
  $uitvoer1=mysqli_query($connectie,$query1);
        while($nextrecord=mysqli_fetch_assoc($uitvoer1))
    {
      echo "{title: '" .$nextrecord['afspraak']. " - " .$nextrecord['naam']. "', start: '" .$nextrecord['startdatum']. "', end: '"
      .$nextrecord['einddatum']. "', overlap: false, color: '#43b2db'},";
    }
  


?>

    ]
    });

  });
</script>

<div id="blok1">
  <div id='calendar'></div>
</div>

<div id="blok2">
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


<?php
  $name = $_SESSION['name'];
  switch ($functie) {
  case 'admin':
  case 'specialist':
?>
  <div id='blok2'>
    <form action='./Agendatoevoegen.php' method='POST'>
      <h1>Voer nieuwe afspraak in</h1>

    Naam client:<select name="BSN">
<?php
    $query1="SELECT BSN, naam FROM gebruikers WHERE gebruikers.functie = 'patient'";
    $uitvoer1=mysqli_query($connectie,$query1);
      while($nextrecord=mysqli_fetch_assoc($uitvoer1))
      {
        echo "<option value='" .$nextrecord[BSN]. "'>" .$nextrecord[BSN]. " - " .$nextrecord[naam]. "</option>";
      }
?>
    </select><br>
    Naam afspraak: <input type="text" name="afspraak" size=30><br>
    Startdatum: <input type="date" name="startdatum" value="2018-06-20" min="2018-06-20" max="2020-06-20"><br>
    Einddatum: <input type="date" name="einddatum" value="2018-06-20" min="2018-06-20" max="2020-06-20"><br><br>
    <input type='submit' name='submit' id="selectbutton" value='voeg toe aan db' />
  </div>
<?php
  break;
?>

<?php
  case 'huisarts':
?>

<?php
  break;

  default:
  break;
  }
?>

  </select>
</form>

</body>
</html>
