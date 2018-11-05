<?php
	require_once("../../document_root.php");
	require_once(get_document_root() . '/includes/ddb_connect.php');

	require_once(get_document_root() . "/includes/header.php");
    get_header('kaasch', 'kaasisbaas');
    
    //echo session_id();
?>

<?php
    $fakedata = array(
        array(1, 4),
        array(17, 1),
        array(16, 1)
    );
    $_SESSION["shoppingcart"] = $fakedata;  

    $total = 0;
    $itemcount = 0;
    $discount = 15;
?>

<div class="container">
    <div class="row">
        <div class="col-12 shopping-cart">
            <table class="borders">
            <?php
                foreach($_SESSION["shoppingcart"] as $cart) {
                    $product_id = mysqli_real_escape_string($mysqli, $cart[0]);
                    $amount = $cart[1];

                    $result = $mysqli->query("SELECT * FROM products WHERE id = {$product_id};");

                    if (mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                        $description = substr($row['description'], 0, 64);
                        $total += ($amount * $row['price']);
                        $itemcount += $amount;

                        echo <<<EOT
                        </tr>
                            <td class="borders">{$row['name']}</td>
                            <td class="borders">{$description}</td>
                            <td class="borders">{$row['price']}</td>
                            <td class="borders">
                                <form method="post" action="">
                                    <input type="text" name="product_id" value="{$product_id}" class="d-none">
                                    <input type="submit" name="Remove" value="Remove">
                                </form>
                            </td>
                        </tr>
EOT;
                    
                }
                
            }

            ?>
            </table>
            <table class="pt-4">
            <?php
                foreach($_SESSION["shoppingcart"] as $cart) {
                    $product_id = mysqli_real_escape_string($mysqli, $cart[0]);
                    $amount = $cart[1];

                    $result = $mysqli->query("SELECT * FROM products WHERE id = {$product_id};");

                    if (mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                        $totalprice = $row['price'] * $amount;

                        echo <<<EOT
                        </tr>
                            <td>{$row['name']}</td>
                            <td style="text-align: right;">
                                <div style="display: inline-block;">
                                    Amount: {$amount}
                                    <form method="post" action="">
                                        <input type="text" name="product_id" value="{$product_id}" class="d-none">
                                        <input type="submit" name="+" value="+">
                                        <input type="submit" name="-" value="-">
                                    </form>
                                </div>
                            </td>
                            <td style="text-align: right;">Price: {$totalprice}</td>
                        </tr>
EOT;
                    
                }
                
            }

            ?>
            </table>
        </div>
        <div class="col-9">
            <div style="display:flex;align-items:flex-end; height: 300px;">
                <form method="post" action="">
                    <div class="form-group">
                        <input type="text" name="discountcode">
                        <input type="submit"  name="discount" value="Use Discount" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-3 py-4">
            <table style="float: right">
                <tr>
                    <td>Price: </td>
                    <td>&euro;<?php echo $total ?></td>
                </tr>
                <tr>
                    <td>VAT: </td>
                    <td>&euro;<?php echo $total * 0.21?></td>
                </tr>
                <tr>
                    <td style="padding-right: 2rem;">Discount: </td>
                    <td>%<?php echo $discount?></td>
                </tr>
                <tr>
                    <td>Shipping:</td>
                    <td>&euro;<?php echo $itemcount * 3?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>&euro;<?php 
                    $_SESSION["shoppingcart_price"] = ($total + $total * 0.21) - (($total + $total * 0.21) * ($discount / 100)) + $itemcount * 3;
                    echo $_SESSION["shoppingcart_price"];
                    ?></td>
                </tr>
            </table>
            <a href="<?php echo get_relative_root();?>/pages/finalize_order.php" class="btn btn-primary mt-3" style="float: right;">Bestellen</a>
        </div>
    </div>
</div>




<?php require_once(get_document_root() . "/includes/footer.php"); ?>

<?php
    if (isset($_POST["Remove"])) {
        $shoppingcart = $_SESSION["shoppingcart"];
        $newshoppingcart = $shoppingcart;
        for($i = 0; $i < sizeof($shoppingcart); $i++ ){
            if($shoppingcart[$i][0] == $_POST['product_id']);
            unset($newshoppingcart[$i]);
            $_SESSION["shoppingcart"] = array_values($newshoppingcart);
        }
    }
    if (isset($_POST["+"])) {
        $shoppingcart = $_SESSION["shoppingcart"];
        $newshoppingcart = $shoppingcart;
        for($i = 0; $i < sizeof($shoppingcart); $i++ ){
            if($shoppingcart[$i][0] == $_POST['product_id']);
            $newshoppingcart[$i][1] = $shoppingcart[$i][1] + 1;
            $_SESSION["shoppingcart"] = $newshoppingcart;
        }
    }
    if (isset($_POST["-"])) {
        $shoppingcart = $_SESSION["shoppingcart"];
        $newshoppingcart = $shoppingcart;
        for($i = 0; $i < sizeof($shoppingcart); $i++ ){
            if($shoppingcart[$i][0] == $_POST['product_id']);
            if ($shoppingcart[$i][1] == 1) {
                unset($newshoppingcart[$i]);
                $_SESSION["shoppingcart"] = array_values($newshoppingcart);
            } else {
                $newshoppingcart[$i][1] = $shoppingcart[$i][1] - 1;
                $_SESSION["shoppingcart"] = $newshoppingcart;
            }
        }
    }
?>