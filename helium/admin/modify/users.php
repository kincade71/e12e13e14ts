<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify Navigation</h2>
<?php if(isset($s)){
	$result1 = mysql_query("SELECT * FROM `users` WHERE category = \"$s\"");
}else{
	$result1 = mysql_query("SELECT * FROM `users` LIMIT 1,500");
	}
echo"<div style=\"height:200px;\">";
while($row1 = mysql_fetch_array($result1))
  {
  echo "<div class=\"art\" style=\"border:#aaa 2px solid; margin-top:4px; padding:3px; -moz-border-radius:5px;width:100%;	-webkit-border-radius:5px;\">";
  echo "<strong>Username:</strong><div class=\"edit_name_user\" id=\"".$row1['id']."\"> ".$row1['username']."</div><hr/>";
    echo "<strong>Password:</strong><a href='restpass.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to rest password for this user.  This action cannot be undone!!');\" class=\"back\" title=\"Rest password for User: ".$row1['username']." This action cannot be undone!!\">reset password</a><hr/>";
  echo "<strong>Role: </strong><div class=\"edit_category_user\" id=\"".$row1['id']."\">".$row1['role']."</div>";
  if($role == "contributor"){
			//do nothing
		}else{
  echo "<a href='delete/deleted_user.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete User:".$row1['username']." This action cannot be undone!!\">delete </a>";
		}
  echo "</div>";
  }
  echo"</div>";
?>