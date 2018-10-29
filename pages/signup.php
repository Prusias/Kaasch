<?php

	require_once("../document_root.php");

	require_once(get_document_root() . "/includes/header.php");
	
	get_header('kaasch', '');
	//ession_start();
	require ('../includes/ddb_connect.php');
	
	if (!($_SERVER["REQUEST_METHOD"] == "POST")){

?>
	
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="mx-auto">
							<form action="signup.php" method="post">
							<h2> Making a new account</h2>
							All fields are mandatory
							<hr />
							<div class="form-group">
							<label for="first_name">First Name:</label>
							<input type = "text" name = "first_name" pattern=".{2,}" required title="the first name must be at least two letters" class="form-control">
							</div>
							<div class="form-group">
							<label for="last_name">Last Name:</label>
							<input type = "text" name = "last_name" pattern=".{2,}"   required title="the last name must be at least two letters" class="form-control">
							</div>
							<div class="form-group">
							<label for="email">Email address:</label>
							<input type = "text" name = "mail" class="form-control">
							</div>
							<center>
							<div class="form-check">
								<label for="gender" class="form-check-label">Gender:</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gender" value="male" checked>
								<label class="form-check-label" for="male">
								male
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
								  <label class="form-check-label">
									female
								  </label>
								  </center>
							<div class="form-group">
							<label for="tel_num">Telephone</label>
							<input type="tel" name="tel_num" pattern=".{10,}"   required title="10 numbers minimum" class="form-control">
							</div>
							<div class="form-group">
							<label for="street_name">Street Name</label>
							<input type = "text" name = "street_name" pattern=".{3,}"   required title="3 characters minimum" class="form-control">
							</div>
							<div class="form-group">
							<label for="house_number">House Number</label>
							<input type = "text" name = "house_number" pattern=".{1,}"   required title="at least one number" class="form-control"> 
							</div>
							<div class="form-group">
							<label for="Post_code">Postal Code</label>
							<input type = "text" name = "Post_code" class="form-control">
							</div>
							<div class="form-group">
							<label for="city">city</label>
							<input type = "text" name = "city" pattern=".{2,}"   required title="the city name must be at least two letters" class="form-control">
							
							</div>
							<div class="form-group">
							<label for="state">State</label>
							<input type="text" name="state" class="form-control">
							</div>
							<div class="form-group">
							<label for="country">Country</label>
							<input type = "text" name = "country" pattern=".{2,}"   required title="the country name must be at least two letters" class="form-control">
							</div>
							<div class="form-group">
							<label for="password">Password</label>
							<input type = "password" name = "pwd" pattern=".{6,}"   required title="the password must be at least 6 characters" class="form-control">
							</div>
							
								<center>
								<input type="submit" value="signup" class="btn btn-primary">
								</center>
							</form>
						</div>
						
				</div>
			</div>
		</div>

	
		<center>
<?php
		}
	else
	{
			$first_name = mysqli_real_escape_string($mysqli, $_POST["first_name"]);
			$first_name = ucwords($first_name);
			$last_name = mysqli_real_escape_string($mysqli, $_POST["last_name"]);
			$last_name = ucwords($last_name);
			$mail = mysqli_real_escape_string($mysqli, $_POST["mail"]);
			$mail = strtolower($mail);
			$sql = "SELECT email_adres FROM users WHERE email_adres = '$mail'";
			$result_mail = mysqli_query($mysqli, $sql);
			if( !preg_match("/^[A-Za-z -]*$/", $first_name) || !preg_match("/^[A-Za-z -]*$/", $last_name)) 
			{
				echo "First and Last name must be only letters";
			}
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
			{
				echo "the E-mail you entred isn't valid";
			}elseif (mysqli_num_rows($result_mail) > 0 )
			{

				echo "The E-mail is already Taken";
			}
			$gender = $_POST['gender'];
			if($gender == 'male')
			{
				$gender = 1;
			}
			elseif($gender == 'female')
			{
				$gender = 0;
			}
			$telephone_number = mysqli_real_escape_string($mysqli, $_POST['tel_num']);
			$street_name = mysqli_real_escape_string($mysqli, $_POST['street_name']);
			$house_number = mysqli_real_escape_string($mysqli, $_POST['house_number']);
			$city = mysqli_real_escape_string($mysqli, $_POST['city']);
			$postcode = mysqli_real_escape_string($mysqli, $_POST['Post_code']);
				if(!preg_match('/^[1-9]{1}[0-9]{3}[A-Z]{2}$/', $postcode)) {
				die("Postal code must be of this format 9999XX");
			}
			$state = mysqli_real_escape_string($mysqli, $_POST['state']);
			$country = mysqli_real_escape_string($mysqli, $_POST['country']);
			$password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

				$query1 = "INSERT INTO addresses(streetname, house_number, city, postal_code, state, country)";
				$query1 .= " VALUES ('$street_name', '$house_number', '$city', '$postcode', '$state', '$country')";
				$controle1 = mysqli_query($mysqli,$query1);
					if ($controle1 == TRUE) {
						echo "";
						}
					
				$query2 = "SELECT MAX(id) AS `id` FROM addresses";
				$fetched_id = mysqli_query($mysqli,$query2);
					if ($fetched_id == TRUE) {

						while($sql_adres_id = mysqli_fetch_assoc($fetched_id))
						{
							$controle2 = $sql_adres_id['id'];
						}
					}

				$query = "INSERT INTO users(first_name, last_name, email_address, telephone_number, gender, address_id, password_hash) ";
				$query .= " VALUES ('$first_name', '$last_name', '$mail', '$telephone_number', '$gender', '$controle2', '$password')";
				$controle = mysqli_query($mysqli,$query);

					if ($controle == TRUE) {
						$sql = "SELECT MAX(id) AS `id` FROM users";
						$fetched_id = mysqli_query($mysqli,$sql);
						if ($fetched_id == TRUE){

						while($sql_adres_id = mysqli_fetch_assoc($fetched_id))
						{
							$user_id = $sql_adres_id['id'];
						}}
						$index="../index.php";
						$_SESSION['loggedin']=true;
						echo "you have signup successfully<br/><br> ";
						echo "<a href=".$index."?id=".$user_id."> Go to home page </a>";

						}
					else
					{
						die("something went wrong please try again");
					}

	}

 require_once(get_document_root() . "/includes/footer.php");
 ?>
