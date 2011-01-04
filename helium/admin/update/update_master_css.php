<?php
$css = stripslashes($_POST['css']);
$myFile = "../css/style.css";

$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $css;
fwrite($fh, $stringData);
fclose($fh);
chmod($myFile, 0777);

header('Location:designer.php');
?>