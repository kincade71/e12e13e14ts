<?php include('categories/modify.page.categories.php'); ?>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_category_art').editable('script/update_article_category.php',  { 
  	     data   : '<?php print json_encode($array); ?>',
       	 type   : 'select',
         submit    : 'OK',
		 name : 'category'
     });
 });
 </script>
<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify Article</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `content` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `content`");
	}
echo"<div style=\"height:200px;\">";
while($row1 = mysql_fetch_array($result))
  {
  echo "<div class=\"art\"style=\"border:#aaa 2px solid; margin-top:4px; padding:3px; -moz-border-radius:5px; width:100%;	-webkit-border-radius:5px;\">";
  echo "<strong>Title:</strong><div class=\"edit_name_art\" id=\"".$row1['id']."\"> ".$row1['header']."</div><hr/>"; 
  echo "<div id=\"".$row1['id']."\">".html_entity_decode($row1['article'])."</div><a href='modify.php?p=9&id=".$row1['id']."&page=2' class='back'>edit</a><br /><hr/>";
  echo "<strong>Appears on: </strong><div class=\"edit_category_art\" id=\"".$row1['id']."\">".$row1['category']."</div>";
  if($role == "contributor"){
			//do nothing
		}else{
  echo "<a href='delete/deleted.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row1['header']." This action cannot be undone!!\">delete </a>";
		}
  echo "</div>";
  }
  echo"</div>";
?>