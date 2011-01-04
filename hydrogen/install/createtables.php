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
  `article` varchar(5000) NOT NULL,
  `category` varchar(255) NOT NULL COMMENT 'this determines what page the content/article will be displayed on',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='content for each page the articles and other content';";

$result1 = mysql_query($query1);



$query2="CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(2255) NOT NULL COMMENT 'the question',
  `answer` varchar(2255) NOT NULL COMMENT 'the answer',
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




$query6 ="INSERT INTO `categories` (`id`, `category`, `use`) VALUES
(1, 'leftbottom', 'nav'),
(2, 'leftmid', 'nav'),
(3, 'main', 'nav'),
(4, 'lefttop', 'nav'),
(5, 'home', 'page');";

$result6 = mysql_query($query6);

$query7 = "INSERT INTO `navigation` (`id`, `text`, `url`, `title`, `category`) VALUES
(1, 'home', 'index.php', '".$CFG->sitename."', 'main')";
$result7 = mysql_query($query7);

$query8 = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`,`email`, `pass`,`role`) VALUES
(1, '".$firstname."', '".$lastname."', '".$username."', '".$email."', '".md5($pass)."','admin');";

$result8 = mysql_query($query8);

$query9 = "INSERT INTO `content` (`id`, `header`, `article`, `category`) VALUES
(1, 'Lorem ipsum sea et ignota eloquentiam.', '<div>Lorem ipsum sea et ignota eloquentiam, cetero aliquid maiorum vim eu! Vix in altera omittantur, stet viris pri ea! Mea veniam incorrupte conclusionemque ne. Sea ea natum verear omittam, ius malis eruditi ea, liber viris munere ea per! Eam id elitr inciderint disputationi! Vim id feugait voluptua.</div><div><br></div><div>Sed et sumo disputationi. Sed illud argumentum ex, at per consetetur dissentiet delicatissimi, an nobis invidunt vel? Per nonumy neglegentur no, novum putent ut vel! Ad pro brute graeci. Vidit noster tibique ad sea, te simul dissentiunt has, ad sed fierent deterruisset! Eos assentior vituperata at, legimus fabellas vim cu, eu appellantur reformidans concludaturque est.</div><div><br></div><div>Ignota bonorum vel at, sed errem lucilius definitionem ei. Iracundia interesset nam no. Pri saepe gubergren ne? Qui amet laudem voluptatum te, ei mei idque quodsi aliquando! Cu unum dolorum forensibus per, ne animal regione torquatos eos.</div>', 'home');";

$result9 = mysql_query($query9);

header('Location:setup.php');
?>