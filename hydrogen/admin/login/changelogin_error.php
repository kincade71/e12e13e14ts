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
$result1 = mysql_query("SELECT id FROM users WHERE username='$_SESSION[user]' and pass='$_SESSION[pass]'");
while($row1 = mysql_fetch_array($result1))
  {
  	$id = $row1['id'];
  } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $CFG->sitename?> Admin</title>
<link type="text/css" rel="stylesheet" href="../css/style.css" />
<!-- End Stylesheets -->
<?php $p = $_POST['p'];
	if ($p == "2"){
 echo '<script type="text/javascript" src="script/editor.js"></script>';
};
if ($p == "4"){
echo '<script type="text/javascript" src="script/editor1.js"></script>';
}
?>
<script type="text/javascript"> 
function popup1(url){
	window.open(url,'name','height=10,width=650,toolbar=none,menubar=none,location=none,scrollbars=no,resizable=no')}
</script>
</head>

<body>
<div id="container">
<div style="float:right;">
Welcome: <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['last']; ?> | <?php echo $role; ?> | <a href="logout.php" title="Logout: <?php echo $_SESSION['name']; ?>  <?php echo $_SESSION['last']; ?>">Logout</a><br />
</div>
<div style="padding-left:175px; padding-top:-5px; font-size:36px; line-height:35px; border:none; text-decoration:none; font-weight:bold; color:#fff; font-family:Arial, Helvetica, sans-serif;text-shadow:-1px 1px 1px  #000;"><?php echo $CFG->sitename?> <br />
admin page</div>
<div class="nav">    
       <ul>
        <li><a href="index.php">create/add</a></li>
        <?php if($role == "contributor"){
			//do nothing
		}else{
			echo'<li><a href="modify.php?p=1">modify/delete</a></li>';
		}?>
      </ul>
 </div>
 <div style="float:right; width:600px; height:700px;">     
      <form action="index.php" method="post">
	<table>
	<tr >
	<td style="background-color:#ccc; padding:4px;">
	<select name="p" style="float:left; width:520px;" disabled="disabled">
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
<td colspan="2" style="text-align:center;"><strong style="color:#F00;">Error Passwors did not match.</strong></td>
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
  
  <div style="float:left; width:320px; margin-top:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;">  
    <?php 
	//$u = $_POST['u'];
//	if ($u == "2"){
//		include('bulkupload.php');
//	}else{
//		include('upload.form.php');
//	}
	?><br />
<!--<form action="index.php" method="post">
	<table>
	<tr >
	<td>
    <?php $u = $_POST['u'];
	if ($u == "2"){
		//echo'<input name="u" value="1" type="hidden" />';
	}else{
		//echo'<input name="u" value="2" type="hidden" />';
	}?>
	</td>
    </tr>
    <tr>
	<td width="100%"> <?php $u = $_POST['u'];
	if ($u == "2"){
		//echo'<input type="submit" value="switch to single imgage upload" style="float:right;" />';
	}else{
		//echo'<input type="submit" value="switch to bulk image upload" style="float:right;" />';
	}?></td>
	</tr>
	</table></form>-->
    </div>
    
    <div style="float:left; margin-top:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px; text-transform:capitalize;">
        <?php //include('nav.form.php'); ?>
        </div>
        <div style="float:left; margin-top:5px; margin-bottom:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px; text-transform:capitalize;">
        <?php //include('insert.page.form.php'); ?>
        </div>
        
<div id="footer">&copy;<?php echo date('Y'); ?> <?php echo $CFG->sitename?></div>
</div>

</body>
</html>