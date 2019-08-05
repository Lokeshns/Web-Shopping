<?php
session_start();
include_once("Config.php");
?>
<div class="cart-view-table-back">
<form method="post" action="cart_update3.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
    <?php
    if(isset($_SESSION["cart_products"])) //check session var
    {
        $total = 0; //set initial total value
        $b = 0; //var for zebra stripe table 
        foreach ($_SESSION["cart_products"] as $cart_itm)
        {
            //set variables to use in content below
            $name = $cart_itm["name"];
            $product_qty = $cart_itm["product_qty"];
            $price = $cart_itm["price"];
            $pro_code = $cart_itm["pro_code"];
            $product_color = $cart_itm["product_color"];
            $subtotal = ($price * $product_qty); //calculate Price x Qty
            
            $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
            echo '<tr class="'.$bg_color.'">';
            echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$pro_code.']" value="'.$product_qty.'" /></td>';
            echo '<td>'.$name.'</td>';
            echo '<td>'.$currency.$price.'</td>';
            echo '<td>'.$currency.$subtotal.'</td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="'.$pro_code.'" /></td>';
            echo '</tr>';
            $total = ($total + $subtotal); //add subtotal to total var
        }
        
        $grand_total = $total + $shipping_cost; //grand total including shipping cost
        foreach($taxes as $key => $value){ //list and calculate all taxes in array
                $tax_amount     = round($total * ($value / 100));
                $tax_item[$key] = $tax_amount;
                $grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
        }
        
        $list_tax       = '';
        foreach($tax_item as $key => $value){ //List all taxes
            $list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
        }
        $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
    }
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
    <tr><td colspan="5"><a href="index3.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>