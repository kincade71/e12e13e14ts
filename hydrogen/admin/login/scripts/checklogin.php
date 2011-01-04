<?php
session_start();
include ('../../../config.php');

// username and password sent from form 
$user=$_POST['user']; 
$pass=$_POST['pass'];

// encrypt password 
$epass=md5($pass);
$_SESSION['user']=$user;

if ($_POST['pass']=='admin')
{
	$_SESSION['pass']=$epass;
}
else
{
	$_SESSION['pass']=$epass;
}

$sql='SELECT * FROM users WHERE username="'.$_SESSION[user].'" AND pass="'.$_SESSION[pass].'"';
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
$_SESSION['name']=$row['firstname'];
$_SESSION['last']=$row['lastname'];
$_SESSION['role']=$row['role'];
if($_SESSION['pass']==$row['pass'])
{
	if($_POST['pass']=='user')
	{
		header("location:../changelogin.php");
	}
	else
	{
		header("location:location.php");
	}
}
else 
{
	header("location:../fail.php");
	echo $sql;
}
?>