<?php
require_once("../document_root.php");
require_once(get_document_root() . "/includes/ddb_connect.php");

if(!empty($_POST)) {

  foreach($_POST as $key => $value) {
    $clean[$key] = mysqli_real_escape_string($mysqli, $value);
  }

  if (!$mysqli->query("UPDATE users SET first_name = '{$clean['first_name']}', last_name= '{$clean['last_name']}', sex= '{$clean['sex']}', email_adres= '{$clean['email_adres']}', telephone_number= '{$clean['telephone_number']}' where id= {$_GET['user_id']}" )) {
    printf("Errormessage: %s\n", $mysqli->error);
    echo "UPDATE users SET first_name = '{$clean['first_name']}', last_name= '{$clean['last_name']}', is_admin= '{$clean['is_admin']}', email_adres= '{$clean['email_adres']}', telephone_number= '{$clean['telephone_number']}' where id= {$_GET['user_id']}";
  }
  if (!$mysqli->query("UPDATE addresses SET city = '{$clean['city']}', country = '{$clean['country']}', house_number = '{$clean['house_number']}', postal_code = '{$clean['postal_code']}', state = '{$clean['state']}', streetname = '{$clean['streetname']}' WHERE id ={$_GET['address_id']}" )) {
    printf("Errormessage: %s\n", $mysqli->error);
  }
  header("location: user.php");
}
?>
