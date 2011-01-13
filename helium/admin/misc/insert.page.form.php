<form action="misc/add.page.php" method="post">
  <table>
  <tr><td></td></tr>

    <tr>
      <td style="width:190px;">title of page: </td>
    </tr>
    <tr>
      <td ><input style="width:190px;" name="pagename" type="text" /></td>
    </tr>
        <tr>
      <td>copy current home page
      <label>
          <input type="radio" name="RadioGroup1" value="yes" id="RadioGroup1_0" />
          yes</label>
        <label>
          <input type="radio" name="RadioGroup1" value="no" id="RadioGroup1_1" />
          no</label></td>
    </tr>
    <tr>
      <td colspan="2"><input name="" <?php if($role == "contributor"){
			echo 'disabled="disabled"';
		}else{
			 //do nothing
			 };?>type="submit" value="add page" style="float:right;" /></td>
    </tr>
  </table>
</form>