<script type="text/javascript">
$(document).ready(function() {
     $('.edit_name').editable('script/update_faq_name.php', { 
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
     $('.edit_url').editable('script/update_faq_url.php', { 
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
     $('.edit_about').editable('script/update_faq_about.php', { 
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
     $('.edit_comment').editable('script/update_faq_comment.php', { 
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
     $('.edit_category').editable('script/update_faq_category.php',  { 
       	 type   : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
		 indicator : '<img src="images/loading.gif">',
		 tooltip   : 'Click to edit comment...',
		 name : 'category'
     });
 });

</script>
<!-- End JavaScript -->
<h2 style="text-align:right;"><?php 
$s = $_POST['s'];
echo "<div style=\"float:left; text-transform:capitalize;\"> items sorted by $s </div>";
?>Modify FAQ</h2>
<?php if(isset($s)){
	$result = mysql_query("SELECT * FROM `faq` WHERE category = \"$s\"");
}else{
	$result = mysql_query("SELECT * FROM `faq`");
	}

while($row1 = mysql_fetch_array($result))
  {
  echo "<div style=\"border:#000 2px solid; margin-top:4px; padding:3px;\">";
  echo "<strong>Question: </strong><div class=\"edit_name\" id=\"".$row1['id']."\">".$row1['question']."</div><hr/>"; 
  echo "<strong>Answer: </strong><div class=\"edit_url\" id=\"".html_entity_decode($row1['id'])."\">".$row1['answer']."</div><hr/>";
  echo "<strong>Category: </strong><div class=\"edit_category\" id=\"".$row1['id']."\">".$row1['category']."</div>";
  echo "<a href='deleted_faq.php?id=".$row1['id']."' class=\"back\" title=\"Delete ".$row1['question']." This action cannot be undone!!\">delete </a>";
  echo "</div>";
  }
?>