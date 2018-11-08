<?php
	require_once("../../document_root.php");
	require_once(get_document_root() . '/includes/ddb_connect.php');
	require_once(get_document_root() . "/includes/header.php");
    get_header('kaasch', 'kaasisbaas');
?>


<?php
	$dbhost = "localhost"; 
	$dbuser = "root"; 
	$dbpass = ""; 
	$dbname = "kaasch"; 
	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
//	Test of de verbinding werkt! 
	if (mysqli_connect_errno()) {
		die("De verbinding met de database is mislukt: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
		);
	} 	
	
$query = "INSERT INTO products(name, description, price, shelflife)
VALUES'".$_POST["name"]."','".$_POST["description"]."','".$_POST["price"]."','".$_POST["shelflife"]."')";
$result = mysqli_query($db, $query);
echo("De volgende gegevens zijn ingevoerd:<br />");
echo("Naam: <b> ". $_POST["name"]. "</b><br>");
echo("Voorletters: <b>".$_POST["description"] . "</b><br>");
echo("Postcode: <b> ". $_POST["price"]. "</b><br>");
echo("Plaats: <b> ". $_POST["shelflife"]. "</b><br>");
mysqli_close($db);
?>

<?php require_once(get_document_root() . "/includes/footer.php"); ?>