<?php
$id = $_GET['id'];
$page = $_GET['page'];
if($page == '2'){
$result = mysql_query("SELECT * FROM `content` WHERE id = \"$id\"");
while($row = mysql_fetch_array($result)){
echo'<span class="subheader"></span>
  <form id="form1" name="form1" method="post" action="script/update_article_url_edit.php">
    <table>
      <tr>
        <td colspan="2" style=" padding:4px;"><input disabled="disabled" name="title" type="text" size="87%" value="'.$row['header'].'"/></td>
      </tr>
      <tr>
        <td><textarea name="url">'.$row['article'].'</textarea><input type="hidden" name="id" value="'.$id.'"></td>
      </tr>
      <tr>
        <td colspan="2"><input id="submit" type="Submit" name="submit" value="save change" style="float:right;" /><input type="button" value="cancel" style="float:right;" onclick="window.location=\'modify.php?p='.$page.'\'"/></td>
      </tr>
    </table>
  </form>';
}
}elseif($page == '8'){
$result = mysql_query("SELECT * FROM `ecom` WHERE id = \"$id\"");
while($row = mysql_fetch_array($result)){
echo'<span class="subheader"></span>
  <form id="form1" name="form1" method="post" action="script/update_details_ecom_edit.php">
    <table>
      <tr>
        <td colspan="2" style=" padding:4px;"><input disabled="disabled" name="title" type="text" size="87%" value="'.$row['title'].'"/></td>
      </tr>
      <tr>
        <td><textarea name="desc">'.$row['desc'].'</textarea><input type="hidden" name="id" value="'.$id.'"></td>
      </tr>
      <tr>
        <td colspan="2"><input id="submit" type="Submit" name="submit" value="save change" style="float:right;" /><input id="submit" type="button" value="cancel" style="float:right;" onclick="window.location=\'modify.php?p='.$page.'\'"/></td>
      </tr>
    </table>
  </form>';
}		
}elseif($page == '4'){
$result = mysql_query("SELECT * FROM `faq` WHERE id = \"$id\"");
while($row = mysql_fetch_array($result)){
echo'<span class="subheader"></span>
  <form id="form1" name="form1" method="post" action="script/update_faq_url_edit.php">
    <table>
      <tr>
        <td colspan="2" style=" padding:4px;"><input disabled="disabled" name="title" type="text" size="87%" value="'.$row['question'].'"/></td>
      </tr>
      <tr>
        <td><textarea name="url">'.$row['answer'].'</textarea><input type="hidden" name="id" value="'.$id.'"></td>
      </tr>
      <tr>
        <td colspan="2"><input id="submit" type="Submit" name="submit" value="save change" style="float:right;" /><input id="submit" type="button" value="cancel" style="float:right;" onclick="window.location=\'modify.php?p='.$page.'\'" /></td>
      </tr>
    </table>
  </form>';
}
}elseif($page == '7'){
$result = mysql_query("SELECT * FROM `calendar` WHERE id = \"$id\"");
while($row = mysql_fetch_array($result)){
echo'<span class="subheader"></span>
  <form id="form1" name="form1" method="post" action="script/update_details_edit.php">
    <table>
      <tr>
        <td colspan="2" style=" padding:4px;"><input disabled="disabled" name="title" type="text" size="87%" value="'.$row['title'].'"/></td>
      </tr>
      <tr>
        <td><textarea name="details">'.$row['requester'].'</textarea><input type="hidden" name="id" value="'.$id.'"></td>
      </tr>
      <tr>
        <td colspan="2"><input id="submit" type="Submit" name="submit" value="save change" style="float:right;" /><input id="submit" type="button" value="cancel" style="float:right;" onclick="window.location=\'modify.php?p='.$page.'\'" /></td>
      </tr>
    </table>
  </form>';
}
}
?>