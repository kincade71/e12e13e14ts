<?php
$hostname = $_POST['hostname'];
$dbname = $_POST['dbname'];
$db_user = $_POST['db_user'];
$db_pass = $_POST['db_pass'];
$root = $_POST['root'];
$siteTitle = $_POST['sitetitle'];

$myFile = "../config.php";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = '<?php'.'
$host="'.$hostname.'"; // Host name
$username="'.$db_user.'"; // Mysql username
$password="'.$db_pass.'"; // Mysql password
$db_name="'.$dbname.'"; // Database name
// Connect to the database 
		$dbLink = mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
		
$CFG->wwwroot = "'.$root.'";
$CFG->sitename = "'.$siteTitle.'";
$CFG->folderbase = "'.str_replace('http://www.','',$root).'";
'.'?>';
fwrite($fh, $stringData);
fclose($fh);
header('Location:user.php');
?>