<?php $result = mysql_query('SELECT * FROM `categories` WHERE `use` = \'page\' ORDER BY id DESC LIMIT 4');

while($row = mysql_fetch_array($result))
  {
  echo "<li>".$row['category']."</li>"; 
  }
?>