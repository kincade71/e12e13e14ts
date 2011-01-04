<h2 style="text-align:right;">
<?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify Ecom</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `ecom` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `ecom`");
	}
echo"<div style=\"height:200px;\">";
while($row1 = mysql_fetch_array($result))
  {
  echo "<div class=\"art\"style=\"border:#aaa 2px solid; margin-top:4px; padding:3px; width:100%; -moz-border-radius:5px;	-webkit-border-radius:5px;\">";
  echo "<strong>Title:</strong><div class=\"edit_title_ecom\" id=\"".$row1['id']."\"> ".$row1['title']."</div><hr/>"; 
  echo "<strong>Description:</strong><div id=\"".$row1['id']."\">".html_entity_decode($row1['desc'])."</div><a href='modify.php?p=9&id=".$row1['id']."&page=8' class='back'>edit</a><br />
<hr/>";
  echo "<strong>Price:</strong><div id=\"".$row1['id']."\">".$row1['price']."</div>";
  if($role == "contributor"){
			//do nothing
		}else{
  echo "<a href='delete/deleted_ecom_item.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row1['title']." This action cannot be undone!!\">delete </a>";
		}
  echo "</div>";
  }
  echo"</div>";
?>