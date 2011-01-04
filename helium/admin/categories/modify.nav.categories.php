<?php
$pagecat = $result = mysql_query('SELECT * FROM `categories` WHERE `use` = \'nav\' ');
while($row = mysql_fetch_array($result))
  {
	  $array[$row['category']] = $row['category'];
 // echo"<option value=".$row['category'].">".$row['category']."</option>";
   //$array[''.$row['category'].''] = ''.$row['category'].'';
  }
?>


