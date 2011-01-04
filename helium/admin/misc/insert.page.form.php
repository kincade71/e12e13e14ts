<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form action="misc/add.page.php" method="post">
  <table>
  <tr><td></td></tr>

    <tr>
      <td style="width:190px;">title of page: </td>
    </tr>
    <tr>
      <td ><input style="width:190px;" name="pagename" type="text" /></td>
    </tr>
<!--        <tr>
      <td>secondary nav
      <label>
          <input type="radio" name="RadioGroup1" value="yes" id="RadioGroup1_0" />
          yes</label>
        <label>
          <input type="radio" name="RadioGroup1" value="no" id="RadioGroup1_1" />
          no</label></td>
    </tr>-->
    <tr>
      <td colspan="2"><input name="" <?php if($role == "contributor"){
			echo 'disabled="disabled"';
		}else{
			 //do nothing
			 };?>type="submit" value="add page" style="float:right;" /></td>
    </tr>
  </table>
</form>
</body>
</html>
