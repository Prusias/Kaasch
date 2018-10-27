<?php
	require_once("../document_root.php");

	require_once(get_document_root() . "/includes/header.php");
	get_header('kaasch', '');

	require ('../includes/ddb_connect.php');
	session_start();

	if (!($_SERVER["REQUEST_METHOD"] == "POST")){

?>
		<body bgcolor = #EDB91F>
		<center>
		<form action="signup.php" method="post">
		<h2> Making a new account</h2>
		All fields are mandatory
		<hr />
		<table bgcolor= #f8c467>
		<tr><td>first name:</td><td><input type = "text" name = "first_name" pattern=".{2,}"   required title="the first name must be at least two letters"></td></tr>
		<tr><td>Last name:</td><td><input type = "text" name = "last_name" pattern=".{2,}"   required title="the last name must be at least two letters"></td></tr>
		<tr><td>E-mail:</td><td><input type = "text" name = "mail"></td></tr>
		<tr><td>Gender : </td><td><input type="radio" name="gender" value="male" checked> Male<br>
			<input type="radio" name="gender" value="female"> Female<br></tr>
		<tr><td> Telephone:</td><td> <input type="tel" name="tel_num" pattern=".{10,}"   required title="10 numbers minimum"></td></tr>
		<tr><td>street name:</td><td><input type = "text" name = "street_name" pattern=".{3,}"   required title="3 characters minimum"></td> </tr>
		<tr><td>house number:</td><td><input type = "text" name = "house_number" pattern=".{1,}"   required title="at least one number"></td> </tr>
		<tr><td>Postal code:</td><td> <input type = "text" name = "Post_code" ></td></tr>
		<tr><td>City:</td><td> <input type = "text" name = "city" pattern=".{2,}"   required title="the city name must be at least two letters"></td></tr>
		<tr><td>State:</td><td> <input type="text" name="state"></td></tr>
		<tr><td> Country:</td><td> <input type = "text" name = "country" pattern=".{2,}"   required title="the country name must be at least two letters"></td></tr>
		<tr><td>Password:</td><td><input type = "password" name = "pwd" pattern=".{6,}"   required title="the password must be at least 6 characters"></td></tr>
		</table><p>
				<input type="submit" value="signup" />
		</form>
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
				die("The name must only be letters");
			}
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
			{
				die("email isn't valid");
			}elseif (mysqli_num_rows($result_mail) > 0 )
			{

				die("email is taken");
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
					//else
					//{
					//	die("error adding address");
					//}
				$query2 = "SELECT MAX(id) AS `id` FROM addresses";
				$fetched_id = mysqli_query($mysqli,$query2);
					if ($fetched_id == TRUE) {

						while($sql_adres_id = mysqli_fetch_assoc($fetched_id))
						{
							$controle2 = $sql_adres_id['id'];
						}
					}//else{
					//	die("didn't work");
					//}

				$query = "INSERT INTO users(first_name, last_name, email_adres, telephone_number, sex, address_id, password_hash) ";
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
					//	$_SESSION['loggedin'] == true;
						echo "you have signup successfully<br/><br> ";
						echo "<a href=".$index."?id=".$user_id."> Go to home page </a>";

						}
					else
					{
						die("error adding user");
					}

	}

 require_once(get_document_root() . "/includes/footer.php");
 ?>
