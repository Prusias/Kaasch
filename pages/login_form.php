<?php
require("../includes/header.php");

 ?>
<div class="container">
  <div class="row">
    <div class="col-sm-10">
    <h3>login</h3>
	  New user ?  <a href="signup.php">make a new account now</a>
	  <table>
	  <form method="post" action="login.php">
	     <tr>
         <td>	Email: </td>
         <td><input name="email" type="text"  required title="please fill your email" ></td>
       </tr>
	      <tr>
          <td>	password: </td>
          <td><input name="password" type="password" required title="please fill your password"></td>
        </tr>
	  	    <input type="submit" name="Submit" value="Login">
	  	    <input name="reset" type="reset" id="reset" value="Empty the form">
	  </form>
    </table>
	   <a href="forgut_password.php"> I forgot my password</a>
   </div>
   </div>
</div>





<?php

//if(isset($_POST))
//{
//	var_dump($_POST);
//}


?>
<?php
require("../includes/footer.php");
?>
