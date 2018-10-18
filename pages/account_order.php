<?php
	require_once("../document_root.php");

	require_once(get_document_root() . "/includes/header.php");
	get_header('kaasch', '');
?>

    Account Account# - Orders<br>
    Last_name, First_name<br><br>

  <table style="display: inline-block;">
    <col width = 130><col width = 80>
    <tr>
      <td><b>Order Number</b></td>
      <td align='right'>Order #</td>
    </tr>
    <tr>
      <td><b>Date</b></td>
      <td align='right'>##/##/####</td>
    </tr>
    <tr>
      <td><b>Status</b></td>
      <td align='right'>StatusID</td>
    </tr>
  </table>
  <table style="display: inline-block;">
    <col width = 80><col width = 150>
    <tr>
      <td><b>Address</b></td>
      <td align='right'>First_name Last_name</td>
    </tr>
    <tr>
      <td></td>
      <td align='right'>Street #</td>
    </tr>
    <tr>
      <td></td>
      <td align='right'>City Postal_code</td>
    </tr>
    <tr>
      <td></td>
      <td align='right'>Country</td>
    </tr>
  </table>
  <table style="display: inline-block;">
    <col width = 130><col width = 130>
    <tr>
      <td><b>Payment Method</b></td>
      <td align='right'>payment_method</td>
    </tr>
    <tr>
      <td></td>
      <td align='right'>email if PayPal</td>
    </tr>
  </table>
  <br><br>
  <table>
    <col width = 180><col width = 50>
    <tr>
      <td><b>Products</b></td>
    </tr>
    <tr>
      <td>Product #1</td>
      <td align='right'>#1 $$</td>
    </tr>
    <tr>
      <td>Product #2</td>
      <td align='right'>#2 $$</td>
    </tr>
    <tr>
      <td>Product #3</td>
      <td align='right'>#3 $$</td>
    </tr>
    <tr>
      <td><b>Total</b></td>
      <td align='right'>$$$$</td>
    </tr>
  </table>
  <form method="post" action="account_order_edit.php">
    <input type="submit" name="edit" value="Edit order">
  </form>
  <?php require_once(get_document_root() . "/includes/footer.php"); ?>
