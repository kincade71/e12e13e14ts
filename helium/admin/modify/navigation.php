<?php include('categories/modify.nav.categories.php'); ?>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_category_nav').editable('script/update_category.php', { 
  	     data   : '<?php print json_encode($array); ?>',
       	 type   : 'select',
         submit    : 'OK',
		 name : 'category'
     });
 });
</script>
<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\">items sorted by $s</div>";
?>Modify Navigation</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `navigation` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `navigation`");
	}
echo"<div style=\"height:200px;\">";
while($row = mysql_fetch_array($result))
  {
  echo "<div style=\"float:left; border:#aaa 2px solid; margin-top:4px; width:100%; padding:3px;-moz-border-radius:5px;	-webkit-border-radius:5px;list-style:none; \">";
  echo "<div class=\"edit_name_nav\" id=\"".$row['id']."\">".$row['text']."</div>"; 
  echo "<div id=\"".$row['id']."\">".$row['url']."</div>";
  echo "<div class=\"edit_category_nav\" id=\"".$row['id']."\">".$row['category']."</div>";
  if($role == "contributor"){
			//do nothing
		}else{
  echo "<a href='delete/deleted_nav.php?id=".$row['id']."&category=".$row['url']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row['text']." This action cannot be undone!!\">delete </a>";}
  echo "</div>";
  }
  echo"</div>";
?>