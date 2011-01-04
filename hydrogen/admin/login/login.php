<?php 
include('../../config.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//Dtd HTML 4.01 transitional//EN">
<html>
<head>
<title>Login <?php echo $CFG->sitename ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<style type="text/css">
body
{
	background-color:#333;
}
#sitename {
	padding-left:250px;
	padding-top:25px;
	text-decoration:none;
	font-weight:bold;
	font-size:44px;
	color:#000;
	text-shadow:-1px 1px 1px #4A4947;
	text-transform:uppercase;
}
</style>
</head>
<body>
<table align="center" class="bigtable" valign="middle" height="100%" width="320px" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td width="49%"> <form action="scripts/checklogin.php" method="post" >
    <div  id="sitename"> <?php echo $CFG->sitename?></div>
        <P class=style1><br>
          <?php echo $CFG->sitename ?> admin log-in</P>
        <DIV align=center></DIV>
        <table>
          <tr>
            <td><DIV align=left><SPAN class=style5>Username: </SPAN></DIV></td>
            <td><INPUT  maxLength="32" size="35" name="user" class="field"></td>
          </tr>
          <tr>
            <td><DIV align=left><SPAN class=style5>Password: </SPAN></DIV></td>
            <td><INPUT  maxLength="32" size="35" name="pass" type="password" class="field"></td>
          <tr>
            <td colspan="2" align="right"><INPUT type="submit" value="Log-In" name="Submit2" class="submit">
            </td>
          </tr>
        </table>
      </FORM>
  </tr>
</table>
</body>
</html>
