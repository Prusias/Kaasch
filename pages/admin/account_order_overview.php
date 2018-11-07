<?php
	require_once("..\document_root.php");
	require ('..\includes/databases.php');

	require_once(get_document_root() . "/includes/header.php");
	get_header('kaasch', '');
	$sql = (
		"SELECT `users_id`, o.`id`, `date`, `status_id`, `first_name`, `last_name`, sum(`price`*`amount`) AS `total`
		FROM `orders` o
			JOIN `users` u ON o.`id` = u.`id`
    	JOIN `orders_has_products` ohp ON o.`id` = ohp.`orders_id`
    	JOIN `products` p ON ohp.`products_id` = p.`id`;
			");
			$result = mysqli_query($db, $sql);
			if (mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					$userid = $row['users_id'];
					echo ("
					<table border='1'>
					<tr>
						<td><b>ID: </b>$userid</td>
						</tr>
					<tr>
						<td>".$row['last_name'].", ".$row['first_name']."</td>
					</tr>
					</table>
					<br />
					<h3>Order overview</h3>
					  <table border='1'>
					    <tr>
					      <td><b>Order Number</b></td>
					      <td><b>Date</b></td>
					      <td><b>Order Total</b></td>
					      <td><b>Status</b></td>
					      <td></td>
					    </tr>
					");
				}
				$result = mysqli_query($db, $sql);
				while($row = mysqli_fetch_assoc($result)){
					if ($row['status_id'] == 1){
						$status = 'Processing';
						$orderid = $row['id'];
						$date = date_create($row['date']);
						$date = date_format($date, "d/m/Y");
					}
					echo ("
					<tr>
						<td>$orderid</td>
						<td>$date</td>
						<td>".$row['total']."</td>
						<td>$status</td>
						<td><b><a href='account_order.php?userid=$userid&orderid=$orderid'>></a></b></td>
					</tr>
					");
				}
				echo "</table>";
			}
			else {
				echo "geen records gevonden";
			}
?>
  <?php require_once(get_document_root() . "\includes\\footer.php"); ?>
