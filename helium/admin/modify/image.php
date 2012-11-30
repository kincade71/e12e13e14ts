<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify Images</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `images` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `images`");
	}
echo"<div style=\"height:200px;\">";
while($row1 = mysql_fetch_array($result))
  {
  echo "<div class=\"art\" style=\"border:#aaa 2px solid; margin-top:4px; padding:3px; -moz-border-radius:5px;width:100%;	-webkit-border-radius:5px;\">";
  echo "<div class=\"ajaxupload_img\" id=\"".$row1['id']."\" style=\"padding:5px;\"><img src=\"".$row1['image']."\" height=\"75\"/></div>"; 
  echo "<strong>Title: </strong><div class=\"edit_name_img\" id=\"".$row1['id']."\" >".$row1['title']."</div><hr/>";
  echo "<strong>Alt Tag: </strong><div class=\"edit_url_img\" id=\"".$row1['id']."\">".$row1['alt']."</div><hr/>";
  echo "<strong>Location: </strong><div class=\"edit_category_img\" id=\"".$row1['id']."\">".$row1['category']."</div>";
  if($role == "contributor"){
			//do nothing
		}else{
  echo "<a href='delete/deleted_image.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row1['image']." This action cannot be undone!!\">delete </a>";
		}
  echo "</div>";
  }
  echo"</div>";
?>