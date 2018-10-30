<?php
	require_once("../document_root.php");
	require ('../includes/databases.php');

	require_once(get_document_root() . "/kaasch/includes/header.php");
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
					echo ("
					<table>
					<tr>
						<td><b>ID </b>".$row['users_id']."</td>
						</tr>
					<tr>
						<td>".$row['first_name']."</td><td>".$row['last_name']."</td>
					</tr>
					</table>
					<h3>Order overview</h3>
					  <table>
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
					}
					echo ("
					<tr>
						<td>".$row['id']."</td>
						<td>".$row['date']."</td>
						<td>".$row['total']."</td>
						<td>".$status."</td>
						<td><b>></b></td>
					</tr>
					");
				}
				echo "</table>";
			}
			else {
				echo "geen records gevonden";
			}
?>
  <?php require_once(get_document_root() . "/kaasch/includes/footer.php"); ?>
