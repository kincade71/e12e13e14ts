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
$token = md5("e12e13e14ts");
$result = mysql_query('SELECT * FROM  settings');
while($row = mysql_fetch_array($result))
  {
 $calendar = $row['calendar'];
  $faq = $row['faq'];
  $ecom = $row['ecom'];  }
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
<script type="text/javascript"> 
function popup1(url){
	window.open(url,'name','height=10,width=650,toolbar=none,menubar=none,location=none,scrollbars=no,resizable=no')}
</script>
<script type="text/javascript"> 
function popup2(url){
	window.open(url,'name','height=700,width=960,toolbar=none,menubar=none,location=none,scrollbars=no,resizable=no')}
</script>
<script type="text/javascript"> 
function popup3(url){
	window.open(url,'name','height=275,width=450,toolbar=none,menubar=none,location=none,scrollbars=no,resizable=no')}
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script src="script/acc.js" type="text/javascript"></script>
<!-- Load jQuery build -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "simple",
	
	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

	// Theme options
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,

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
</head>

<body>
<div id="sitename">Sitename: <?php echo $CFG->sitename?> admin page <span>Welcome: <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['last']; ?> | <?php echo $role; ?> | <a href="logout.php" title="Logout: <?php echo $_SESSION['name']; ?>  <?php echo $_SESSION['last']; ?>">Logout</a> || <a href="https://github.com/kincade71/e12e13e14ts/wiki" target="_blank">Help</a></span></div>
<div id="container">
  <div class="nav">
    <?php if($role == "designer"){
			echo'<ul><li><a href="designer.php">designer</a></li></ul>';
		}else{
echo'
<ul>
<li><a href="index.php">create/add</a></li>
<li><a href="modify.php?p=1">modify/delete</a></li>';
 if($role == "contributor"){
			//do nothing
		}else{
echo'<li><a href="designer.php">designer</a></li><li><a href="themebuilder.php">themebuilder</a></li>
';
		}
if($calendar == "yes"){
echo'
<li><a href="calendar.php">calendar</a></li>';
}
if($ecom == "yes"){
echo'<li><a href="ecom.php">ecom</a></li>';
}
echo'
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
		 echo'</div></div>
  </div>
  <div class="accordionButton" >add link</div>
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
</ul>';
		}
		?>
  </div>
  <div style="float:right;">
    <div style="float:right; height:auto; width:350px; padding:10p;"> </div>
  </div>
  <div style="width:456px; min-height:500px; float:left;"><br />
  <form action="#" method="post">
      <table>
        <tr >
          <td style=" padding:4px;"><select name="p" style="float:left; width:380px;">
            </select></td>
          <td style=" padding:4px;"><input type="submit" disabled="disabled" value="Go" style="height:35px;width:55px;"/></td>
        </tr>
      </table>
    </form>
    <form action="calendar/postevent.php" method="post">
      <table class="add" style="clear:both" border="0">
        <tr>
          <td height="10" colspan="2"></td>
        </tr>
        <tr>
          <td><label for="eName">Event Title:</label></td>
          <td><input type="text" name="eName" id="eName" size="50" maxlength="50"/></td>
        </tr>
        <tr>
          <td><label for="time">Time of Event:</label></td>
          <td><select name="time" id="Select1" style="width:300px">
              <option value="8:00 AM">8:00 AM</option>
              <option value="8:30 AM">8:30 AM</option>
              <option value="9:00 AM">9:00 AM</option>
              <option value="9:30 AM">9:30 AM</option>
              <option value="10:30 AM">10:30 AM</option>
              <option value="11:00 AM">11:00 AM</option>
              <option value="11:30 AM">11:30 AM</option>
              <option value="12:00 PM">12:00 PM</option>
              <option value="12:30 PM">12:30 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="1:30 PM">1:30 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="2:30 PM">2:30 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="3:30 PM">3:30 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="4:30 PM">4:30 PM</option>
              <option value="5:00 PM">5:00 PM</option>
              <option value="5:30 PM">5:30 PM</option>
              <option value="6:00 PM">6:00 PM</option>
              <option value="6:30 PM">6:30 PM</option>
              <option value="7:00 PM">7:00 PM</option>
              <option value="7:30 PM">7:30 PM</option>
              <option value="8:00 PM">8:00 PM</option>
              <option value="8:30 PM">8:30 PM</option>
              <option value="9:00 PM">9:00 PM</option>
              <option value="9:30 PM">9:30 PM</option>
              <option value="10:00 PM">10:00 PM</option>
              <option value="10:30 PM">10:30 PM</option>
            </select></td>
        </tr>
        <tr>
          <td><label for="reqName">Details:</label></td>
          <td><textarea name="reqName" id="reqName"></textarea></td>
        </tr>
      <!--  <tr>
          <td><label for="onCampus">On Campus</label></td>
          <td><input type="radio" name="location" id="location" value="onCampus" checked="checked" onclick="document.getElementById('show').style.display='block';document.getElementById('collapsed').style.display='none';" /></td>
        </tr>-->
        <tr id="show">
          <td><label for="room">Where:</label></td>
          <td><input type="text" name="room" id="room" size="50" /></td>
        </tr>
        <!--    <tr>
              <td><label for="offCampus">Off Campus</label></td>
              <td><input type="radio" name="location" id="location" value="offCampus" onclick="document.getElementById('collapsed').style.display='block';document.getElementById('show').style.display='none';" /></td>
            </tr>
            <tr id="collapsed">
          <td bgcolor="#FF0000" colspan="2">
              <td colspan="2" bgcolor="#33FF33"><input type="text" name="street" id="street"  maxlength="45" value="Street Address" onfocus="if(document.getElementById('street').value == 'Street Address'){document.getElementById('street').value=''};" />
                <br />
                <br />
                <input type="text" name="city" id="city"  maxlength="25" value="City" onfocus="if(document.getElementById('city').value == 'City'){document.getElementById('city').value=''};" />
                &#160&#160
                <input type="text" name="state" id="state"  maxlength="2" value="State" onfocus="if(document.getElementById('state').value == 'State'){document.getElementById('state').value=''};" />
                &#160&#160
                <input type="text" name="zip" id="zip" maxlength="5" value="ZIP" onfocus="if(document.getElementById('zip').value == 'ZIP'){document.getElementById('zip').value=''};" /></td>-->
        <tr>
          <td><label for="viewday">Day</label></td>
          <td><input type="text" id="viewday" name="viewday" size="50" value="<?= date('j') ?>" /></td>
        </tr>
        <tr>
          <td><label for="viewmonth">Month</label></td>
          <td><input type="text" id="viewmonth" name="viewmonth" size="50" value="<?= date('n') ?>" /></td>
        </tr>
        <tr>
          <td><label for="year">Year</label></td>
          <td><input type="text" id="viewyear" name="viewyear" size="50" value="<?= date('Y') ?>" /></td>
        </tr>
        
          <td>
        <tr>
          <td colspan="2"><input type="submit" value="Submit" size="50" style="float:right;"/></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</div>
<div id="footer">&copy;<?php echo date('Y'); ?><?php echo $CFG->sitename?><a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0; float:left;" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a><a href="#" onclick="popup3('about.php')" style="border:none;"><img src="images/e12bannersmall.png" style="float:right;" /></a></div>
</body>
</html>