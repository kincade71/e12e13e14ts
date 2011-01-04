
<script type="text/javascript">
$(document).ready(function() {
     $('.edit_name').editable('script/update_image_name.php', { 
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
     $('.edit_url').editable('script/update_image_url.php', { 
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
     $('.edit_about').editable('script/update_image_about.php', { 
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
     $('.edit_comment').editable('script/update_image_comment.php', { 
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
     $('.edit_category').editable('script/update_image_category.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to change the page this image appears on...',
		 name : 'category'
     });
 });

</script>
<!-- End JavaScript -->
<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify Images</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `images` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `images`");
	}

while($row1 = mysql_fetch_array($result))
  {
  echo "<div style=\"border:#000 2px solid; margin-top:4px; padding:3px;\">";
  echo "<div class=\"ajaxupload\" id=\"".$row1['id']."\" style=\"padding:5px;\"><img src=\"".$row1['image']."\" height=\"75\"/></div>"; 
  echo "<strong>Title: </strong><div class=\"edit_name\" id=\"".$row1['id']."\" >".$row1['title']."</div><hr/>";
  echo "<strong>Alt Tag: </strong><div class=\"edit_url\" id=\"".$row1['id']."\">".$row1['alt']."</div><hr/>";
  echo "<strong>Location: </strong><div class=\"edit_category\" id=\"".$row1['id']."\">".$row1['category']."</div>";
  echo "<a href='deleted_image.php?id=".$row1['id']."' onclick=\"return confirm('Wait!!! Are you sure you want to delete this item.  This action cannot be undone!!');\" class=\"back\" title=\"Delete ".$row1['image']." This action cannot be undone!!\">delete </a>";
  echo "</div>";
  }
?>