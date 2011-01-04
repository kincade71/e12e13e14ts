<h2 style="text-align:right;">Modify Pages</h2>
<?php
include('../../config.php');
echo"<ul>";
$result = mysql_query('SELECT * FROM `categories` WHERE `use`= "page"');
while($row = mysql_fetch_array($result))
  {
	 echo "<li style=\"border-bottom:#000 2px solid; padding:4px;\">Filename: ".$row['category']."<br><a href=\"../index.php?category=".$row['category']."\" target=\"_blank\">Open page in new window</a>
<a href=\"delete/deleted_page.php?file=".$row['category']."\" onclick=\"return confirm('Wait!!! Are you sure you want to delete this ".$row['category'].".  This action cannot be undone!!');\" title=\"Delete ".$row['category'].". This action cannot be undone!!\" style=\"float:right;\">delete page</a></li>";  
  }
echo"</ul>";
?>