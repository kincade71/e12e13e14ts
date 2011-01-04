<?php
include("../../config.php");
$firstname1 = $_POST['firstname1'];
$lastname1 = $_POST['lastname1'];
$createusername1 = $_POST['username1'];
$createpassword1 = md5($_POST['password1']);
$role1 = $_POST['role1'];

$link1=mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$query1 = "INSERT INTO `users` (`firstname`, `lastname`, `username`, `pass`, `role`) VALUES ('$firstname1', '$lastname1', '$createusername1', '$createpassword1', '$role1')";
				mysql_query($query1);
//echo $firstname;
//echo $lastname; 
//echo $createusername;
//echo $createpassword;
//echo $role;

header('Location:../index.php');						
?>