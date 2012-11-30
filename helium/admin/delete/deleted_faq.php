<?php
include("../../config.php");
	echo"<script type=\"text/JavaScript\">

function delayer(){
    window.location = \"../modify.php?p=4\"
}

//   
</script>";
echo "<body onLoad=\"setTimeout('delayer()', 0000)\" bgcolor='#ffffff'>";

/*$con = mysql_connect($data_server, $data_user, $data_pw)
				or die("couldnt connect to database");
				mysql_select_db("uploads");*/


$illegal_image= $_GET['header'];
$id = $_GET['id'];
$query = "DELETE  FROM faq WHERE  id = '$id' ";
                    $result = mysql_query($query);
					
					if ($query){
					}else{ 
						echo "there is a problem";
					}
					$sql = "OPTIMIZE TABLE `faq`";
                    $result1 = mysql_query($sql);
					/* echo $id;echo $illegal_image;*/
?>					