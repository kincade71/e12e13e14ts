<?php
include('../../config.php');
  $result1 = mysql_query('SELECT `email` FROM users WHERE id = "1" LIMIT 0, 1');
while($row1 = mysql_fetch_array($result1))
  {
	$email = $row1['email'];
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>

</head>

<body>
  <table border="0">
    <form action="../script/ecom.php" target="button" method="post">
      <tr>
        <td>Paypal Account Email Address<br />
          <small>(PayPal business or Premier 
          accounts only)</small></td>
        <td><input type="text" name="p_email" size="60" value="<?php echo $email; ?>"/></td>
      </tr>
      <tr>
        <td>Item Name</td>
        <td><input type="text" name="p_name" size="60"/></td>
      </tr>
      <tr>
        <td>Item ID</td>
        <td><input type="text" name="p_id" size="60"/></td>
      </tr>
      <tr>
        <td>Item Price</td>
        <td><input type="text" name="p_price" size="60"/></td>
      </tr>
      <tr>
        <td>Shipping</td>
        <td><input type="text" name="p_shipping" size="60"/></td>
      </tr>
      <tr>
        <td>Add'l Shipping</td>
        <td><input type="text" name="p_more_shipping" size="60"/></td>
      </tr>
      <tr>
        <td>Handling</td>
        <td><input type="text" name="p_handling" size="60"/></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Create HTML" style="float:right;"/></td>
      </tr>
      <td>HTML Code For Button</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<iframe id='copytext' name="button" allowtransparency="true" scrolling="yes" style="padding:0px; margin:0px;"></iframe><textarea id="holdtext" style="display:none;"></textarea></td>
        </tr>
    </form>
  </table>
</body>
</html>
