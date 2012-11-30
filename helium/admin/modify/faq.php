<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify FAQ</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `faq` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `faq`");
	}
echo"<div style=\"height:200px;\">";
while($row1 = mysql_fetch_array($result))
  {
  echo "<div class=\"art\" style=\"border:#aaa 2px solid; margin-top:4px; padding:3px;-moz-border-radius:5px; width:100%;	-webkit-border-radius:5px;\">";
  echo "<strong>Question: </strong><div class=\"edit_name_faq\" id=\"".$row1['id']."\">".$row1['question']."</div><hr/>"; 
  echo "<strong>Answer: </strong><div id=\"".html_entity_decode($row1['id'])."\">".$row1['answer']."</div><a href='modify.php?p=9&id=".$row1['id']."&page=4' class='back'>edit</a><br />
<hr/>";
  echo "<strong>Category: </strong><div class=\"edit_category_faq\" id=\"".$row1['id']."\">".$row1['category']."</div>";
  if($role == "contributor"){
			//do nothing
		}else{
  echo "<a href='delete/deleted_faq.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row1['question']." This action cannot be undone!!\">delete </a>";
		}
  echo "</div>";
  }
  echo"</div>";
?>