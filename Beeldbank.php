<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./startscherm.css">
<?php
	session_start();
	include('./connectie.php');
	include('./Menu.php');
	?>
	<title>EPD</title>
</head>
<body>

<div id="blok2">
<form action="upload.php" method="post" enctype="multipart/form-data">
    <h1>Upload hier uw bestand</h1><br>
    <input type="file" id="submit2" name="fileToUpload" id="fileToUpload">
    <input type="submit" id="submit2" value="Upload Image" name="submit">
</form>
</div>
<div id="blok2">
<h1>Bestanden</h1>
<?php
    ini_set('display_errors', 0);

    $dir          = './uploads';
    $file_display = array(
      'jpg',
      'jpeg',
      'png',
      'gif'
    );

if (file_exists($dir) == false) {
    echo 'Directory \''. $dir. '\' not found!';
} else {
    $dir_contents = scandir($dir);

    foreach ($dir_contents as $file) {
        $file_type = strtolower(end(explode('.', $file)));

        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
            echo "<a target='blank' href='uploads/" .$file . "'>" .$file. "</a><br>";
            echo '<img height="200px" src="'. $dir. '/'. $file. '" alt="'. $file. '" />';
            echo "<br>";
        }
    }
}
    ?>
</div>
</body>
</html>