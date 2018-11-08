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
           <h2>Kaas edit</h2>
				<form method="post" action="verwerken1.php">
				<fieldset>
				<table>
				<tr><td>Name:</td><td> <input type ="text" name="name" size="25"></td></tr>
				<tr><td VALIGN=TOP>Description:</td><td>  <textarea name="description" rows="5" cols="30"></textarea></td></tr>
				<tr><td>Price(€):</td><td> <input type ="text" name="price" size="25" placeholder = 'euros'></td></tr>
				<tr><td>BTW:</td><td> <input type ="radio" name="category" value="1" checked>21%<input type ="radio" name="category" value="2">6%</td></tr>
				<tr><td>Shelflife:</td><td> <input type ="text" name="shelflife" size="25" placeholder = 'years'></td></tr>
				</table><br>
				<input type="Submit" value="Invoegen"> <input type="reset" value="Leegmaken">
				<form>
				

        </div>
    </div>
    <?php 
	//require_once(get_document_root() . '/pages/product/reviews.php'); 
	?>
</div>




<?php require_once(get_document_root() . "/includes/footer.php"); ?>
