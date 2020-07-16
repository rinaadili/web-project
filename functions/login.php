<?php
require ('database/mysql.php');

session_start();
$error = '';
$emailErr = $passwordErr = '';
if (isset($_POST['submit'])) {

	
		$email = $_POST['email'];
		$password = $_POST['password'];

		function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
		}

		$em = test_input($email);

		if(empty($email)){
			$emailErr = "Email should not be empty!";
			header('Location: login.php?emailErr=' .$emailErr );
		}
		if(empty($password)){
			$passwordErr = "Password should not be empty!";
			header('Location: login.php?passwordErr=' .$passwordErr );
		}
		if(!empty($email) && !empty($password)){
			$query = "SELECT email,password,type from user where email=?";

			// To protect MySQL injection for Security purpose
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email,$pw,$type);
			$stmt->store_result();
			$user = $stmt->fetch();
		
			if($user > 0) {
				if(password_verify($password, $pw)){
				    $_SESSION['login_user'] = $email;
				    if($type === 'admin'){
				    	header("location: ../admin/index.php");
				    }else if($type === 'user') {
				    	header("location: ../index.php");
				    }
				}else {
					$passwordErr = "Password is incorrect!";
					header('Location: login.php?passwordErr=' .$passwordErr );
				}
	        }
			else {
				$emailErr = "Account does not exist!";
				header('Location: login.php?emailErr=' .$emailErr );
			}
		}
	}
?>
