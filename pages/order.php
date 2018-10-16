<?php
require ('../includes/ddb_connect.php');
$user_id = $_GET['id'];
?>

<table   width="50%"  align="center">
	<tr>
		<td colspan="6"><h2 align="center">Your orders</h2></td>
	</tr>
	<tr>
		<th>Order number</th>
		<th>order date</th>
		<th>status</th>
		<th>payment mothod</th>
		<th>paid ?</th>
	</tr>

<?php
function paid($paid)
{
	if($paid == '1')
	{
		return "yes";
	}else{
		return "no";
	}
}
$sql = ("SELECT * FROM orders");
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
	echo "<tr align=center>";
 	echo "<td>" . $row['id'] . "</td>";
  	echo "<td>" . $row['date']. "</td><td> " . $row['status_id'] . "</td>";
  	echo "<td>" . $row['paymentmethod_id'] ."</td><td> " . paid($row['is_paid']) . "</td>";
	echo ("<td> <a href=\"spicific_order.php?klantnr=".$row['id']."\">View | </a>");
	echo "</tr>";
  }
echo "</table>";


} else {
    echo "Geen records gevonden";
}

?>
