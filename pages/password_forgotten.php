<?php
	require_once("../document_root.php");

	require_once(get_document_root() . "/includes/header.php");
	get_header('kaasch', '');

		
?>

	<div class="container">
        <div class="row">
            <div class="col-12">
				<div class="mx-auto">
					<h2>Please fill your E-mail in</h2>
					<form method="post" action="password_update.php">
						<div class="form-group">
							<label for="email">Email address:</label>
							<input name="email" type="text"  required title="please fill your email" class="form-control">
						</div>
						
						<div class="form-group">
							<input type="submit" name="Submit" value="Submit" class="btn btn-primary">
						
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php require_once(get_document_root() . "/includes/footer.php"); ?>