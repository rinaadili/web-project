<?php include('database/mysql.php'); 
$nameErr = $lastnameErr = $emailErr = $passwordErr = $confPassword = "";
if (isset($_POST['submit'])) {
	$firstname = $_POST['name'];
	$lastname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confPassword = $_POST['confPassword'];
	$hashed_password = password_hash($password,PASSWORD_DEFAULT);

		function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
		}

		$n = test_input($firstname);
		$s = test_input($surname);
		$em = test_input($email);

		if (empty($firstname)) {
		  	$nameErr = 'Name should not be empty!';
		  	header('Location: register.php?nameErr=' .$nameErr );
		}
		else if (empty($lastname)) {
			$lastnameErr = 'Last name should not be empty!';
		 	header('Location: register.php?lastnameErr=' .$lastnameErr );
		}
		else if(empty($email)){
			$emailErr = "Email should not be empty!";
			header('Location: register.php?emailErr=' .$emailErr );
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$n)){
			$nameErr = 'Name can contain only letters!';
		  	header('Location: register.php?nameErr=' .$nameErr );
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$l)){
			$lastnameErr = 'Last name can contain only letters!';
		 	header('Location: register.php?lastnameErr=' .$lastnameErr );
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailErr = "Email is not valid!";
			header('Location: register.php?emailErr=' .$emailErr );
		}
		else if(empty($password)){
			$passwordErr = "Password should not be empty!";
			header('Location: register.php?passwordErr=' .$passwordErr );
		}
		else if(strlen($password) < 8){
			$passwordErr = " Passwords must be at least 8 characters long!";
			header('Location: register.php?passwordErr=' .$passwordErr );
		}
		else if($password !== $confPassword){
			$confPassword = " Password confirmation doesn't match the password!";
			header('Location: register.php?confPassword=' .$confPassword );
		}
		else{
			$query = "SELECT email from user where email=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email1);
			$stmt->store_result();
			$user = $stmt->fetch();
			if($user > 0){
				$emailErr = "A user with this email address already exists!";
				header('Location: register.php?emailErr=' .$emailErr );
			}else {
				$query = "INSERT INTO user (name,surname,email,password)
				VALUES ('$firstname','$lastname','$email','$hashed_password')";

				if($conn->query($query) === TRUE) {
					header('Location: login.php');
				}
				else {
					echo  "<script>alert('Mistake');</script>";
				}
			}
		}
		
}
?>