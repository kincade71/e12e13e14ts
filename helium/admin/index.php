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
if($role == "designer"){
			header ("Location:designer.php");
		}else{
		}
$p = $_GET['p'];
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
<title><?php echo $CFG->sitename ."&nbsp; admin"; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link type="text/css" rel="stylesheet" href="css/style.css" />
<!-- End Stylesheets -->

<!-- Load jQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script src="script/acc.js" type="text/javascript"></script>
<!-- Load jQuery build -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	
	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

	// Theme options
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,",
	theme_advanced_buttons4 : "cite,abbr,acronym,del,ins,|,nonbreaking,|,insertdate,inserttime,preview,|,forecolor,backcolor,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : false,

	// Example content CSS (should be your site CSS)
	content_css : "css/example.css",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "js/template_list.js",
	external_link_list_url : "js/link_list.js",
	external_image_list_url : "tiny_mce/js/image_list.php",
	media_external_list_url : "js/media_list.js",


	relative_urls:false,
	remove_script_host:false,
	
	// Replace values for the template plugin
	template_replace_values : {
		username : "Some User",
		staffid : "991234"
	}
});
</script>
<script type="text/javascript"> 
function popup1(url){
	window.open(url,'name','height=auto,width=750,toolbar=none,menubar=none,location=none,scrollbars=no,resizable=no')}
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
<li><a href="index.php">create/add</a></li>
<li><a href="modify.php?p=1">modify/delete</a></li>
<?php if($role == "contributor"){
			//do nothing
		}else{
echo'<li><a href="designer.php">designer</a></li><li><a href="themebuilder.php">themebuilder</a></li>
';
		}
if($calendar == "yes"){
echo'<li><a href="calendar.php">calendar</a></li>';
}
if($ecom == "yes"){
echo'<li><a href="ecom.php">ecom</a></li>';
}
?>
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
            <td><table width="200">
                <?php include('../theme/readdir.php') ?>
                </table></td>
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
      <div>
        <?php include("upload.form.php"); ?>
      </div>
    </div>
  </div>
  <div class="accordionButton" >add link</div>
  <div class="accordionContent">
    <div>
      <?php include("misc/nav.form.php"); ?>
    </div>
  </div>
  <div class="accordionButton" >add category</div>
  <div class="accordionContent">
    <div>
      <?php include("misc/insert.category.form.php"); ?>
    </div>
  </div>
  <div class="accordionButton" >add page</div>
  <div class="accordionContent">
  <div>
  <?php include("misc/insert.page.form.php"); ?>
</div>
</div>

</div>
</li>
</ul>
<div style="float:left; width:700px; min-height:500px;">
  <form action="index.php" method="post">
    <table>
      <tr >
        <td style=" padding:4px;"><select name="p" style="float:left; width:520px;">
            <option value="2">Create Article</option>
            <?php if($faq == "yes"){
	echo '<option value="4">Create FAQ</option>';
    };?>
            <?php if($role == "contributor"){
			//do nothing
		}else{
			echo'<option value="6">Create User</option>';
		}?>
          </select></td>
        <td style=" padding:4px;"><input type="submit" value="Go" style="height:35px;width:55px;"/></td>
      </tr>
    </table>
  </form>
  <?php 
	$p = $_POST['p'];
	if ($p == "2"){
	  echo '<span class="subheader">Create Article</span>
  <form id="form1" name="form1" method="post" action="script/insertweb.php">
    <table>
      <tr>
        <td colspan="2" style=" padding:4px;"><input name="title" type="text" size="87%" value="title of article"/></td>
      </tr>
      <tr>
        <td colspan="2" style="padding:4px;"><textarea name="editor1_content" style="width:50%">
	</textarea></td>
      </tr>
      <tr>
        <td style=" padding:4px;"><select name="category" style="float:left; width:500px;">
            ';include('categories/page.categories.php');echo'
          </select></td>
      </tr>
      <tr>
        <td ><iframe src="misc/repository.php" height="100" width="555" allowtransparency="true" scrolling="no" frameborder="0"></iframe></td>
      </tr>
      <tr>
        <td colspan="2"><input id="submit" type="Submit" name="submit" value="add article" style="float:right;" /></td>
      </tr>
    </table>
  </form>';
	}elseif ($p == "4"){
	  echo '<span class="subheader">Create FAQ</span>
  <form id="form1" name="form1" method="post" action="script/insertfaq.php">
    <table>
      <tr> </tr>
      <tr>
        <td colspan="2" style=" padding:4px;"><input name="quest" type="text" size="87%" value="Enter the question"/></td>
      </tr>
      <tr>
        <td colspan="2" style="padding:4px;"><textarea name="editor2_content" style="width:50%">
	</textarea></td>
      </tr>
      <tr>
        <td style=" padding:4px;"><select name="category" style="float:left; width:400px;">';include('categories/faq.categories.php');echo'</select>
        <input type="hidden" value="'.date("m.d.Y").'" name="date" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:popup1(\'misc/createNew.php\')">create new category</a></td>
      </tr>
      <tr>
      <td ><iframe src="misc/repository.php" height="100" width="555" allowtransparency="true" scrolling="no" frameborder="0"></iframe></td>
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
<td colspan="2" style=" padding:4px;">
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
<td colspan="2" ><input name="email1" type="text" value="Email" size="87%" /></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" style=" padding:4px;"><input name="username1" type="text" value="Username" size="87%"/></td>
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
<td colspan="2" style=" padding:4px;"><select name="role1" style="width:550px;">
<option value="admin">Please choose a role for this user.</option>
<option value="admin">Admin User</option>
<option value="contributor">Contributor</option>
<option value="designer">Designer</option>
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
<strong>Contributor</strong> Is a limited access account. Contributor User can only create/add. However a Contributor User cannot add a new page, create a new user, or modify/delete anything.<br /><br /><strong>Designer</strong> Is a limited access account. Designer User can only use the design panel. ';
  }
	?>
</div>
</div>
</div>
<div id="footer">&copy;<?php echo date('Y'); ?> <a href="javascript:void(0);" onclick="popup3('license/license.php')">License / GPL</a> <?php echo $CFG->sitename?><a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0; float:left;" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a><a href="#" onclick="popup3('about.php')" style="border:none;"><img src="images/e12bannersmall.png" style="float:right;" /></a></div>
</body>
</html>