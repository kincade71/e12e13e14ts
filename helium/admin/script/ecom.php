<?php
include('../../config.php');
        $p_email = $_POST['p_email'];
 
        $p_name = $_POST['p_name'];
    
        $p_id = $_POST['p_id'];
    
        $p_price = $_POST['p_price'];
      
        $p_shipping = $_POST['p_shipping'];
      
        $p_more_shipping = $_POST['p_more_shipping'];
     
        $p_handling = $_POST['p_handling'];



echo'<textarea  cols="43" rows="25" style="margin-top:-9px;margin-left:-8px;padding:0px;">

<form method="post" action="https://www.paypal.com/cgi-bin/webscr" target="paypal">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="'.$p_email.'">
<input type="hidden" name="item_name" value="'.$p_name.'">
<input type="hidden" name="item_number" value="'.$p_id.'">
<input type="hidden" name="amount" value="'.$p_price.'">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="shipping" value="'.$p_shipping.'">
<input type="hidden" name="shipping2" value="'.$p_more_shipping.'">
<input type="hidden" name="handling_cart" value="'.$p_handling.'">
<input type="hidden" name="bn"  value="Helium.PayPal.001">
<input type="image" name="add" src="'.$CFG->wwwroot.'images/btn_cart_SM.gif">
</form>

</textarea>  ';
?>