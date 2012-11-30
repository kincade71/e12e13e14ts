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

<table border="0">
  <form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
    <tr>
      <td><label>Title:</label>
        <br>
        <input type="text" name="title" size="28%"></td>
    </tr>
    <tr>
      <td><label>Alt:</label>
        <br>
        <input type="text" name="alt" size="28%"></td>
    </tr>
    <tr>
      <td><label for="file">Image:</label>
        <br>
        <input id="file" type="file" name="file" size="15%"></td>
    <tr>
      <td><label>Category:</label>
        <br>
        <select name="category" style="width:150px;">
          <option>repository</option>
        </select></td>
    <tr>
      <td><input id="submit" type="submit" name="submit" value="add img" style="margin-left:110px;" ></td>
    </tr>
  </form>
</table>
