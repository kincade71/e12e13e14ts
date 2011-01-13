<form action="misc/add.catgory.php" method="post">
  <table>
  <tr><td></td></tr>

    <tr>
      <td style="width:190px;">title of category: </td>
    </tr>
    <tr>
      <td ><input style="width:190px;" name="pagename" type="text" /></td>
    </tr>
    <tr>
      <td colspan="2"><input name="" <?php if($role == "contributor"){
			echo 'disabled="disabled"';
		}else{
			 //do nothing
			 };?>type="submit" value="add category" style="float:right;" /></td>
    </tr>
  </table>
</form>