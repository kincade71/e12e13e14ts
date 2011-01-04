<?php
$index = $_POST['index'];

$myFile = "../index.php";

$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = stripcslashes($index);
fwrite($fh, $stringData);
fclose($fh);
chmod($myFile, 0777);

header('Location:designer.php');
?>