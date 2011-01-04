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
<div style="float:right;"> Welcome: <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['last']; ?> | <?php echo $role; ?> | <a href="logout.php" title="Logout: <?php echo $_SESSION['name']; ?>  <?php echo $_SESSION['last']; ?>">Logout</a> || <a href="http://www.e12e.net/faq.php?v=1&token = <?php echo $token; ?>" target="_blank">Help</a><br />
</div>
<div style="padding-left:175px; padding-top:-5px; font-size:36px; line-height:35px; border:none; text-decoration:none; font-weight:bold; color:#fff; font-family:Arial, Helvetica, sans-serif;text-shadow:-1px 1px 1px  #000;"><?php echo $CFG->sitename?> admin page</div>
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
<div style="width:960px; height:460px;">
  <form action="designer.php" method="post">
    <table>
      <tr >
        <td style="background-color:#ccc; padding:4px;"><select name="p" style="float:left; width:520px;">
            <option value="2">style.css</option>
            <option value="3">index.php</option>
            <option value="4">create custom js</option>
          </select></td>
        <td style="background-color:#ccc; padding:4px;"><input type="submit" value="Go" style="height:35px;width:55px;"/></td>
      </tr>
    </table>
  </form>
  <div style="float:right; height:auto; width:350px; padding:10p;"> Tools
    <hr/>
    <div> <a href="http://www.sumopaint.com/app/" target="_blank" title="use this to create graphics"><img src="images/sumo.png" style="border:none; float:left; padding-right:5px;"; height="50"/></a>
      <div style="width:280px; padding-top:12.5px; float:left;"><a href="http://www.sumopaint.com/app/" target="_blank" title="use this to create graphics">Sumo Paint</a> </div><div style="width:350px; padding-top:12.5px; float:left;"></div>
      <div> <a href="http://www.net2ftp.com/" target="_blank" title="use this to ftp files over"><img src="images/ftp.png" style="border:none; float:left; padding-right:5px;"; height="50"/></a>
        <div style="width:200px; padding-top:12.5px; float:left;"><a href="http://www.net2ftp.com/" target="_blank" title="use this to ftp files over">net2ftp</a> </div>
      </div>
      
    </div></div>
    <div style="float:right; clear:right;  height:auto; width:350px; padding:10p;"><br /> Graphic Image Upload <span style="float:right;"><a href="userfiles/images/readdir.php" target="_blank">view images</a></span>
    <hr/>
    <?php include("userfiles/images/upload.form.php"); ?></div>
    <div style="float:right; clear:right;  height:auto; width:350px; padding:10p;"><br /> See .js files you have created
    <hr/>
    <?php include('userfiles/js/readdir.php'); ?></div>
    <?php
	$p = $_REQUEST['p'];
	$style = file_get_contents('../css/style.css');
	$page = file_get_contents('../index.php');
	if ($p == "2"){
	  echo '<form action="update_master_css.php" method="post">
	  <textarea name="css" rows="23" cols="70">'.$style.'</textarea><br/>
	  <input type="submit" value="update"> 
	  </form>';
	}elseif ($p == "3"){
	  echo '<form action="update_master_index.php" method="post">
	  <textarea name="index" rows="23" cols="70">'.$page.'</textarea><br/>
	  <input type="submit" value="update"> 
	  </form>';
	}elseif ($p == "4"){
	  echo '<form action="userfiles/savetxt.php" method="post" enctype="multipart/form-data">
  <textarea name="editor1_content" rows="23" cols="70">// JavaScript Document</textarea><br/>
  Filename<input name="filename" type="text" value="please enter a file name" /> <input type="submit" value="Create file" name="update" id="button"/>
  </form> ';
	  }elseif ($p == "5"){
	$edit = $_GET['edit'];
	$jsedit = file_get_contents("userfiles/js/".$edit);
	$jsname = basename($edit,".js");
	  echo '<form action="userfiles/savetxt.php" method="post" enctype="multipart/form-data">
  <textarea name="editor1_content" rows="23" cols="70">'.$jsedit.'</textarea><br/>
  <input name="filename" type="hidden" value="'.$jsname.'" /> <input type="submit" value="Update js file" name="update" id="button"/>
  </form> ';
	  }else{
	echo'You can use this page to edit the main <a href="http://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">css</a> page for your site or to change your index page. Select the page you wnat to edit from the dropdown make your changes then click "update" to update the file.';	
	}
	?>
  </div>
  <div id="footer">&copy;<?php echo date('Y'); ?> <?php echo $CFG->sitename?></div>
</div>
</body>
</html>