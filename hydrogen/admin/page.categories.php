<?php
echo "<option value=\"--\">what page do you want the item to appear?</option>";
$result = mysql_query('SELECT * FROM `categories` WHERE `use` = \'page\' ');
while($row = mysql_fetch_array($result))
  {
  echo"<option value=".$row['category'].">".$row['category']."</option>";
  }
?>


