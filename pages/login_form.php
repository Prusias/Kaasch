<?php
include("includes/header.php");

 ?>

		<h3>login</h3>
		New user ?  <a href="signup.php">make a new account now</a>
		<table>
		<form method="post" action="login.php">
		<tr><td>	Email: </td><td> <input name="email" type="text"  required title="please fill your email" ></td></tr>
		<tr><td>	password: </td><td><input name="password" type="password" required title="please fill your password"></td></tr>
		</table>
			<input type="submit" name="Submit" value="Login">
			<input name="reset" type="reset" id="reset" value="Empty the form">
		</form><p>
		 <a href="forgut_password.php"> I forgut my password</a>




<?php

//if(isset($_POST))
//{
//	var_dump($_POST);
//}


?>
<?php
include("includes/footer.php");
?>
