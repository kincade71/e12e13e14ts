<?php if($message) echo "<p>$message</p>"; ?>
<form enctype="multipart/form-data" method="post" action="../uploads/bulk.php">
<table>
<tr>
<td>
<label>Choose a zip file to upload: <input type="file" name="zip_file" /></label>
</td></tr>
<tr>
<td>
<input type="submit" name="submit" value="upload zip file" style="float:right;" />
</td></tr></table>
</form>