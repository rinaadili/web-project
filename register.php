<?php
	include('functions/register.php'); //
	$timestamp = date("YmdHis"); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo $timestamp;?>">
</head>
<body id="loginBody">
<div id="regDiv" >
	<h1>Sign up</h1> <br>
	<form method="post"  action="">
		<span id="fnspan" class="error"><?php if(isset($_GET['nameErr']))echo $_GET['nameErr']; ?></span>
		<input type="text" name="name" placeholder="First Name" id="fname"><br>
		<span id="lnspan" class="error"><?php if(isset($_GET['lastnameErr']))echo $_GET['lastnameErr']; ?></span>
		<input type="text" name="surname" placeholder="Last Name" id="surname"><br>
		<span id="emailspan" class="error"><?php if(isset($_GET['emailErr']))echo $_GET['emailErr']; ?></span>
		<input type="email" name="email" placeholder="Email" id="email"><br>
		<span id="pswspan" class="error"><?php if(isset($_GET['passwordErr']))echo $_GET['passwordErr']; ?></span>
		<input type="password" name="password" placeholder="Password" id="password"><br>
		<span id="pswconfspan" class="error"><?php if(isset($_GET['confPassword']))echo $_GET['confPassword']; ?></span>
		<input type="password" name="confPassword" placeholder="Confirm Password" id="confpass"><br>
		<span id="termsspan" class="error"></span> 
		<input type="checkbox" name="terms" value="Terms" id="terms">I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a>.
		<br>
		<input type="submit" name="submit" value="Register" onclick="return validate()">
	</form>
</div>
	<script type="text/javascript">		
		function validate(){
			name = document.getElementById("fname").value;

			if (name == "") {
					document.getElementById("fnspan").innerHTML = "Name is required";
			}else{
				document.getElementById("fnspan").innerHTML = "";
			}
			
			var surname = document.getElementById("surname").value;

			if (surname == "") {
					document.getElementById("lnspan").innerHTML = "Surname is required";
			}else{
				document.getElementById("lnspan").innerHTML = "";
			}

			var email = document.getElementById("email").value;

			if (email == "") {
					document.getElementById("emailspan").innerHTML = "Email is required";
			}else{
				document.getElementById("emailspan").innerHTML = "";
			}

			var password = document.getElementById("password").value;

			if (password == "") {
					document.getElementById("pswspan").innerHTML = "Password is required";
			}else{
				document.getElementById("pswspan").innerHTML = "";
			}

			var confirmpass = document.getElementById("confpass").value;

			if (confirmpass == "") {
					document.getElementById("pswconfspan").innerHTML = "Password confirmation is required";
			}else{
				document.getElementById("pswconfspan").innerHTML = "";
			}

			var terms = document.getElementById("terms").checked;

			if(terms==false){
				document.getElementById("termsspan").innerHTML = "You must accept the terms and conditions!";
			}else{
				document.getElementById("termsspan").innerHTML = "";
			}

			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

			if(re.test(email)==false && email != ""){
			document.getElementById("emailspan").innerHTML = "Email is not valid";
			}

			if(password != "" && (password.length < 8 || password.length > 16)){
			document.getElementById("pswspan").innerHTML = "Password should be between 8-16 letters";
			}
			if((password != "" && confirmpass != "") && password!=confirmpass){
				document.getElementById("pswconfspan").innerHTML = "Password confirmation doesn't match the password";
			}


			if(document.getElementById("emailspan").innerText=="" && document.getElementById("pswspan").innerText==""
				&& document.getElementById("pswconfspan").innerText=="" && document.getElementById("fnspan").innerText==""
				&& document.getElementById("lnspan").innerText=="" && document.getElementById("termsspan").innerText==""){
				return true;
			} else {
				return false;
			}
	}
</script>
</body>
</html>

	

