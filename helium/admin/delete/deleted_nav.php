<?php
include("../../config.php");
	echo"<script type=\"text/JavaScript\">

function delayer(){
    window.location = \"../modify.php?p=1\"
}

//   
</script>";
echo "<body onLoad=\"setTimeout('delayer()', 0000)\" bgcolor='#ffffff'>";


$id = $_GET['id'];
$newfile = trim(str_replace('=',' ',stristr($_GET['category'],'=')));

$query = "DELETE  FROM navigation WHERE  id = '$id' ";
                    $result = mysql_query($query);
					
					
$query1 = "DELETE  FROM categories WHERE category = '$newfile' ";
                    $result1 = mysql_query($query1);
					
				$sql = "OPTIMIZE TABLE `navigation`";
                    $result2 = mysql_query($sql);
					$sql1 = "OPTIMIZE TABLE `cateories`";
                    $result3 = mysql_query($sql1);
//					echo'id '. $id; 
//					echo $query1;
?>					