<?php  
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
 echo "<a href=\"answer.php?num=".$result['id']."\" style=\" text-decoration:none;\"><h2>".$result['question']."</h2></a>".$result['date'].""; 
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