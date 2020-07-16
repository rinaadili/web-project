<?php include('database/mysql.php');

	$emailErr = $nameErr = $phoneErr = $genderErr = $subjectErr = $textErr = $reachErr = "";
	
	if (isset($_POST['submit'])) {
		$msg = false;
		$name = $_POST['name'];
		$name = mysqli_real_escape_string($conn, $name);
		$email = $_POST['email'];
		$email = mysqli_real_escape_string($conn, $email);
		$phone = $_POST['phone'];
		$subject = $_POST['subject'];
		if(isset($_POST['reach'])){
			$reach = $_POST['reach'];
		}
		if(isset($_POST['gender'])){
			$gender = $_POST['gender'];
		}
		$message = $_POST['message'];
		$message = mysqli_real_escape_string($conn, $message);
		
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		$ph = '/[+]*[0-9]{3}(-)*[0-9]{3}(-)*[0-9]{3}/';
		$n = test_input($name);
		$em = test_input($email);
		$p = test_input($phone);

		if (!preg_match("/^[a-zA-Z ]*$/",$n) && !empty($name)) {
		  $nameErr = "Name can contain only letters!";
		} 
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)){
			$emailErr = "Email is not valid!";
		}
		if(!preg_match($ph,$p) && !empty($phone)){
			$phoneErr = "Phone is not valid!";
		}
		if(empty($name)){
			$nameErr = "Name is required!";
		}
		if(empty($email)){
			$emailErr = "Email is required!";
		}
		if(empty($phone)){
			$phoneErr = "Phone is required!";
		}
		if(empty($subject)){
			$subjectErr = "Subject is required!";
		}
		if(empty($reach)){
			$reachErr = "Reach is required!";
		}
		if(empty($gender)){
			$genderErr = "Gender is required!";
		}
		if(empty($message)){
			$textErr = "Text is required!";
		}
		if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($reach) && !empty($message) && !empty($gender)) {
			$query = "INSERT INTO contactus VALUES ('','$name','$email','$phone','$gender','$subject','$message','$reach')";

			if($conn->query($query) === TRUE) {
				$msg = true;
				
			}
			else {
				echo "Error"; sql . "<br>" ;
			}
		}else {
			header('Location: contact.php?nameErr=' .$nameErr.'&emailErr=' .$emailErr. '&phoneErr=' .$phoneErr.'&subjectErr='.$subjectErr.'&reachErr='.$reachErr.'&textErr='.$textErr .'&genderErr='.$genderErr);
		}	
		
	}
?>