<?php $result = mysql_query('SELECT * FROM faq ORDER BY id DESC LIMIT 0, 4 ');

while($row = mysql_fetch_array($result))
  {
  echo "<li>".$row['question']."</li>"; 
  }
?>