<?php
include("../config.php");
	echo"<script type=\"text/JavaScript\">

function delayer(){
    window.location = \"userfiles/images/readdir.php\"
}

//   
</script>";
echo "<body onLoad=\"setTimeout('delayer()', 2000)\" bgcolor='#ffffff'>";

/*$con = mysql_connect($data_server, $data_user, $data_pw)
				or die("couldnt connect to database");
				mysql_select_db("uploads");*/


  $id = $_GET['id'];
unlink("userfiles/images/".$id);
?>					