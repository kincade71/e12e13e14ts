<?php
include('../../config.php');
$title = $_POST['title'];
$image = $_POST['image'];
$button= $_POST['button'];
$filter= $_POST['filter'];
$price = $_POST['price'];
$desc = $_POST['desc'];

				$query = "INSERT INTO `ecom` (`id`, `title`, `image`,`dt`, `other`, `filter`, `price`, `desc`) VALUES (null, '$title', '$image', '$filter', '$button', '$filter', '$price', '$desc')";
				mysql_query($query);

header('Location:../ecom.php');
?>