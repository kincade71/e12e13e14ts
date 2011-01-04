<?php
// filename: upload.form.php

// first let's set some variables

// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

// make a note of the location of the upload handler
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'uploads/upload.processor.php';

// set a max file size for the html upload form
$max_file_size = 11000000; // size in bytes

// now echo the html page
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script type="text/javascript" src="admin/script/editor.js"></script>
<title>Upload form</title>
</head>
<body>
<table border="0">
<tr><td>Upload Single Images</td></tr>
  <form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post" onSubmit="editor1.prepareSubmit();">
    <h1>
      <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
    </h1>
    <tr>
      <td><label>Title:</label>
        <br>
        <input type="text" name="title" size="45%"></td>
    </tr>
    <tr>
      <td><label>Alt:</label>
        <br>
        <input type="text" name="alt" size="45%"></td>
    </tr>
    <tr>
      <td><label for="file">Image:</label>
        <br>
        <input id="file" type="file" name="file" size="32%"></td>
    <tr>
      <td><label>Category:</label>
        <br>
        <select name="category" style="width:307px;">
          <?php include(''.$CFG->wwwroot.'admin/page.categories.php'); ?>
          <option>repository</option>
        </select></td>
    <tr>
      <td colspan="3" style="height:10px;"></td>
    </tr>
    <tr>
      <td colspan="3"><input id="submit" type="submit" name="submit" value="add img" style="float:right;" ></td>
    </tr>
  </form>
</table>
</body>
</html>
