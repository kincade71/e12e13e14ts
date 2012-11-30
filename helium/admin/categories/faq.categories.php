<?php
$result = mysql_query('SELECT * FROM `categories` WHERE `use` = \'faq\' ');
while($row = mysql_fetch_array($result))
  {
  echo"<option value=".$row['category'].">".$row['category']."</option>";
  }
?>


