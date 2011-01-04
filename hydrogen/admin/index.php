<?php
session_start();
include("../config.php");

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $CFG->sitename."&nbsp; admin"; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link type="text/css" rel="stylesheet" href="css/style.css" />
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
Welcome: <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['last']; ?> | <?php echo $role; ?> | <a href="logout.php" title="Logout: <?php echo $_SESSION['name']; ?>  <?php echo $_SESSION['last']; ?>">Logout</a> || <a href="http://www.e12e.net/faq.php?v=1&token = <?php echo $token;?>" target="_blank">Help</a><br />
</div>
<div style="padding-left:175px; padding-top:-5px; font-size:36px; line-height:35px; border:none; text-decoration:none; font-weight:bold; color:#fff; font-family:Arial, Helvetica, sans-serif;text-shadow:-1px 1px 1px  #000;"><?php echo $CFG->sitename?> 
admin page</div>
<div class="nav">    
       <ul>
        <li><a href="index.php">create/add</a></li>
        <?php if($role == "contributor"){
			//do nothing
		}else{
			echo'<li><a href="modify.php?p=1">modify/delete</a></li>';
		}?>
        <li><a href="designer.php">designer</a></li>
      </ul>
 </div>
 <div style="float:right; width:600px; height:700px;">     
      <form action="index.php" method="post">
	<table>
	<tr >
	<td style="background-color:#ccc; padding:4px;">
	<select name="p" style="float:left; width:520px;">
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
	<td style="background-color:#ccc; padding:4px;"><input type="submit" value="Go" style="height:35px;width:55px;"/></td>
	</tr>
	</table></form>
<?php 
	$p = $_POST['p'];
	if ($p == "2"){
	  echo '<span class="subheader">Create Article</span>
  <form id="form1" name="form1" method="post" action="script/insertweb.php" onSubmit="editor1.prepareSubmit();">
    <table>
      <tr> </tr>
      <tr>
        <td colspan="2" style="background-color:#ccc; padding:4px;"><input name="title" type="text" size="87%" value="title of article"/></td>
      </tr>
      <tr>
        <td colspan="2" style="padding:4px;"><script type="text/javascript">
      var editor1 = new WYSIWYG_Editor(\'editor1\',\'article content here\');
      editor1.display();
     </script>
          <noscript>
          <p style="notSupported"> Your browser does not support Javascript with your current setings. I am unable to display the editor to you. Check your settings
            and enable Javascript, or use one of the supported web browsers (listed in the right column) to view this page for a demonstration. </p>
          </noscript></td>
      </tr>
      <tr>
        <td style="background-color:#ccc; padding:4px;"><select name="category" style="float:left; width:500px;">
            ';include('page.categories.php');echo'
          </select></td>
      </tr>
      <tr>
        <td ><iframe src="repository.php" height="100" width="555" allowtransparency="true" scrolling="no" frameborder="0"></iframe></td>
      </tr>
      <tr>
        <td colspan="2"><input id="submit" type="Submit" name="submit" value="add article" style="float:right;" /></td>
      </tr>
    </table>
  </form>';
	}elseif ($p == "4"){
	  echo '<span class="subheader">Create FAQ</span>
  <form id="form1" name="form1" method="post" action="script/insertfaq.php" onSubmit="editor2.prepareSubmit();">
    <table>
      <tr> </tr>
      <tr>
        <td colspan="2" style="background-color:#ccc; padding:4px;"><input name="quest" type="text" size="87%" value="Enter the question"/></td>
      </tr>
      <tr>
        <td colspan="2" style="padding:4px;"><script type="text/javascript">
      var editor2 = new WYSIWYG_Editor("editor2","answer to question here");
      editor2.display();
     </script>
          <noscript>
          <p style="notSupported"> Your browser does not support Javascript with your current setings. I am unable to display the editor to you. Check your settings
            and enable Javascript, or use one of the supported web browsers (listed in the right column) to view this page for a demonstration. </p>
          </noscript></td>
      </tr>
      <tr>
        <td style="background-color:#ccc; padding:4px;"><select name="category" style="float:left; width:400px;">';include('faq.categories.php');echo'</select>
        <input type="hidden" value="'.date("m.d.Y").'" name="date" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:popup1(\'createNew.php\')">create new category</a></td>
      </tr>
      <tr>
      <td ><iframe src="repository.php" height="100" width="555" allowtransparency="true" scrolling="no" frameborder="0"></iframe></td>
      </tr>
      <tr>
        <td colspan="2"><input id="submit" type="Submit" name="submit" value="Create FAQ" style="float:right;" /></td>
      </tr>
    </table>
  </form>';
		}elseif ($p == "6"){
	  echo '
	  <span class="subheader">Create User</span>
	  <form id="form1" name="form1" method="post" method="post" action="script/insertuser.php">
<table>
<tr>
<td colspan="2" style="background-color:#ccc; padding:4px;">
<input name="firstname1" type="text" value="First Name" size="87%"/></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" ><input name="lastname1" type="text" value="Last Name" size="87%" /></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" style="background-color:#ccc; padding:4px;"><input name="username1" type="text" value="Username" size="87%"/></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" ><input name="password1" type="text" value="Password" size="87%" /></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" style="background-color:#ccc; padding:4px;"><select name="role1" style="width:550px;">
<option value="admin">Please choose a role for this user.</option>
<option value="admin">Admin User</option>
<option value="contributor">Contributor</option>
</select></td>
</tr>
<tr>
<td colspan="2"><input name="submit" value="Add User" type="submit" style="float:right;" /></td>
</tr>
</table>
</form>';}else{
  echo'<span class="subheader">How to Create Article/FAQ</span><br/>
  <strong>A Article is:</strong> A item that includes pictures, text and links that you want to display on a page.<br/> To create a article simply click "go" on the form above and fill out the form to insert a article.<br/><br/>
  <strong>A FAQ is:</strong> A question or subject that seems to be a coomon or teir one issue that the user can reasonably solve themselves with a little investigation add someone pointing them in the right direction.<br/> <br/>To create a faq simply click the drop-down list above and select "create faq" from the list of options then click "go" on the form above and fill out the form to insert a faq. <br /><br /><span class="subheader">User Roles</span><br/><strong>Admin User:</strong> Is a full access account that has full control of the sites Admin panel and full control to all of it&rsquo;s functions: Admin Users can: Create,Edit/Modify, and Delete<br /><br />
<strong>Contributor</strong> Is a limited access account. Contributor User can only create/add. However a Contributor User cannot add a new page, create a new user, or modify/delete anything. ';
  }
	?>
  </div>
  
  <div style="float:left; width:320px; margin-top:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;">  
    <?php 
		include('upload.form.php');
	?>
    </div>
    
    <div style="float:left; margin-top:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px; text-transform:capitalize;">
        <?php include('nav.form.php'); ?>
        </div>
        <div style="float:left; margin-top:5px; margin-bottom:5px; background-color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px; text-transform:capitalize;">
        <?php include('insert.page.form.php'); ?>
        </div>
        
<div id="footer">&copy;<?php echo date('Y'); ?> <?php echo $CFG->sitename?></div>
</div>

</body>
</html>