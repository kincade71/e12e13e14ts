<?php
// filename: upload.form.php

// first let's set some variables

// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

// make a note of the location of the upload handler
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'userfiles/images/upload.processor.php';

// set a max file size for the html upload form
$max_file_size = 11000000; // size in bytes

// now echo the html page
?>

<table border="0">
  <tr>
    <td>Upload Single Images</td>
  </tr>
  <form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
    <tr>
      <td><label for="file">Image:</label>
        <input id="file" type="file" name="file" style="width:229px">
 <input id="submit" type="submit" name="submit" value="upload" ></td>
  </form>
</table>
