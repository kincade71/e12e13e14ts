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
$result = mysql_query('SELECT * FROM  settings');
while($row = mysql_fetch_array($result))
  {
 $calendar = $row['calendar'];
  $faq = $row['faq'];
  $ecom = $row['ecom'];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $CFG->sitename."&nbsp; admin"; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link type="text/css" rel="stylesheet" href="css/style.css" />
<!-- End Stylesheets -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script src="script/acc.js" type="text/javascript"></script>
<script src="script/ajax.js" type="text/javascript"></script>
<script src="js/codemirror.js" type="text/javascript"></script>
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
<li><a href="index.php">create/add</a></li>
<li><a href="modify.php?p=1">modify/delete</a></li>';}?>
<?php if($role == "contributor"){
			//do nothing
		}else{
echo'<li><a href="designer.php">designer</a></li>
<li><a href="themebuilder.php">themebuilder</a></li>
';
		}
if($calendar == "yes"){
echo'<li><a href="calendar.php">calendar</a></li>';
}
if($ecom == "yes"){
echo'<li><a href="ecom.php">ecom</a></li>';
}
?>
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
              <td>E-Com</td>
              <td><table width="200">
                  <tr>
                    <td><label>
                        <input type="radio" name="ecom" value="yes" id="faq_0" />
                        Yes</label></td>
                  </tr>
                  <tr>
                    <td><label>
                        <input type="radio" name="ecom" value="no" id="faq_1" />
                        No</label></td>
                  </tr>
                </table>
            <tr>
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
  <div class="accordionButton" >add link</div>
  <div class="accordionContent">
    <div>';
      include("misc/nav.form.php");
    echo'</div>
  </div>
   <div class="accordionButton" >add category</div>
  <div class="accordionContent">
    <div>';
      include("misc/insert.category.form.php");
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
  <div style="float:right; height:auto; width:350px; padding:10p;"> Tools
    <hr/>
    <div> <a href="http://www.sumopaint.com/app/" target="_blank" title="use this to create graphics"><img src="images/sumo.png" style="border:none; float:left; padding-right:5px;"; height="50"/></a>
      <div style="width:280px; padding-top:12.5px; float:left;"><a href="http://www.sumopaint.com/app/" target="_blank" title="use this to create graphics">Sumo Paint</a> </div>
      <div style="width:350px; padding-top:12.5px; float:left;"></div>
      <div> <a href="http://www.net2ftp.com/" target="_blank" title="use this to ftp files over"><img src="images/ftp.png" style="border:none; float:left; padding-right:5px;"; height="50"/></a>
        <div style="width:200px; padding-top:12.5px; float:left;"><a href="http://www.net2ftp.com/" target="_blank" title="use this to ftp files over">net2ftp</a> </div>
      </div>
    </div>
  </div>
  <div style="float:right; clear:right;  height:auto; width:350px; padding:10p;"><br />
    Graphic Image Upload <span style="float:right;"><a href="#" onclick="popup1('userfiles/images/readdir.php')">view images</a></span>
    <hr/>
    <?php include("userfiles/images/upload.form.php"); ?>
  </div>
  <div style="float:right; clear:right;  height:auto; width:350px; padding:10p;"><br />
    See .js files you have created
    <hr/>
    <?php include('userfiles/js/readdir.php'); ?>
  </div>
</div>
<div style="width:456px; min-height:500px; float:left;">
  <form action="designer.php" method="POST">
    <table>
      <tr >
        <td style=" padding:4px;"><select name="p" style="float:left; width:380px;">
            <!--<option value="2">style.css</option>-->
            <option value="3">index.php</option>
                  <?php  $result = mysql_query('SELECT * FROM `categories` WHERE `use` = \'userpage\'');
while($row = mysql_fetch_array($result))
  {
	  $fileName = $row['category'];
  echo'<option value="'.$row['category'].'">'.$row['category'].'.php</option>';
  }
  ?>
            <option value="4">create custom js</option>
          </select></td>
        <td style=" padding:4px;"><input type="submit" value="Go" style="height:35px;width:55px;"/></td>
      </tr>
    </table>
  </form>
  <?php
	$p = $_REQUEST['p'];
	if($fileName){
	$style = file_get_contents('../'.$fileName.'.php');
	}
	$page = file_get_contents('../index.php');
	if ($p ==  $fileName){
	  echo '<form action="update/update_user_file.php" method="post">
	  <textarea name="css" id="code" rows="23" cols="60">'.$style.'</textarea><br/>
	  <input type="hidden" value="'.$fileName.'" name="fileName"/>
	  <input type="submit" value="update"> <input type="button" value="cancel" onclick="window.location=\'designer.php\'"/>
	  </form>';
	}elseif ($p == "3"){
	  echo '<form action="update/update_master_index.php" method="post">
	  <textarea name="index" id="code" rows="23" cols="60">'.$page.'</textarea><br/>
	  <input type="submit" value="update"> 	  <input type="button" value="cancel" onclick="window.location=\'designer.php\'"/> 
	  </form>';
	}elseif ($p == "4"){
	  echo '<form action="userfiles/savetxt.php" method="post" enctype="multipart/form-data">
  <textarea name="editor1_content" id="code" rows="23" cols="60">// JavaScript Document</textarea><br/>
  Filename<input name="filename" type="text" value="please enter a file name" /> <input type="submit" value="Create file" name="update" id="button"/><input type="button" value="cancel" onclick="window.location=\'designer.php\'">
  </form> ';
	  }elseif ($p == "5"){
	$edit = $_GET['edit'];
	$jsedit = file_get_contents("userfiles/js/".$edit);
	$jsname = basename($edit,".js");
	  echo '<form action="userfiles/savetxt.php" method="post" enctype="multipart/form-data">
  <textarea name="editor1_content" id="code" rows="23" cols="60">'.$jsedit.'</textarea><br/>
  <input name="filename" type="hidden" value="'.$jsname.'" /> <input type="submit" value="Update js file" name="update" id="button"/> <input type="reset" value="cancel" onclick="window.location=\'designer.php\'"/>
  </form> ';
	  }else{
	echo'You can use this page to edit the index page for your site. Select the page you want to edit from the dropdown make your changes then click "update" to update the file.';	
	}
	?>
</div>
<div id="footer">&copy;<?php echo date('Y'); ?><?php echo $CFG->sitename?><a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0; float:left;" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a><a href="#" onclick="popup3('about.php')" style="border:none;"><img src="images/e12bannersmall.png" style="float:right;" /></a></div>
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