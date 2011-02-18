<?php 
$desc = $_POST['desc'];
$keywords = $_POST['keywords'];
$myFile = '../index.php';

$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = '<?php
$config = "config.php";
if (file_exists($config)) {//checks for config file if one is not found then it starts the install process that creates a config file for you.
    include("config.php");
} else {
    header("Location:install/install.php");
}
//Gets the catigory that you want to view 
//if nothing is selected then it defaults to "home" as the category
$category = $_GET[\'category\'];
if(!isset($category)){
		$category = "home";
}else{
$category = $_GET[\'category\'];
}
//gets "id" used to view indiviual posts/items
$id = $_GET[\'id\'];
//gets enum which stands for e-com number for the store 
$enum = $_GET[\'enum\'];

//gets user settings from settings table in database mostly things set via on/off functions in the admin panel 
//i.e calendar, FAQ
$result = mysql_query(\'SELECT * FROM  settings\');
while($row = mysql_fetch_array($result))
  {
  $calendar = $row[\'calendar\'];
  $theme = $row[\'theme\'];
  }
  $result1 = mysql_query(\'SELECT `email` FROM users WHERE id = "1" LIMIT 0, 1\');
while($row1 = mysql_fetch_array($result1))
  {
	$email = $row1[\'email\'];
  }
  $preview = $_GET[\'preview\'];
  $published = $_GET[\'published\'];
if($preview == "true"){
	$theme = $_GET[\'theme\'];
}
if($calendar == "yes"){ 
//this initizes and builds the calendar
	 $self = $_SERVER[\'PHP_SELF\'];

	 if(isset($_GET[\'month\']))

	 {

	    $month = $_GET[\'month\'];

	 }

	 elseif(isset($_GET[\'viewmonth\']))

	 {

	    $month = $_GET[\'viewmonth\'];

	 }

	 else

	 {

	    $month = date(\'m\');	    

	 }

	 if(isset($_GET[\'year\']))

	 {

	    $year = $_GET[\'year\'];

	 }

	 elseif(isset($_GET[\'viewyear\']))

	 {

	    $year = $_GET[\'viewyear\'];

	 }

	 else

	 {

	    $year = date(\'Y\');

	 }

	 if($month == \'12\')

	 {

	    $next_year = $year + 1;

	 }

	 else

	 {

	    $next_year = $year;

	 }

	 $first_of_month = mktime(0, 0, 0, $month, 1, $year);


	 $day_headings = array(\'Sunday\', \'Monday\', \'Tuesday\', \'Wednesday\', \'Thursday\', \'Friday\', \'Saturday\');


	 $maxdays = date(\'t\', $first_of_month);

	 $date_info = getdate($first_of_month);

	 $month = $date_info[\'mon\'];

	 $year = $date_info[\'year\'];

	 if($month == \'1\')

	 {

	    $last_year = $year-1;

	 }

	 else

	 {

	    $last_year = $year;

	 }

	 $timestamp_last_month = $first_of_month - (24*60*60);

	 $last_month = date("m", $timestamp_last_month);

	 if($month == \'12\')

	 {

	    $next_month = \'1\';

	 }

	 else

	 {

	    $next_month = $month+1;

	 }

	 $calendar = " 

	    <table width=\'200px\'>

	       <tr>

        	  <td colspan=\'7\' class=\'navi\'>

	             <a  style=\'margin-right: 45px; color: #000;\'href=\'$self?month=".$last_month."&year=".$last_year."\'>«</a> 

            	     $date_info[month] $year

	             <a style=\'margin-left: 48px; color: #000;\' href=\'$self?month=".$next_month."&year=".$next_year."\'>»</a> 

	          </td> 

	       </tr> 

	       <tr>

	          <td class=\'datehead\'>SUN</td>

	          <td class=\'datehead\'>MON</td>

	          <td class=\'datehead\'>TUE</td>

	          <td class=\'datehead\'>WED</td>

	          <td class=\'datehead\'>THU</td>

	          <td class=\'datehead\'>FRI</td>

	          <td class=\'datehead\'>SAT</td>

	       </tr>

	       <tr>";

 	 $class = "";

	 $weekday = $date_info[\'wday\'];

	 $day = 1;

	 if($weekday > 0)

	 {

            $calendar .= "<td colspan=\'$weekday\'> </td>";

	 }

	 while($day <= $maxdays)

	 {

	    if($weekday == 7)

	    {

	       $calendar .= "</tr><tr>";

	       $weekday = 0;

	    }

	    $linkDate = mktime(0, 0, 0, $month, $day, $year);

	    if((($day < 10 and "0$day" == date(\'d\')) or ($day >= 10 and "$day" == date(\'d\'))) and (($month < 10 and "0$month" == date(\'m\')) or ($month >= 10 and "$month" == date(\'m\'))) and $year == date(\'Y\'))

	    {

	       $class = "caltoday";

	       $link = "linktoday";

	    }

	    else

	    {

	       $d = date(\'m/d/Y\', $linkDate);

	       $class = "cal";

	       $link = "link";

	    }
		    
	  $calendar .= "<td class=\"$class\">";
		   $calendar.="<a class=\'$link\' href=\'$self?viewyear={$year}&viewmonth={$month}&viewday={$day}\'>{$day}</a>";
		   $result = mysql_query("SELECT DISTINCT month, day, year FROM calendar");
while($row = mysql_fetch_array($result)){
	if($month == $row[\'month\'] && $day == $row[\'day\'] && $year == $row[\'year\']){
		   $calendar.="<span class=\'$link\'>&nbsp;</span>";
	}
}
	  $calendar .= "</td>";
	    $day++;

            $weekday++;
	 }

	 if($weekday != 7)

	 {

	    $calendar .= "<td colspan=\'" . (7 - $weekday) . "\'> </td>";

	 }

	 $calendar .= "</tr></table>";

	 $months = array(\'January\', \'February\', \'March\', \'April\', \'May\', \'June\', \'July\', \'August\', \'September\', \'October\', \'November\', \'December\');
}
//calendar ends here
	$num = $_GET[\'num\'];
	$cat = $_GET[\'cat\'];
	$i = 0;
      ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if(strstr($_SERVER[\'HTTP_USER_AGENT\'],\'iPhone\') || strstr($_SERVER[\'HTTP_USER_AGENT\'],\'iPod\'))
{
	echo\'<!--start mobile-->
	<title>\'.$CFG->sitename.\' Mobile</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="description" content="'.$desc.'">
<meta name="keywords" content="'.$keywords.'">
<link rel="apple-touch-icon" href="images/e12logo_white.png">
<!-- For iPhone: -->
<link type="text/css" rel="stylesheet" href="theme/\'.$theme.\'/style.css" /><!--end mobile-->\';
}else{
	echo\'<title>\'.$CFG->sitename.\'</title>
	<meta name="description" content="'.$desc.'">
<meta name="keywords" content="'.$keywords.'">
	<link type="text/css" rel="stylesheet" href="css/reset.css" />
	<link type="text/css" rel="stylesheet" href="theme/\'.$theme.\'/style.css" />\';
}
if($theme == "default"){
			echo\'<link type="text/css" rel="stylesheet" href="css/style.css" />
			 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">\';
	}else{
		if($preview == "true" && $published = "true"){
			echo\'<link type="text/css" rel="stylesheet" href="theme/\'.$theme.\'/style.css" />
			 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">\';
		}else{
		//do nothing
		}
		if($preview == "true"){
	echo\'<link type="text/css" rel="stylesheet" href="admin/themedevarea/\'.$theme.\'/style.css" />
			 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">\';
		}
else{
		echo\'<link type="text/css" rel="stylesheet" href="theme/\'.$theme.\'/style.css" />
			 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">\';
}
}
if($category == "faq"){
echo\'<script src="scripts/prototype.js" type="text/javascript"></script>
<script src="scripts/scriptaculous.js" type="text/javascript"></script>
\';
}
if($category == "ecom"){
	include(\'scripts/ecom.php\');
}
?>
</head>
<body>
<div id="wrapper">
  <div id="wrapper2">
    <div id="header">
      <div id="logo">
        <?php           
						echo\'<h1><a href="\'.$CFG->wwwroot.\'">\'.$CFG->sitename.\'</a></h1>\';

?>
      </div>
      <div id="menu">
        <?php
echo\'<ul>\';
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="main" ORDER BY id\');
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  echo\'</ul>\';
  ?>
      </div>
    </div>
    <!-- end #header -->
    <div id="page">
      <div id="content">
        <div class="post">
          <?php 
		  //This is where you view a single post and if eailer posts are available or a newer post is available then a link is displayed to access each
if(isset($id) == "true"){
	  $result = mysql_query(\'SELECT * FROM content WHERE id ="\'.$id.\'"\');
while($row = mysql_fetch_array($result))
  {
  echo"<h2 class=\"title\">".$row[\'header\']."</h2><div class=\"entry\">".$row[\'article\']."</div>";
  $result = mysql_query(\'SELECT id FROM content WHERE id IS NOT NULL\');
while($row = mysql_fetch_array($result)){

$post[] = $row[\'id\'];
if($row[\'id\'] == $id){
$temp = $i;
}
$i++;
}
if($temp>0){
echo\'<a href="?id=\'.$post[$temp-1].\'">Older</a>\';
}
if($temp < sizeof($post)-1){
echo\'<a href="?id=\'.$post[$temp+1].\'" style="float:right;">Newer</a>\';
  }
}
}elseif($category == "ecom"){
	//This begins the e-commerence area of the site. The next echo prints the "view cart button"
	//The $email variable is set during setup and is set to the site owner\'s paypal info
	echo\'<div style="float:right;"><form action="https://www.paypal.com/cgi-bin/webscr" target="paypal ">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="\'.$email.\'">
<input type="image"  name="submit" src="\'.$CFG->wwwroot.\'images/btn_viewcart_SM.png" border="0">
<input type="hidden" name="display" value="1">
</form></div>\';
//this creates the filter choices on the home of the ecom page
	echo\'<form id="filter"><fieldset>
    <legend><h2>Filter by type</h2></legend><br />
	<label><input type="radio" name="type" value="all" checked="checked">&nbsp;Everything</label>&nbsp;\';
	
          $result = mysql_query(\'SELECT DISTINCT filter FROM ecom\');
while($row = mysql_fetch_array($result))
  {
  echo\'    <label><input type="radio" name="type" value="\'.$row[\'filter\'].\'">&nbsp;\'.$row[\'filter\'].\'</label>&nbsp;\';
  }
  echo\'  </fieldset>
</form>\';
//this displays ecom items
echo\'<ul id="applications" class="image-grid">\';
          $result = mysql_query(\'SELECT * FROM ecom\');
while($row = mysql_fetch_array($result))
  {
  echo\'<li data-id="id-\'.$row[\'id\'].\'" data-type="\'.$row[\'dt\'].\'">
    <a href="?enum=\'.$row[\'id\'].\'">\'.$row[\'image\'].\'</a>
    <strong>\'.$row[\'title\'].\'</strong>
    <span>\'.$row[\'other\'].\'</span>
  </li>\';
  }
echo\'</ul>\';

}elseif(isset($enum)){
	//if you sselect a ecom item then this creates the page promoting that single item a item details page if you will below adds the 
	//"view shopping cart" to the product details page
	echo\'<div style="float:right;"><form action="https://www.paypal.com/cgi-bin/webscr" target="paypal ">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="\'.$email.\'">
<input type="image"  name="submit" src=""\'.$CFG->wwwroot.\'images/btn_viewcart_SM.png" border="0">
<input type="hidden" name="display" value="1">
</form></div>\';

//prints the item and details
//prints "you may also like" which is other items that share that items filter setting
	         $result = mysql_query(\'SELECT * FROM ecom WHERE id = \'.$enum.\'\');
while($row = mysql_fetch_array($result))
  {
	  $filter = $row[\'filter\'];
  echo"<h2 class=\"title\">".$row[\'title\']."</h2><div class=\"entry_ecom\">".$row[\'image\']."".$row[\'desc\']."<br /><span id=\'price\'>".$row[\'price\']."</span><br />
<span>".$row[\'other\']."<span>
<h4 style=\"margin-top:75px;\">You May Also Like</h4>
<ul class=\"image-grid\">";
$result1 = mysql_query(\'SELECT * FROM ecom WHERE filter = "\'.$filter.\'"\');
while($row1 = mysql_fetch_array($result1))
  {
	  echo\'<li data-id="id-\'.$row1[\'id\'].\'" data-type="\'.$row1[\'dt\'].\'">
    <a href="?enum=\'.$row1[\'id\'].\'">\'.$row1[\'image\'].\'</a>
    <strong>\'.$row1[\'title\'].\'</strong>
    <span id="button">\'.$row1[\'other\'].\'</span>
  </li>\'; 
  }
echo"</ul></div>";
  }
}elseif($category == "faq"){
//displays form text field to conduct faq searches from	       
  echo\'
	  <form>
        <input id="searchText" name="find" size="55" style=" border:#000 2px solid; height:22px; font-size:18px;"  title="Type a word or phrase" >
        </form>\';
		//the script that actually does the work and displays the results
       echo"<script type=\"text/javascript\">
   new Form.Element.Observer(\'searchText\', 1, 
      function(element, value) {new Ajax.Updater(
        \'search_results\', 
        \'scripts/livesearch.php\',
         {asynchronous:true, evalScripts:true, 
           onComplete:function(request)
            {Element.hide(\'search_spinner\')}, 
           onLoading:function(request)
            {Element.show(\'search_spinner\')},
           method:\'post\', parameters:\'find=\' + value
})})
</script>";
     echo\'
        <div id="search_results">\';
if(isset($num)){
$result = mysql_query("SELECT * FROM faq WHERE id = \'$num\'");

while($row = mysql_fetch_array($result))
  {
if ($num==$row[\'id\'])
{
echo"<h2>".$row[\'question\']."</h2>Date added: ".$row[\'date\']." Category: <a href=\"?category=faq&cat=".$row[\'category\']."\" title=\"see all items in ".$row[\'category\']." topic\">".$row[\'category\']."</a><br/><br/><div id=\"faq\">".$row[\'answer\']."</div>";
}
  }
}elseif(isset($cat)){
	//sort optin results
	  echo\'sorted by \'.$cat.\'<br/><br/>\';
$result = mysql_query("SELECT * FROM faq WHERE category = \'$cat\'");

while($row = mysql_fetch_array($result))
  {
  echo"<a href=\"?category=faq&num=".$row[\'id\']."\" style=\" text-decoration:none;\">".$row[\'date\']."<h2>".$row[\'question\']."</h2></a>";
  }
}else{
	//Default shows top five entries
$result = mysql_query(\'SELECT * FROM faq LIMIT 0, 5\');
while($row = mysql_fetch_array($result))
  {
  echo"<a href=\"?category=faq&num=".$row[\'id\']."\" style=\" text-decoration:none;\">".$row[\'date\']."<h2>".$row[\'question\']."</h2></a>";
  }
  }
  echo\'</div>\';
}
//below displays calendar details when you click on a day on the calendar
elseif(isset($_GET[\'viewday\']))
				{
					$thismonth = $date_info[month]; 
					echo \'<div class="calendar_head">\'.$thismonth." ".$_GET[\'viewday\'].", ".$_GET[\'viewyear\'].\'</div>\'; 
					echo "<hr />";
					
					$sql = "SELECT * FROM calendar where day = \'$_GET[viewday]\' AND month = \'$_GET[viewmonth]\' AND year = \'$_GET[viewyear]\' ORDER BY time ";
					$results = mysql_query($sql);
					if($results)
					{
						while($row=mysql_fetch_array($results))
						{
							
							echo\'<div class="calendar">\'.$row[\'time\']." - ".$row[\'title\']."<br/>".$row[\'room\']."<br />
<hr/>
".$row[\'requester\']."

</div>";
						}
					}
}else{ 
//what is loaded essentally "index" of the site showing the top 5 entries 
$result = mysql_query(\'SELECT * FROM content WHERE category ="\'.$category.\'" ORDER BY id DESC LIMIT 0, 5\');
while($row = mysql_fetch_array($result))
  {
  echo"<a href=\"?id=".$row[\'id\']."\" class=\"article_title\"><h2 class=\"title\">".$row[\'header\']."</h2></a><div class=\"entry\">".substr($row[\'article\'],0,900)."<a href=\"?id=".$row[\'id\']."\" style=\"float:right;\">More&hellip;</a></div>";
  }
  }
  ?>
        </div>
      </div>
      <!-- end #content -->
      <div id="sidebar">
     <?php  
	 //displays the calendar in sidebar
      include(\'admin/calendar/inc_cal.php\');

	  ?><br /><br /><br />
        <ul>
          <?php 
		  //displays a single entry in the side bar can be used for something you want present on every page
		  $result = mysql_query(\'SELECT * FROM content WHERE category ="sidebar_item" ORDER BY "id" DESC LIMIT 1 \');
while($row = mysql_fetch_array($result))
  {
  echo"<li><h3>".$row[\'header\']."</h3><p>".substr($row[\'article\'],0,200)." <a href=\"?id=".$row[\'id\']."\" style=\"float:right;\">More&hellip;</a></p></li>";
  }
  ?>
          <li>
            <?php 
					//Dispalys a list of links on page like a blogroll of sorts		
$result = mysql_query(\'SELECT * FROM navigation WHERE category ="sidebar"\');
if(mysql_affected_rows() > "0" ){
		echo"<h3>Links</h3>";			
	}else{
		echo\'\';
	}
	echo\'<ul>\';
while($row = mysql_fetch_array($result))
  {
  echo"<li><a href=\"".$row[\'url\']."\" title=\"".$row[\'title\']."\">".$row[\'text\']."</a></li>";
  }
  ?>
        </ul>
        </li>
        </ul>
      </div>
      <!-- end #sidebar -->
      <div style="clear: both;">&nbsp;</div>
       <?php 
	   //dispalys top three entries in the bottom widebar
	   $result = mysql_query(\'SELECT * FROM content WHERE category ="widebar"\');
	  if(mysql_affected_rows() > 0){
		  echo\'  <div id="widebar">
        <div id="colA">\';
           $result = mysql_query(\'SELECT * FROM content WHERE category ="widebar" ORDER BY "id" DESC LIMIT 1 \');
while($row = mysql_fetch_array($result))
  {
  echo"<h3>".$row[\'header\']."</h3><p>".substr($row[\'article\'],0,200)." <a href=\"?id=".$row[\'id\']."\"style=\"float:right;\">More&hellip;</a></p>";
  }
       echo\'   </div>
        <div id="colB">\';
           $result = mysql_query(\'SELECT * FROM content WHERE category ="widebar" ORDER BY "id" DESC LIMIT 1,1 \');
while($row = mysql_fetch_array($result))
  {
  echo"<h3>".$row[\'header\']."</h3><p>".substr($row[\'article\'],0,200)." <a href=\"?id=".$row[\'id\']."\"style=\"float:right;\">More&hellip;</a></p>";
  }
          echo\'  </div>
        <div id="colC">\';
           $result = mysql_query(\'SELECT * FROM content WHERE category ="widebar" ORDER BY "id" DESC LIMIT 2,3 \');
while($row = mysql_fetch_array($result))
  {
  echo"<h3>".$row[\'header\']."</h3><p>".substr($row[\'article\'],0,200)." <a href=\"?id=".$row[\'id\']."\" style=\"float:right;\">More&hellip;</a></p>";
  }
       echo\'   </div>
        <div style="clear: both;">&nbsp;</div>
      </div>\';
	  }
	  ?>
    
    </div>
    <!-- end #page --> 
  </div>
  <!-- end #wrapper2 -->
  <div id="footer">
<p> &copy;2010 - <?php echo date("Y"); ?> <?php echo $CFG->sitename?> | <a href="admin/">Login</a><br />
<a href="http://www.e12e.net" target="_blank" style="border:none;"><span>Powered By: Helium&reg;</span></a> Current Theme: <?= $theme ?></p>  </div>
</div>
<!-- end #wrapper -->
<?php
//sort script for ecom page allows the dynamic jquery sorting on ecom page 
if($category == "ecom"){
echo"<script type=\"text/javascript\">
           // Custom sorting plugin
(function($) {
  $.fn.sorted = function(customOptions) {
    var options = {
      reversed: false,
      by: function(a) { return a.text(); }
    };
    $.extend(options, customOptions);
    $data = $(this);
    arr = $data.get();
    arr.sort(function(a, b) {
      var valA = options.by($(a));
      var valB = options.by($(b));
      if (options.reversed) {
        return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;				
      } else {		
        return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
      }
    });
    return $(arr);
  };
})(jQuery);

// DOMContentLoaded
$(function() {

  // bind radiobuttons in the form
  var $filterType = $(\'#filter input[name=\"type\"]\');
  var $filterSort = $(\'#filter input[name=\"sort\"]\');

  // get the first collection
  var $applications = $(\'#applications\');

  // clone applications to get a second collection
  var $data = $applications.clone();

  // attempt to call Quicksand on every form change
  $filterType.add($filterSort).change(function(e) {
    if ($($filterType+\':checked\').val() == \'all\') {
      var $filteredData = $data.find(\'li\');
    } else {
      var $filteredData = $data.find(\'li[data-type=\' + $($filterType+\":checked\").val() + \']\');
    }

    // if sorted by size
    if ($(\'#filter input[name=\"sort\"]:checked\').val() == \"size\") {
      var $sortedData = $filteredData.sorted({
        by: function(v) {
          return parseFloat($(v).find(\'span[data-type=size]\').text());
        }
      });
    } else {
      // if sorted by name
      var $sortedData = $filteredData.sorted({
        by: function(v) {
          return $(v).find(\'strong\').text().toLowerCase();
        }
      });
    }   

    // finally, call quicksand
    $applications.quicksand($sortedData, {
      duration: 800,
      easing: \'easeInOutQuad\'
    });

  });

});
          </script>";
}else{
//do nonting
}
?>
<!--//This file is part of E12E13E14TS CMS Helium H2.
//
//    E12E13E14TS CMS Helium H2 is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    E12E13E14TS CMS Helium H2 is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with E12E13E14TS CMS Helium H2.  If not, see <http://www.gnu.org/licenses/>.-->
</body>
</html>
';
fwrite($fh, $stringData);
fclose($fh);
chmod($myFile, 0777);

header("Location:../index.php");
?>
