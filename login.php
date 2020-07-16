<?php
	include('functions/login.php'); // Includes Login Script
	if(isset($_SESSION['login_user'])){
		include('functions/session.php');
		if($type_session === 'admin'){
	    	header("location: admin/index.php");
	    }else if($type_session === 'user') {
	    	header("location: index.php");
	    }
	}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body id="loginBody">
	<div id="logo">
		<img src="images/logo.png">
	</div>

	<div id="adDiv">
		<h1>Sign in</h1> <br>
		<form action="" method="POST">
			<input type="email" name="email" id="email" placeholder="Email"> <br>
			<span id="emailspan" class="error"><?php if(isset($_GET['emailErr']))echo $_GET['emailErr']; ?></span> <br>
			<input type="password" name="password" id="password" placeholder="Password"> <br>
			<span id="pswspan" class="error"><?php if(isset($_GET['passwordErr']))echo $_GET['passwordErr']; ?></span> <br>
			<input name="submit" type="submit" id="login" value="Login" onclick="return validate()">

			<!--<span><?php echo $error; ?></span> -->
		</form>
</div>
	<br>
	<p id="rina">Don't have an account?<a href="register.php"> Sign up here</a> !</p>

	<script type="text/javascript">
		
		function validate(){

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

			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

			if(re.test(email)==false && email != ""){
			document.getElementById("emailspan").innerHTML = "Email is not valid";
			}

			if(document.getElementById("emailspan").innerText=="" && document.getElementById("pswspan").innerText==""){
				return true;
			} else {
				return false;
			}
	}
</script>
</body>
</html>
