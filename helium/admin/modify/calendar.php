<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify Calendar</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `calendar` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `calendar`");
	}
echo"<div style=\"height:200px;\">";
while($row1 = mysql_fetch_array($result))
  {
  echo "<div class=\"art\"style=\"border:#aaa 2px solid; margin-top:4px; padding:3px; width:100%; -moz-border-radius:5px;	-webkit-border-radius:5px;\">";
  echo "<strong>Time:</strong><div class=\"edit_time\" id=\"".$row1['id']."\"> ".$row1['time']."</div><hr/>"; 
  echo "<div class=\"edit_details\" id=\"".$row1['id']."\">".html_entity_decode($row1['requester'])."</div><a href='modify.php?p=9&id=".$row1['id']."&page=7' class='back'>edit</a><br />
<hr/>";
  echo "<strong>Address:</strong><div class=\"edit_address\" id=\"".$row1['id']."\">".$row1['room']."</div>";
  if($role == "contributor"){
			//do nothing
		}else{
  echo "<a href='delete/deleted_cal.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row1['title']." This action cannot be undone!!\">delete </a>";
		}
  echo "</div>";
  }
  echo"</div>";
?>