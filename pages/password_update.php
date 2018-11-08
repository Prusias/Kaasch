<?php


	require ('../includes/ddb_connect.php');

	require_once("../document_root.php");

	require_once(get_document_root() . "/includes/header.php");
		get_header('kaasch', '');


	if (!empty($_POST['Submit'])){

		$email =  strtolower(mysqli_real_escape_string($mysqli, $_POST['email']));

		$result = $mysqli->query("SELECT * FROM users WHERE email_address ='$email'");

		if (mysqli_num_rows($result) > 0){
			echo '
			<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="mx-auto">
						<h2>Fill your new password</h2>
						<form method="post" action="password_update.php">
							<div class="form-group">
								<label for="pass">Password:</label>
								<input name="password" type="password"  required title="please fill your new password" class="form-control">
							</div>
							
							<div class="form-group">
								<input type="submit" name="change" value="change" class="btn btn-primary">
							
							</div>
						</form>
					</div>
				</div>
			</div>
			</div>
			';
		
		}
		
		 else {
			header("Location:password_forgotten.php?message_code=10");
		 	}
	}
	if(isset($_POST['change']))
			{
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$change = $mysqli->query("UPDATE users SET password_hash = '$password' WHERE email_address = '$email'");
				if($change == true)
				{
					header("Location: login_form.php?message_code=11");
				}
				else
				{
					header("Location: password_forgotten.php?message_code=2");
				}
			}
	
?>
	
	
<?php require_once(get_document_root() . "/includes/footer.php"); ?>
