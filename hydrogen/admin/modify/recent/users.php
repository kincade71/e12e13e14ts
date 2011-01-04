<?php $result = mysql_query('SELECT * FROM users ORDER BY id DESC LIMIT 0, 4 ');

while($row = mysql_fetch_array($result))
  {
  echo "<li>".$row['username']." |<strong>role:</strong> ".$row['role']."</li>"; 
  }
?>