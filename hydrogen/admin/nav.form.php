<?php
echo'<form action="nav.insert.form.php" method="post">
<table>
<tr><td>add to navigation</td></tr>
<tr>
<td style="width:307px;">title:</td>
</tr>
<tr>
<td>
<input type="text" name="text" style="width:307px;"/>
</td>
</tr>
<tr>
<td style="width:307px;">url:</td>
</tr>
<tr>
<td>
<input type="text" name="url" style="width:307px;"/>
</td>
</tr>
<tr>
<td style="width:307px;">alt:</td>
</tr>
<tr>
<td>
<input type="text" name="title" style="width:307px;"/>
</td>
</tr>
<tr>
<td style="width:307px;">
catergory:
</td>
</tr>
<tr>
<td>
<select name="category" style="width:307px;"/>';
include('categories.php');
echo'</select>
</td>
</tr>
<tr>
<td>
<input type="submit" type="submit" value="add nav" style="float:right;"/>
</td>
</tr>
</table>
</form>';
?>