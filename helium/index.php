<?php
//testing github sync
$config = "config.php";
if (file_exists($config)) {
    include($config);
} else {
    header("Location:install/install.php");
}
?>