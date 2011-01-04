<?php
include('../../config.php');
if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];
	
 $zip_sql = zip_open($filename);
if ($zip_sql)
  {
  while ($zip_entry = zip_read($zip_sql))
    {
		$query = "INSERT INTO images  SET image = 'admin/uploads/". zip_entry_name($zip_entry) . "', alt ='". zip_entry_name($zip_entry) . "',title = '". zip_entry_name($zip_entry) . "', url= '', category = 'repository'";
		$result = mysql_query($query);
    }
  zip_close($zip_sql);
  }
//print result for debug only
//$result1 = mysql_query('SELECT * FROM images ');
//
//while($row1 = mysql_fetch_array($result1))
//  {
//  echo "<div style=\"border:#000 2px solid; margin-top:4px; padding:3px;\">";
//  echo "<div class=\"ajaxupload\" id=\"".$row1['id']."\" style=\"padding:5px;\"><img src=\"".$row1['image']."\" height=\"75\"/></div>"; 
//  echo "<strong>Title: </strong><div class=\"edit_name\" id=\"".$row1['id']."\" >".$row1['title']."</div><hr/>";
//  echo "<strong>Alt Tag: </strong><div class=\"edit_alt\" id=\"".$row1['id']."\">".$row1['alt']."</div><hr/>";
//  echo "<strong>Location: </strong><div class=\"edit_category\" id=\"".$row1['id']."\">".$row1['category']."</div>";
//  echo "<a href='deleted_image.php?id=".$row1['id']."' class=\"back\" title=\"Delete ".$row1['image']." This action cannot be undone!!\">delete </a>";
//  echo "</div>";
//  }

  
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
 
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		$message = "The file you are trying to upload is not a .zip file. Please try again.";
	}
 
	$target_path = "admin/uploads/test".$filename;  // change this to the correct site path
	if(move_uploaded_file($source, $target_path)) {
		$zip = new ZipArchive();
		$x = $zip->open($target_path);
		if ($x === true) {
			$zip->extractTo("admin/uploads/test"); // change this to the correct site path
			$zip->close();

			unlink($target_path);
		}
		$message = "Your .zip file was uploaded and unpacked.";
	} else {	
		$message = "There was a problem with the upload. Please try again.";
	}
}

?>