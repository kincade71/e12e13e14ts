<?php include('../../config.php');
$category1 = $_POST['category'];
$add = $_POST['add'];
 
if ($add = 'yes')
{
                $query = "INSERT INTO navigation SET text = '$category1', url = 'sortby.php?cat=$category1', title = 'sort faq by $category1', category = 'itservices'";
                $result = mysql_query($query);
}else
{
                //do nothing
}
 
$query1 = "INSERT INTO categories  SET category = '$category1', `use` = \"faq\"";
                                                                $result1 = mysql_query($query1);                                                                                          
?>
<script type="text/javascript">
                self.close();
</script>