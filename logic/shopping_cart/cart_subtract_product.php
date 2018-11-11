<?php
    session_start();
    require_once("../../document_root.php");
    if (isset($_POST["-"])) {
        $shoppingcart = $_SESSION["shoppingcart"];
        $newshoppingcart = $shoppingcart;
        for($i = 0; $i < sizeof($shoppingcart); $i++ ){
            if($shoppingcart[$i][0] == $_POST['product_id']) {
                if ($shoppingcart[$i][1] == 1) {
                    unset($newshoppingcart[$i]);
                    $_SESSION["shoppingcart"] = array_values($newshoppingcart);
                } else {
                    $newshoppingcart[$i][1] = $shoppingcart[$i][1] - 1;
                    $_SESSION["shoppingcart"] = $newshoppingcart;
                }
            }
        }
    }
    header("Location: " . get_relative_root() . "/pages/shopping_cart");
?>