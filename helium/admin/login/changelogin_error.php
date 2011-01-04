<?php
session_start();
include("../../config.php");

$sql="SELECT * FROM users WHERE username='$_SESSION[user]' and pass='$_SESSION[pass]'";
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
if(isset($_SESSION['pass']))
{
	//Do Nothing
}
else
{
	header ("Location:login/login.php");
}
$role = $_SESSION['role'];
$token = md5("e12e13e14ts");
$result = mysql_query('SELECT * FROM  settings');
while($row = mysql_fetch_array($result))
  {
  $calendar = $row['calendar'];
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $CFG->sitename."&nbsp; admin"; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link type="text/css" rel="stylesheet" href="../css/style.css" />
<!-- End Stylesheets -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script src="../script/acc.js" type="text/javascript"></script>
<script src="../script/ajax.js" type="text/javascript"></script>
<script src="../js/codemirror.js" type="text/javascript"></script> 
<script type="text/javascript"> 
function popup1(url){
	window.open(url,'name','height=10,width=745,toolbar=none,menubar=none,location=none,scrollbars=no,resizable=no')}
</script>
<script type="text/javascript"> 
function popup2(url){
	window.open(url,'name','height=700,width=960,toolbar=none,menubar=none,location=none,scrollbars=no,resizable=no')}
</script>
<script type="text/javascript"> 
function popup3(url){
	window.open(url,'name','height=275,width=450,toolbar=none,menubar=none,location=none,scrollbars=no,resizable=no')}
</script>
</head>

<body>
<div id="sitename">Sitename: <?php echo $CFG->sitename?> admin page <span>Welcome: <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['last']; ?> | <?php echo $role; ?> | <a href="logout.php" title="Logout: <?php echo $_SESSION['name']; ?>  <?php echo $_SESSION['last']; ?>">Logout</a> || <a href="https://github.com/kincade71/e12e13e14ts/wiki" target="_blank">Help</a></span></div>
<div id="container">
<div class="nav">
<ul>
<?php if($role == "designer"){

}else{
	echo'
<li><a href="../index.php">create/add</a></li>
<li><a href="../modify.php?p=1">modify/delete</a></li>';}?>
<?php if($role == "contributor"){
			//do nothing
		}else{
echo'<li><a href="../designer.php">designer</a></li>
<li><a href="../themebuilder.php">themebuilder</a></li>
';
		}
if($calendar == "yes"){
echo'<li><a href="../calendar.php">calendar</a></li>';
}
?>
<li><a href="changelog/index.php">changelog</a></li>
<?php if($role == "designer"){
			echo'</ul>';//do nothing
		}else{echo'
<li>
  <div class="wrapper">
  <div class="accordionButton" >site settings</div>
  <div class="accordionContent">
    <div>
      <div>
        <form action="script/setttings.php" method="post">
          <table border="0" width="50%">
            <tr>
              <td>Faq</td>
              <td><table width="200">
                  <tr>
                    <td><label>
                        <input type="radio" name="faq" value="yes" id="faq_0" />
                        Yes</label></td>
                  </tr>
                  <tr>
                    <td><label>
                        <input type="radio" name="faq" value="no" id="faq_1" />
                        No</label></td>
                  </tr>
                </table>
            <tr>
              <td>Calendar</td>
              <td><table width="200">
                  <tr>
                    <td><label>
                        <input type="radio" name="calendar" value="yes" id="calendar_0" />
                        Yes</label></td>
                  </tr>
                  <tr>
                    <td><label>
                        <input type="radio" name="calendar" value=" " id="calendar_1" />
                        No</label></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
            <td>Theme</td>
            <td><table width="200">';
                 include('../theme/readdir.php');
              echo'</table></td>
            </tr>
            <tr>
              <td><input type="submit" value="save selections" style="float:right;"/></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  <div class="accordionButton" >image uploads</div>
  <div class="accordionContent">
    <div>
      <div>';
        include("upload.form.php");
      echo'</div>
    </div>
  </div>
  <div class="accordionButton" >add to navigation</div>
  <div class="accordionContent">
    <div>';
      include("misc/nav.form.php");
    echo'</div>
  </div>
  <div class="accordionButton" >add page</div>
  <div class="accordionContent">
  <div>';
  include("misc/insert.page.form.php");
echo'</div>
</div>
</div>
</li>
</ul>';}?>

    <div style="float:right;">
    <div style="float:right; height:auto; width:350px; padding:10p;">
      <div>
        <div>
        </div>
      </div>
    </div>
    <div style="float:right; clear:right;  height:auto; width:350px; padding:10p;"><br />
      <?php include("userfiles/images/upload.form.php"); ?>
    </div>
    <div style="float:right; clear:right;  height:auto; width:350px; padding:10p;"><br />
      <?php include('userfiles/js/readdir.php'); ?>
    </div></div>
  <div style="float:left; width:456px; min-height:500px;">     
      <form action="index.php" method="post">
	<table>
	<tr >
	<td style="background-color:#ccc; padding:4px;">
	<select name="p" style="float:left; width:400px;" disabled="disabled">
	<option value="2">Create Article</option>
    <?php if (file_exists('../faq.php')) {
	echo '<option value="4">Create FAQ</option>';
    };?>
	<?php if($role == "contributor"){
			//do nothing
		}else{
			echo'<option value="6">Create User</option>';
		}?>
    </select>
	</td>
	<td style="background-color:#ccc; padding:4px;"><input disabled="disabled" type="submit" value="Go" style="height:35px;width:55px;"/></td>
	</tr>
	</table></form>
<h2>  Please change your password below</h2><br />

<form method="post" action="../script/changepass.php">
<table border="0">
<tr>
<td colspan="2" style="text-align:center;"><strong style="color:#F00;">Error Passwords did not match.</strong></td>
</tr>
<tr>
<td style="background-color:#ccc; padding:4px;"><strong>old password</strong></td>
<td style="background-color:#ccc; padding:4px;"><input name="oldpass" type="password" value="user" size="70%"/></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>new password</strong></td>
<td>&nbsp;<input name="newpass1" type="password" size="70%"/></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td style="background-color:#ccc; padding:4px;"><strong>retype password</strong></td>
<td style="background-color:#ccc; padding:4px;"><input name="newpass" type="password" size="70%"/></td>
</tr>
<tr>
<td>&nbsp;<input name="id" type="hidden" value="<?php echo $id; ?>"/></td>
</tr>
<tr>
<td colspan="2"><input name="submit" type="submit" value="Change Password" style="float:right" /></td>
</tr>
</table>
</form>
  </div>
<div id="footer">&copy;<?php echo date('Y'); ?><?php echo $CFG->sitename?><a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0; float:left;" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a><a href="#" onclick="popup3('../about.php')" style="border:none;"><img src="../images/e12bannersmall.png" style="float:right;" /></a></div>
<script type="text/javascript"> 
      var editor = CodeMirror.fromTextArea('code', {
        height: "350px",
        parserfile: ["parsexml.js", "parsecss.js", "tokenizejavascript.js", "parsejavascript.js",
                     "contrib/php/js/tokenizephp.js", "contrib/php/js/parsephp.js",
                     ".contrib/php/js/parsephphtmlmixed.js"],
        stylesheet: ["css/xmlcolors.css", "css/jscolors.css", "css/csscolors.css", "css/phpcolors.css"],
        path: "js/",
        continuousScanning: 500
      });
    </script> 
    
</body>
</html>