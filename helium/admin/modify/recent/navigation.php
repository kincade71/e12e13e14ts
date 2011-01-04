<?php $result = mysql_query('SELECT * FROM navigation ORDER BY id DESC LIMIT 0, 4  ');

while($row = mysql_fetch_array($result))
  {
  echo "<li>".$row['text']."</li>"; 
  }
?>