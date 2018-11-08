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
           <h2>Kaas delete</h2>
		  <?php
				$query = "SELECT * FROM klant WHERE klantnr='" .$_GET["klantnr"] ."'";
				$result = mysqli_query($db, $query);
				if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
				echo "<h3>Verwijder dit record?</h3>" . "<p />";
				echo "<table>";
				echo "<tr><td>Klantnummer:</td><td> " . $row["klantnr"]. "</td></tr> ";
				echo "<tr><td>Naam:</td><td> ".$row["naam"]. "</td></tr> " ;
				echo "<tr><td>Voorletters:</td><td> ".$row["voorletters"]. "</td></tr> " ;
				echo "<tr><td>Straatnaam:</td><td> ". $row["straatnaam"] ."</td></tr>";
				echo "<tr><td>Huisnummer:</td><td> ". $row["huisnummer"]
				."</td></tr>";
				echo "<tr><td>Postcode:</td><td> ". $row["postcode"] ."</td></tr>";
				echo "<tr><td>Woonplaats:</td><td> ". $row["woonplaats"] ."</td></tr>";
				echo "</table><p><hr>"; }

				?>

        </div>
    </div>
    <?php 
	//require_once(get_document_root() . '/pages/product/reviews.php'); 
	?>
</div>




<?php require_once(get_document_root() . "/includes/footer.php"); ?>
