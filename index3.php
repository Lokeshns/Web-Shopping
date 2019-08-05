<?php
session_start();
include_once("Config.php");
?>
<div class="products">
<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$results = $mysqli->query("SELECT pro_code, name, pro_desc, img_name, price FROM products1 ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
    <li class="product">
    <form method="post" action="cart_update3.php">
    <div class="product-content"><h3>{$obj->name}</h3>
    <div class="product-thumb"><img src="{$obj->img_name}"></div>
    <div class="product-desc">{$obj->pro_desc}</div>
    <div class="product-info">
    Price {$currency}{$obj->price} 
    
    <fieldset>
    
    <label>
        <span>Color</span>
        <select name="product_color">
        <option value="Black">Black</option>
        <option value="Silver">Silver</option>
        </select>
    </label>
    
    <label>
        <span>Quantity</span>
        <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
    </label>
    
    </fieldset>
    <input type="hidden" name="pro_code" value="{$obj->pro_code}" />
    <input type="hidden" name="type" value="add" />
    <input type="hidden" name="return_url" value="{$current_url}" />
    <div align="center"><button type="submit" class="add_to_cart">Add</button></div>
    </div></div>
    </form>
    </li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>
</div>




<div class="shopping-cart">
<h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>Your Shopping Cart</h3>';
    echo '<form method="post" action="cart_update3.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';

    $total =0;
    $b = 0;
    foreach ($_SESSION["cart_products"] as $cart_itm)
    {
        $name = $cart_itm["name"];
        $product_qty = $cart_itm["product_qty"];
        $price = $cart_itm["price"];
        $pro_code = $cart_itm["pro_code"];
        $product_color = $cart_itm["product_color"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'">';
        echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$pro_code.']" value="'.$product_qty.'" /></td>';
        echo '<td>'.$name.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$pro_code.'" /> Remove</td>';
        echo '</tr>';
        $subtotal = ($price * $product_qty);
        $total = ($total + $subtotal);
    }
    echo '<td colspan="4">';
    echo '<button type="submit">Update</button><a href="view_cart3.php" class="button">Checkout</a>';
    echo '</td>';
    echo '</tbody>';
    echo '</table>';
    
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';

}
?>
</div>