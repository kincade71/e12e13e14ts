<script type="text/javascript">
$(document).ready(function() {
     $('.edit_name').editable('script/update_article_name.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit name...',
		 name : 'name'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_url').editable('script/update_article_url.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit body...',
		 name : 'url'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_about').editable('script/update_article_about.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit about section...',
		 name : 'about'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_comment').editable('script/update_article_comment.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit comment...',
		 name : 'comment'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_category').editable('script/update_article_category.php',  { 
  	     data   : " {'home':'home','main':'main','itservices':'itservices','students':'students','specialpricing':'specialpricing'}",
       	 type   : 'select',
         submit    : 'OK',
		 name : 'category'
     });
 });

</script>
<!-- End JavaScript -->
<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify Article</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `content` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `content`");
	}

while($row1 = mysql_fetch_array($result))
  {
  echo "<div style=\"border:#000 2px solid; margin-top:4px; padding:3px;\">";
  echo "<strong>Title:</strong><div class=\"edit_name\" id=\"".$row1['id']."\"> ".$row1['header']."</div><hr/>"; 
  echo "<div class=\"edit_url\" id=\"".$row1['id']."\">".html_entity_decode($row1['article'])."</div><hr/>";
  echo "<strong>Appears on: </strong><div class=\"edit_category\" id=\"".$row1['id']."\">".$row1['category']."</div>";
  echo "<a href='deleted.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row1['header']." This action cannot be undone!!\">delete </a>";
  echo "</div>";
  }
?>