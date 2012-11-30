<?php
echo "<option value=\"--\">select where the navigation item will be</option>\n<option value=\"sidebar\">sidebar</option>";
$result = mysql_query('SELECT * FROM `categories` WHERE `use` = \'nav\' ');
while($row = mysql_fetch_array($result))
  {
  echo"<option value=".$row['category'].">".$row['category']."</option>";
  }
?>


