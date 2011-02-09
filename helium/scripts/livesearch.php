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
 // Otherwise we connect to our Database 
 include('../config.php');
 
 $find = $_POST['find'];
 // We preform a bit of filtering 
 $find = strtoupper($find); 
 $find = strip_tags($find); 
 $find = trim ($find); 
 
 //Now we search for our search term, in the field the user specified 
 $data = mysql_query("SELECT * FROM faq WHERE upper(question) LIKE'%$find%'"); 
 
 //And we display the results 
 while($result = mysql_fetch_array( $data )) 
 { 
 echo "<br/><a href=\"index.php?category=faq&num=".$result['id']."\" style=\" text-decoration:none;\">".$result['date']."<h2>".$result['question']."</h2></a>"; 
 } 
 //<a href=\"answer.php?num=".$row['id']."\" style=\" text-decoration:none;\"><h2>".$row['question']."</h2></a>".$row['date']."
 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
 $anymatches=mysql_num_rows($data); 
 if ($anymatches == 0) 
 { 
 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 } 
 
 //And we remind them what they searched for 
 //echo "<b>Searched For:</b> " .$find; 
 ?> 