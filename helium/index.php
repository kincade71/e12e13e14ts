<?php
$config = "config.php";
if (file_exists($config)) {
    include("config.php");
} else {
    header("Location:install/install.php");
}
?>