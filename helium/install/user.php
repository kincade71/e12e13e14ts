<?php include('../config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CFG->sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<div id="container">
<div id="sitename"><?php echo $CFG->sitename; ?></div>
<div id="thought">The E12E13E14TS CMS is built with the idea that every site is not the same and E12E13E14TS CMS was designed to arm you the developer with a ready to go cms that you then build your site around.
  <hr />
<strong>Setp 2 Create a admin user. </strong>
Please fill in the information next door to create a admin user. Your credentials will be emailed to you for your records.(This account cannot be recovered so keep the email safe.)</div>
<form action="createtables.php" method="post" >
<table id="user">
<tr><td colspan="2" style="text-align:center">create admin user</td></tr><tr>
<tr>
  <td>firstname</td><td><input name="first" type="text" title="Please enter your first name." /></td></tr>
<tr>
<tr>
  <td>lastname</td><td><input name="last" type="text" title="Please enter your lastname." /></td></tr>
<tr>
<tr>
  <td>email</td><td><input name="email" type="text" title="Please enter your email." /></td></tr>
<tr>
<tr>
  <td>username</td><td><input name="user" type="text" title="Please enter the username you want." value="admin "/></td></tr>
<tr>
<tr>
  <td>password</td><td><input name="pass" type="password" title="Please create a password" /></td></tr>
<tr>
  <td colspan="2"><input name="" id="submit" type="submit" style="float:right" value="Submit"/></td></tr>
</table>
</form>
<div id="footer"><div style="float:right; padding-left:5px;"><img src="../images/32px.png" width="50" style="clear:both;" /></div>
    <a href="e12e.net"><img src="../images/powered_by.png"/></a></div>
</div>
</div>
</body>
</html>