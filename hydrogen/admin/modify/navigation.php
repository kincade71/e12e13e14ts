<?php include('modify.page.categories.php'); ?>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_name').editable('script/update_name.php', { 
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
     $('.edit_url').editable('script/update_url.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit url...',
		 name : 'url'
     });
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_about').editable('script/update_about.php', { 
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
     $('.edit_comment').editable('script/update_comment.php', { 
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
     $('.edit_category').editable('script/update_category.php', { 
  	     data   : '<?php print json_encode($array); ?>',
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
?>Modify Navigation</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `navigation` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `navigation`");
	}

while($row = mysql_fetch_array($result))
  {
  echo "<div style=\"border:#000 2px solid; margin-top:4px; padding:3px;\">";
  echo "<div class=\"edit_name\" id=\"".$row['id']."\">".$row['text']."</div>"; 
  echo "<div class=\"edit_url\" id=\"".$row['id']."\">".$row['url']."</div>";
  echo "<div class=\"edit_category\" id=\"".$row['id']."\">".$row['category']."</div>";
  echo "<a href='deleted_nav.php?id=".$row['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row['text']." This action cannot be undone!!\">delete </a>";
  echo "</div>";
  }
?>