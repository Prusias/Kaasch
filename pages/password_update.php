<?php


require ('../includes/ddb_connect.php');


if (!empty($_POST['Submit'])){

	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$email = strtolower(email);

	$result = $mysqli->query("SELECT * FROM users WHERE email_address ='{$email}'");

	if (mysqli_num_rows($result) > 0){
		
		echo '
		<div class="container">
        <div class="row">
            <div class="col-12">
				<div class="mx-auto">
					<h2>Fill your new password</h2>
					<form method="post">
						<div class="form-group">
							<label for="pass">Password:</label>
							<input name="pass" type="password"  required title="please fill your new password" class="form-control">
						</div>
						
						<div class="form-group">
							<input type="submit" name="Change" value="Change" class="btn btn-primary">
						
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>';
		
		if(!empty($_POST['Change'])){
			
			$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
			$change = $mysqli->query("UPDATE users SET password_hash = '$password' WHERE email_address = '$email'");
			header("Location: password_forgotten.php?message_code=11");
			}
			}
	 else {
		header("Location: password_forgotten.php?message_code=10");
		}
}

?>
