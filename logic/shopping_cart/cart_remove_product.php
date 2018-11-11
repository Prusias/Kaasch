<?php
    session_start();
    require_once("../../document_root.php");
    if (isset($_POST["Remove"])) {
        $shoppingcart = $_SESSION["shoppingcart"];
        $newshoppingcart = $shoppingcart;
        for($i = 0; $i < sizeof($shoppingcart); $i++ ){
            if($shoppingcart[$i][0] == $_POST['product_id']) {
                unset($newshoppingcart[$i]);
            }
        }
        $_SESSION["shoppingcart"] = array_values($newshoppingcart);
    }
    header("Location: " . get_relative_root() . "/pages/shopping_cart");
?>