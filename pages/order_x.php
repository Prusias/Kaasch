<?php
	require_once("../document_root.php");

	require_once(get_document_root() . "/includes/header.php");
	require ('../includes/ddb_connect.php');
	get_header('kaasch', '');
	
	session_start();
	$id=$_SESSION['id'];
	
	if(isset($_GET))
	{
?>

			<p class="h2 text-center"> Order Number <?php echo "$_GET['order']"; ?> </p>
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">Product Name</th>
				  <th scope="col">Product Price</th>
				  <th scope="col">Total paid is Euros</th>
				</tr>
			  </thead>

<?php
	
	
		$sql = ("SELECT p.name, a.amount, (a.amount*p.price) AS total
		FROM order_products a JOIN products p
		ON a.product_id = p.id AND a.order_id  = '$_GET['order']';");
		$result = mysqli_query($mysqli, $sql);
		if (mysqli_num_rows($result) > 0) {

		while($row = mysqli_fetch_assoc($result){
			echo "
			<tbody>
				<tr>
				  <th scope='row'>" . $row['name'] . "</th>
				  <td>" . $row['amount'] . "</td>
				  <td>" . $row['total'] ."</td>
				</tr>
    
			</tbody>";

  }
echo "</table>";
			
			
		}else{
			echo "Sorry an error happened while getting the information, please try again.";
		}

	}
	}
?>





<?php require_once(get_document_root() . "/includes/footer.php"); ?>





















<?php require_once(get_document_root() . "/includes/footer.php"); ?>