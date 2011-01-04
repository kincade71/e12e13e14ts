<?php
include("../../config.php");

$id = $_GET['id'];
$folder= $_GET['folder'];
$return = $_GET['area'];
	
	echo"<script type=\"text/JavaScript\">

function delayer(){
    window.location = \"../themedevarea/readdirimg.php?folder=".$return."\"
}

//   
</script>";
echo "<body onLoad=\"setTimeout('delayer()', 0000)\" bgcolor='#ffffff'>";

/*$con = mysql_connect($data_server, $data_user, $data_pw)
				or die("couldnt connect to database");
				mysql_select_db("uploads");*/

unlink("../themedevarea/".$folder."/".$id);
?>					