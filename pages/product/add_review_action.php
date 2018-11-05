<?php
    require_once("../../document_root.php");
    require_once(get_document_root() . '/includes/ddb_connect.php');
    session_start();

    if(isset($_POST["Submit"])) {
        $_SESSION["user_id"] = 1;
        $is_anonymous = false;

        if(isset($_POST["anomymous"])) {
            $is_anonymous = true;
        }

        $user_id = mysqli_real_escape_string($mysqli, $_SESSION["user_id"]);
        $score = mysqli_real_escape_string($mysqli, $_POST["score"]);
        $description = mysqli_real_escape_string($mysqli, $_POST["description"]);
        $product_id = mysqli_real_escape_string($mysqli, $_POST["product_id"]);

        $mysqli->query("INSERT INTO reviews (product_id, user_id, description, score, is_anonymous) VALUES ({$product_id}, {$user_id}, {$description}, {$score}, {$is_anonymous});");
        header("Location: test_product_page.php?id={$product_id}");
    } else {
        header("Location: finalize_order.php");
    }


?>