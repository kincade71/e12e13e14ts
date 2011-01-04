<?php include('../config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>welcome to e12e13e14t cms</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<div id="container">
  <div id="sitename"><?php echo $CFG->sitename?></div>
  <div id="thought">The e12e13e14ts cms is built with the idea that every site is not the same it is design to arm you the developer wth a ready to go cms that you then build your site around.
    <hr />
    <br />
    <strong>Setp 3 Decide where to place your navigation. (top is default) </strong> <br />
    <br />
   </div>
  <form action="createcss.php" method="post">
    <table border="0" id="setup">
      <tr>
        <td><img src="images/layoutchoicenone.png" width="50" /></td>
        <td><img src="images/layoutchoiceleft.png" width="50" /></td>
        <td><img src="images/layoutchoiceright.png" width="50" /></td>
      </tr>
      <tr>
        <td><input type="radio" name="nav_pos" id="radio" value="top" />
          <label for="radio">top</label></td>
        <td><input type="radio" name="nav_pos" id="radio" value="left" />
          <label for="radio">left nav</label></td>
        <td><input type="radio" name="nav_pos" id="radio" value="right" />
          <label for="radio">right nav</label></td>
      </tr>
      <tr>
        <td>secondary nav</td>
        <td colspan="2"><label>
            <input type="radio" name="RadioGroup1" value="yes" id="RadioGroup1_0" />
            yes</label>
          <br />
          <label>
            <input type="radio" name="RadioGroup1" value="no" id="RadioGroup1_1" />
            no</label></td>
      </tr>
      <tr>
        <td style="border:none;">install faq</td>
        <td colspan="2" style="border:none;"><p>
            <label>
              <input type="radio" name="faq" value="yes" id="faq_0" />
              yes</label>
            <br />
            <label>
              <input type="radio" name="faq" value="no" id="faq_1" />
              no</label>
            <br />
          </p></td>
      </tr>
      <tr>
        <td colspan="3" style="border:none;"><input name="" id="submit" type="submit" style="float:right" value="Submit"/></td>
      </tr>
    </table>
  </form>
<div id="footer"><p><a href="e12e.net" target="_blank">Powered by<br />
e12e13e14ts cms</a></p>
  <a href="e12e.net"><img src="../images/powered by.png"/></a></div>
</div>
</div>
</body>
</html>