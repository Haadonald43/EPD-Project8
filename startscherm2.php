<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Startscherm.css">
<?php
	session_start();
	include('./connectie.php');
	include('./Menu.php');
?>
	<title>EPD</title>
</head>
<body>
<div id="blok">
		<?php
		$functie = $_SESSION['functie'];
		$name = $_SESSION['name'];

		ini_set('display_errors', 0);

		$dir          = './' .$name. '';
		$file_display = array(
    	'jpg',
    	'jpeg',
    	'png',
    	'gif'
		);

if (file_exists($dir) == false) {
    echo '<form action="uploadpf.php" method="post" enctype="multipart/form-data">
    <input type="file" id="submit1" name="fileToUpload" id="fileToUpload">
    <input type="submit" id="submit1" value="Upload profielfoto" name="submit">
</form>';
} else {
    $dir_contents = scandir($dir);

    foreach ($dir_contents as $file) {
        $file_type = strtolower(end(explode('.', $file)));

        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
            echo '<img height="200px" src="'. $dir. '/'. $file. '" alt="'. $name. '" />';
            echo "<br>";
        }
    }
}

		
		$query="SELECT * FROM gebruikers";
			$uitvoer=mysqli_query($connectie,$query);
			if($nextrecord=mysqli_fetch_assoc($uitvoer))
				{
					echo "<h1>" .$nextrecord['naam']. "</h1>";
					echo "Functie: " .$nextrecord['functie']. "</br>";
					echo "BSN-nummer: " .$nextrecord['BSN']. "";
				}
		?>
</div>
</body>