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
           <h2>Kaasch product</h2>
            <?php
				$productid = $_GET["id"];
              
				$a = "kaas".$productid.".jpg";
				echo "<img src=\"$a\" alt=\"kaas\" height=\"600\" width=\"600\">";
				
				$query = "SELECT * FROM products;";
				$result = mysqli_query($mysqli, $query);
				$row = mysqli_fetch_assoc($result)
		
				?>
						
				 
				<table style="display: inline-block;">
				<col width = 80><col width = 150>
				<tr>
				<td align='right'><b>Name:&nbsp;&nbsp;</b></td>
				<td><?php echo $row['name'] ?></td>
				</tr>
				<tr>
				<td align='right'><b>Description:&nbsp;&nbsp;</b></td>
				<td><?php echo $row['description'] ?></td>
				</tr>
				<tr>
				<td align='right' VALIGN='TOP'><b>Price:&nbsp;&nbsp;</b></td>
				<td><?php echo "€".$row['price']." euro a 500g "; ?></td>
				</tr>
				<tr>
				<td align='right'><b>Shelflife:&nbsp;&nbsp;</b></td>
				<td><?php echo $row['shelflife']." year"; ?></td>
				</tr>
				<tr>
				<td>&nbsp;</td><td>&nbsp;</td>
				</tr>
				<tr>
				<td align='right'>
				<form method="post" action="!KOOP PAGINA!">
				<input name="product_id" type="text" class="d-none" value="{$row["id"]}">
				<input name="return_url" type="text" class="d-none" value="">
				<button type="submit" name="submit" class="btn btn-secondary"><i class="fas fa-shopping-cart"></i></button>
				</td>
				<td>
				<form method="get" action="product_edit.php">
				<input name="product_id_edit" type="text" class="d-none" value="">
				<input name="return_url" type="text" class="d-none" value="">
				<button type="submit" name="submit_edit" class="btn btn-secondary"><i class="fa fa-wrench"></i></button>
				</form>
				</td>
				</tr>
				<tr>
				<td align='right'>
				<form method="post" action="product_delete">
				<input name="product_id_delete" type="text" class="d-none" value="{$row["id"]}">
				<input name="return_url" type="text" class="d-none" value="">
				<button type="submit" name="submit_delete" class="btn btn-secondary"><i class="fa fa-window-close"></i></button>
				</form>
				</td>
				<td>
				<form method="post" action="product_add">
				<input name="product_id_add" type="text" class="d-none" value="{$row["id"]}">
				<input name="return_url" type="text" class="d-none" value="">
				<button type="submit" name="submit_add" class="btn btn-secondary"><i class="fa fa-plus-circle"></i></button>
				</form>
				</td>
				</tr>
				</table>
				

        </div>
    </div>
    <?php 
	//require_once(get_document_root() . '/pages/product/reviews.php'); 
	?>
</div>




<?php require_once(get_document_root() . "/includes/footer.php"); ?>
