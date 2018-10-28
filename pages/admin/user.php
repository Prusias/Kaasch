<?php
require_once("../../document_root.php");
require_once(get_document_root() . "/includes/header.php");
get_header('kaasch', '');
require_once(get_document_root() . "/includes/admin_page.php");
require_once(get_document_root() . "/includes/ddb_connect.php");

$user_id = mysqli_real_escape_string($mysqli, $_GET['user_id']);
echo $user_id;



echo '<div class="container">
        <div class="row">
            <div class="col-12">
                <h1>gebruikers</h1>
            </div>
          </div>';


<ul class="list-group">
  <li class="list-group-item"></li>
  <li class="list-group-item"></li>
  
</ul>
echo '</div>';

require_once(get_document_root() . "/includes/footer.php");
 ?>
