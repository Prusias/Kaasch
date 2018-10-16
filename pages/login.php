<?php
session_start();
require ('../includes/ddb_connect.php');


if (!empty($_POST)){

	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	$query = 	"SELECT * FROM usersWHERE email_adres ='" . $email ."'";

	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

	if (mysqli_num_rows($result) > 0){
				$_SESSION["auth"]=true;
				$_SESSION["email"]=$email;
		while($row = mysqli_fetch_assoc($result)) {
		$password_sql = $row['password_hash'];
		$user_id = $row['id'];
		$is_admin = $row['is_admin'];
	}
	if(password_verify($password,$password_sql))
	{

	if(($is_admin == "1")) {
		header("Location: admin.php");
		exit();
	 }
	 elseif(($is_admin =="0")) {
		 header("Location: ../index.php?id=".$user_id."");
         exit();
	 }
	}
}else{

  	$death = "the combination of email and email and password isn't correct
	please make a choice: <br>
	<a href=\"login.php\">login again</a><br>
	<a href=\"signup.php\">make a new account</a><br>";
			die($death);
		}
}


?>
