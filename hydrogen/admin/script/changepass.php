<?php
include('../../config.php');
$newpass = $_POST['newpass'];
$newpass1 = $_POST['newpass1'];
$newpassmd5 = md5($newpass);
$id = $_POST['id'];
if($newpass == $newpass1){
$link1=mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
				$query1 = "UPDATE `users` SET `pass` = '$newpassmd5' WHERE `id` = '$id' ";
				mysql_query($query1);
				
				if ($query1){
					}else{ 
						echo "there is a problem";
					}
header('location:../index.php');
}else{
 header('location:../login/changelogin_error.php');
}
?>