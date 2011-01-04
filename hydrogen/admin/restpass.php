<?php
include("../config.php");
	echo"<script type=\"text/JavaScript\">

function delayer(){
    window.location = \"modify.php?p=6\"
}

//   
</script>";
echo "<body onLoad=\"setTimeout('delayer()', 2000)\" bgcolor='#ffffff'>";

/*$con = mysql_connect($data_server, $data_user, $data_pw)
				or die("couldnt connect to database");
				mysql_select_db("uploads");*/


$id = $_GET['id'];
$newpass = md5("user");

$query = "UPDATE users  SET pass = '$newpass' WHERE id = '$id' ";
                    $result = mysql_query($query);
					
					if ($query){
					}else{ 
						echo "there is a problem";
					}
					/*echo $id; echo $illegal_image;*/
$sql = mysql_query("SELECT * FROM users where id = '$id' ");
while($row = mysql_fetch_array($sql))
  {
	$name = $row['firstname']." ".$row['lastname'];
	$email= $row['email'];
  }  
  
  // multiple recipients
$to  = $email;

// subject
$subject = $name.' Your Password Has Been Reset';

// message
$message = '
<html>
<head>
  <title>Your Password Has Been Reset</title>
</head>
<body>
Your new password is: user<br />
<a href="'.$CFG->wwwroot.'admin/">Change my password</a>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To:'.$email.'' . "\r\n";
$headers .= 'From: Admin' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>					