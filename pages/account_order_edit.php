<?php
include("includes/header.php");

 ?>
    Account Account# - Orders<br>
    Last_name, First_name<br><br>

  <table style="display: inline-block;">
    <col width = 130><col width = 80>
    <tr><td><b>Order Number</b></td><td align='right'>Order #</td></tr>
    <tr><td><b>Date</b></td><td align='right'>##/##/####</td></tr>
    <tr><td><b>Status</b></td><td align='right'><input type='text' name='statusid' value='StatusID' size='10'></td></tr>
  </table>
  <table style="display: inline-block;">
    <col width = 80><col width = 150>
    <form method="post">
    <tr><td><b>Address</b></td><td align='right'><input type='text' name = 'name' value ='First_name Last_name'></td></tr>
    <tr><td></td><td align='right'><input type='text' name='street' value='Street #'></td></tr>
    <tr><td></td><td align='right'><input type='text' name='postal_code' value='City postal_code'></td></tr>
    <tr><td></td><td align='right'><input type='text' name='country' value='Country'></td></tr>
  </form>
  </table>
  <table style="display: inline-block;">
    <col width = 130><col width = 130>
    <tr><td><b>Payment Method</b></td><td align='right'>payment_method</td></tr>
    <tr><td></td><td align='right'>email if PayPal</td></tr>
  </table>
  <br><br>
  <table>
    <col width = 180><col width = 50>
    <tr><td><b>Products</b><td></tr>
    <tr><td>Product #1</td><td align='right'>#1 $$</td></tr>
    <tr><td>Product #2</td><td align='right'>#2 $$</td></tr>
    <tr><td>Product #3</td><td align='right'>#3 $$</td></tr>
    <tr><td><b>Total</b></td><td align='right'>$$$$</td></tr>
  </table>
  <form method="post" action="account_order.php" style="display: inline-block">
    <input type="submit" name="cancel" value="Cancel">
  </form>
<form method="post" action="account_order.php" style="display: inline-block">
  <input type="submit" name="confirm" value="Confirm Changes">
</form>

<?php
  if (isset($_POST['cancel'])) {
    header('location=account_order.php');
  }
  if (isset($_POST['confirm'])){
    //save changes
    header('location=account_order.php');
  }

  include("includes/footer.php");


?>
