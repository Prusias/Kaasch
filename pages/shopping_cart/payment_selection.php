<?php
	require_once("../../document_root.php");
	require (get_document_root().'\includes/ddb_connect.php');
	// require (get_document_root().'\includes/databases.php');

	require_once(get_document_root() . "/includes/header.php");
	get_header('kaasch', '');
	$db = $mysqli;
?>

  <h3>Order overview</h3>
  <table>
    <?php
    //   foreach($key as $value){
    //     echo "<tr><td>$value</td><td>$$</td></tr>";
    // }
    ?>
    <tr>
      <td>Product 1</td>
      <td>$$</td>
    </tr>
    <tr>
      <td>Product 2</td>
      <td>$$</td>
    </tr>
    <tr>
      <td><b>Total:</b></td>
      <td><b>$$$$</b></td>
    </tr>
  </table>
  <br>
  <h3>Delivery address</h3>
  <table>
    First_name Last_name<br>
    Street #<br>
    City Postal_code<br>
    Country<br>
  <br>
  <p><h3>Select payment method</h3></p>
  <form method = 'post'>
    <table>
      <tr>
        <td><input type="radio" name="payment_method" value="paypal">Paypal</td>
        <td><input type="radio" name="payment_method" value="ideal">iDeal</td>
        <td><input type="radio" name="payment_method" value="creditcard">Credit Card</td>
        <td><input type="radio" name="payment_method" value="bitcoin">Bitcoin</td>
      </tr>
    </table>
      <br />
      <input type="submit" name="submit" value="Confirm">
  </form>




<?php
if(isset($_POST['submit'])){
  if(!isset($_POST['payment_method'])){
    echo "Please select a payment method.";
  }
  else{
    if($_POST['payment_method']=='paypal'){
      echo "PayPal";
    }
    elseif($_POST['payment_method']=='ideal'){
      echo "iDeal";
    }
    elseif($_POST['payment_method']=='creditcard'){
      echo "Credit Card";
    }
    elseif($_POST['payment_method']=='bitcoin'){
      echo "Bitcoin";
    }
  }
}
?>
<?php require_once(get_document_root() . "/includes/footer.php"); ?>
