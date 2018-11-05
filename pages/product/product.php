<?php
	require_once("../../document_root.php");
	require_once(get_document_root() . '/includes/ddb_connect.php');

	require_once(get_document_root() . "/includes/header.php");
    get_header('kaasch', 'kaasisbaas');
    
?>

<?php
?>

<div class="container">
    <div class="row">
        <div class="col-12">
           <h2>Test product pae</h2>

            <?php
                echo "product id: " . $_GET["id"];
            ?>
        </div>
    </div>
    <?php require_once(get_document_root() . '/pages/reviews.php'); ?>
</div>




<?php require_once(get_document_root() . "/includes/footer.php"); ?>