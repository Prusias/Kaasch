<?php


	require ('../includes/ddb_connect.php');

	require_once("../document_root.php");

	require_once(get_document_root() . "/includes/header.php");
		get_header('kaasch', '');


	if (!empty($_POST['Submit'])){
		
		$email = strtolower(mysqli_real_escape_string($mysqli, $_POST["mail"]));
		//var_dump($mail);
		$result = $mysqli->query("SELECT * FROM users WHERE email_address ='$email'");
		//$_SESSION['mail'] = $email;
		if (mysqli_num_rows($result) > 0){
			echo '
			<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="mx-auto">
						<h2>Fill your new password</h2>
						<form method="post" action="password_update_last.php?mail='.htmlspecialchars($email).'">
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
	
?>
	
	
<?php require_once(get_document_root() . "/includes/footer.php"); ?>
