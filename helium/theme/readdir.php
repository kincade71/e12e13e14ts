<?php
//This file is part of E12E13E14TS CMS Helium H2.
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
//    along with E12E13E14TS CMS Helium H2.  If not, see <http://www.gnu.org/licenses/>.
// Define the full path to your folder from root 
$path ="../theme";
$i = 0;

$exceptions = array( "." , ".."   , "readdir.php",".DS_Store");
// Open the folder 
$dir_handle = @opendir($path) or die("Unable to open $path"); 
// Loop through the files 
while ($file = readdir($dir_handle)) { 
if(!in_array($file,$exceptions)){
	echo '
  <tr><td><input name="theme" type="radio" id="theme_'.$i++.'" value="'.$file.'" /><a href="#" title="click to preview" onclick="popup2(\'../index.php?preview=true&published=true&category=home&theme='.$file.'\')">'.$file.'</a></td></tr>';
}
}
// Close 
closedir($dir_handle); 
?>