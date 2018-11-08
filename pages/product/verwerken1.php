<?php
	require_once("../../document_root.php");
	require_once(get_document_root() . '/includes/ddb_connect.php');
	require_once(get_document_root() . "/includes/header.php");
    get_header('kaasch', 'kaasisbaas');
?>


<?php
	
	
//	Test of de verbinding werkt! 
	if (mysqli_connect_errno()) {
		die("De verbinding met de database is mislukt: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
		);
	} 	
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$shelflife = $_POST['shelflife'];
$category = $_POST['category'];





$query = "INSERT INTO 
`products` (`name`, `description`, `price`, `shelflife`, `created_at`, `updated_at`, `category_id`) 
VALUES('$name', '$description', $price, $shelflife, NOW(), NOW(), $category);";



mysqli_query($mysqli, $query);
echo("De volgende gegevens zijn ingevoerd:<br />");
echo("Name: <b> ". $_POST["name"]. "</b><br>");
echo("Description: <b>".$_POST["description"] . "</b><br>");
echo("Price: <b> ". $_POST["price"]. "</b><br>");
echo("Shelflife: <b> ". $_POST["shelflife"]. "</b><br>");
mysqli_close($mysqli);
?>

<?php require_once(get_document_root() . "/includes/footer.php"); ?>