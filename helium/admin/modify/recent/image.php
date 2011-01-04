<?php $result = mysql_query('SELECT * FROM images ORDER BY id DESC LIMIT 4 ');

while($row = mysql_fetch_array($result))
  {
  echo "<li>".$row['title']."</li>"; 
  }
?>