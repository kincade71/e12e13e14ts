<?php
include("../../config.php");
$calendar = $_POST['calendar'];
$faq = $_POST['faq'];
$ecom = $_POST['ecom'];
$theme = $_POST['theme'];

if(isset($theme)){
	$sql8 = "UPDATE settings SET theme = '$theme'";
	$result8 = mysql_query($sql8);
}
if(isset($calendar)){
	$sql = "UPDATE settings SET calendar = '$calendar'";
	$result = mysql_query($sql);
}
if($faq == "yes"){
	$sql1 = "INSERT INTO categories (`id`, `category`, `use`) VALUES ('', 'faq', 'page')";
				$result1 = mysql_query($sql1);
				
	$sql2 = "UPDATE settings SET faq = '$faq'";
				$result2 = mysql_query($sql2);
				
	$sql5 = "INSERT INTO navigation  SET text = 'faq', url = 'index.php?category=faq', title = 'faq', category = 'main' ";
				$sql5 = mysql_query($sql5);
			
}else{
if($faq == "no"){
	
	$sql3 = "DELETE FROM categories WHERE category = 'faq' ";
                    $result3 = mysql_query($sql3);
					
	$sql4 = "UPDATE settings SET faq = '$faq'";
					$result4 = mysql_query($sql4);
					
	$result7 = mysql_query('SELECT * FROM  navigation WHERE title = "faq"');
while($row7 = mysql_fetch_array($result7))
  {
  $faq_id = $row7['id'];
  }

  $sql6 = "DELETE FROM navigation WHERE id = '".$faq_id."' ";
                    $result6 = mysql_query($sql6);
}
}
if($ecom == "yes"){
	$sql9 = "INSERT INTO categories (`id`, `category`, `use`) VALUES ('', 'ecom', 'page')";
				$result9 = mysql_query($sql9);
				
	$sql10 = "UPDATE settings SET ecom = '$ecom'";
				$result10 = mysql_query($sql10);
				
	$sql11 = "INSERT INTO navigation  SET text = 'ecom', url = 'index.php?category=ecom', title = 'ecom', category = 'main' ";
				$sql11 = mysql_query($sql11);
			
}else{
if($ecom == "no"){
	
	$sql12 = "DELETE FROM categories WHERE category = 'ecom' ";
                    $result12 = mysql_query($sql12);
					
	$sql13 = "UPDATE settings SET ecom = '$ecom'";
					$result13 = mysql_query($sql13);
					
	$result14 = mysql_query('SELECT * FROM  navigation WHERE title = "ecom"');
while($row14 = mysql_fetch_array($result14))
  {
  $ecom_id = $row14['id'];
  }

  $sql15 = "DELETE FROM navigation WHERE id = '".$ecom_id."' ";
                    $result15 = mysql_query($sql15);
}
}
header('location:../index.php');
?>