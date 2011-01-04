<?php
include('../config.php');
$firstname = $_POST['first'];
$lastname = $_POST['last'];
$email = $_POST['email'];
$username = $_POST['user'];
$pass = $_POST['pass'];

$query ="CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `use` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'page',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='a single table to refrence all the categories';";

$result = mysql_query($query);



$query1 ="CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL COMMENT 'the header or title of the article or content this is optional',
  `article` text NOT NULL,
  `category` varchar(255) NOT NULL COMMENT 'this determines what page the content/article will be displayed on',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='content for each page the articles and other content';";

$result1 = mysql_query($query1);



$query2="CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(2255) NOT NULL COMMENT 'the question',
  `answer` text NOT NULL COMMENT 'the answer',
  `category` varchar(255) NOT NULL COMMENT 'category for sorting',
  `date` varchar(11) NOT NULL COMMENT 'date faq was entered',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Frequently asked question';";

$result2 = mysql_query($query2);



$query3 = "CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL COMMENT 'the relative url of the desired image',
  `alt` varchar(255) NOT NULL COMMENT 'the alt tag of image (asseccibilty)',
  `title` varchar(255) NOT NULL COMMENT 'content for title tag',
  `category` varchar(255) NOT NULL COMMENT 'what page is the image displayed',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='table to hold urls and other image related content';";

$result3 = mysql_query($query3);



$query4 = "CREATE TABLE IF NOT EXISTS `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL COMMENT 'text for navigation link',
  `url` varchar(255) NOT NULL COMMENT 'link to new page in main navigation',
  `title` varchar(255) NOT NULL COMMENT 'content for title tag',
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='main navigation for students';";

$result4 = mysql_query($query4);



$query5 ="CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `lastname` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `username` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `pass` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `role` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `pass` (`pass`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci COMMENT='this is the user table for admin login';";

$result5 = mysql_query($query5);

$query10 ="CREATE TABLE `calendar` (
  `id` int(11) NOT NULL auto_increment,
  `title` blob NOT NULL,
  `requester` varchar(50) collate latin1_german2_ci NOT NULL,
  `oncampus` varbinary(20) NOT NULL,
  `room` varchar(10) collate latin1_german2_ci NOT NULL,
  `time` time NOT NULL,
  `day` varchar(15) collate latin1_german2_ci NOT NULL,
  `month` varchar(15) collate latin1_german2_ci NOT NULL,
  `year` varchar(5) collate latin1_german2_ci NOT NULL,
  `street` varchar(100) collate latin1_german2_ci NOT NULL,
  `city` varchar(100) collate latin1_german2_ci NOT NULL,
  `state` varchar(50) collate latin1_german2_ci NOT NULL,
  `zip` varchar(15) collate latin1_german2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;";

$result10 = mysql_query($query10);

$query11 ="CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar` varchar(25) COLLATE latin1_general_ci NOT NULL COMMENT 'this decides rather the calendar is on/off',
  `faq` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `ecom` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `theme` varchar(500) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='a single table to refrence various settings';";

$result11 = mysql_query($query11);


$query13 ="CREATE TABLE `ecom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `dt` text NOT NULL,
  `other` text NOT NULL,
  `filter` varchar(255) NOT NULL,
  `price` varchar(11) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";

$result13 = mysql_query($query13);

$query12 = "INSERT INTO `settings` (`id`, `calendar`, `faq`, `ecom`, `theme`)VALUES(1, ' ', 'no', 'no', 'default');";
$result12 = mysql_query($query12);

$query6 ="INSERT INTO `categories` (`id`, `category`, `use`) VALUES
(1, 'main', 'nav'),
(2, 'home', 'page');";

$result6 = mysql_query($query6);

$query7 = "INSERT INTO `navigation` (`id`, `text`, `url`, `title`, `category`) VALUES
(1, 'home', 'index.php', '".$CFG->sitename."', 'main')";
$result7 = mysql_query($query7);

$query8 = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`,`email`, `pass`,`role`) VALUES
(1, '".$firstname."', '".$lastname."', '".$username."', '".$email."', '".md5($pass)."','admin');";

$result8 = mysql_query($query8);

$query9 = "INSERT INTO `content` (`id`, `header`, `article`, `category`) VALUES
(1, 'First post sample entry.', '<p>This is a sample post. If you see this Helium has installed successfully and you are on your way. Thank you for your support.</p>
<p style=\"text-align: right;\">-Helium Team</p>', 'home');";

$result9 = mysql_query($query9);

mail($email, 'E12E13E14TS CMS', 
    '
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="background-color:#fff">
<table cellpadding="0" cellspacing="0" border="0" style="min-width:100px; margin-left:auto; margin-right:auto; margin-top:10px; font-family:Arial, Helvetica, sans-serif;">
  <tr>
    <td style=" background-color:#FFF; border-right:#000 2px solid;"><img src="http://www.e12e.net/images/mail_head.png" style="float:right;" /></td>
  </tr>

  <tr>
    <td style="height:140px;background-color:#ededed; padding-top:5px; padding-right:5px; padding-bottom:0px; margin-bottom:0px; border:#000 2px solid; text-align:right;"><img src="http://www.e12e.net/images/filler.png" style="float:left;"/>
	<h3 style="height:50px; float:left;">Here are your log in credentials.</h3>
    <h2>Username: '.$username.'<br>
    Password: '.$pass.'</h2>
    </td>
  </tr>
  <tr>
  <td style="padding:3px; font-size:12px;"></td>
  </tr>
</table>
</body>
</html>


	
	', 
    'To: '.$firstname.' '.$lastname.'' . 
    "From: E12E13E14TS CMS\n" . 
    "MIME-Version: 1.0\n" . 
    "Content-type: text/html; charset=iso-8859-1");

header('Location:build.php');
?>