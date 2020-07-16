<?php
	include('functions/contactPost.php');
	$currentPage = 'contact';
	include('parts/header.php');
	if (isset($_POST['submit'])) {
		echo $name;
	}
?>
	<section id="contactHeader">
		<h1>Contact Us</h1>
		<p>Got a question? We'd love to hear from you.Send us a message and we'll respond as soon as possible !</p>
	</section>

	<div id="contactdiv">
		<form id="contactForm" name="cForm" method="post">	
			<label>Name:</label> <input  type="text" name="name" id="name"><br>
			<span id="namespan" class="error"><?php if(isset($_GET['nameErr']))echo $_GET['nameErr']; ?></span> <br>
			<label>Email Address:</label> <input  type="text" name="email" id="email"><br>
			<span id="emailspan" class="error"><?php if(isset($_GET['emailErr']))echo $_GET['emailErr']; ?></span> <br> 
			<label>Phone:</label> <input type="tel" name="phone" id="phone" id="phone"> <br>
			<span id="phonespan" class="error"><?php if(isset($_GET['phoneErr']))echo $_GET['phoneErr']; ?></span> <br>
			<label>Gender:</label> <input type="radio" name="gender" value="male" id="male" id="male"> Male
	  				<input type="radio" name="gender" value="female" id="female" id="female"> Female <br>
	  		<span id="genderspan" class="error"><?php if(isset($_GET['genderErr']))echo $_GET['genderErr']; ?></span> <br>
	  		<label>Subject:</label> <select name="subject" id="subject">
			  <option value="customerService" id="customerService">Customer Service</option>
			  <option value="subject2" id="subject2">Subject2</option>
			  <option value="subject3" id="subject3">Subject3</option>
			  <option value="other" id="other">Other</option>
			</select> <br>
			<span id="subjectspan" class="error"><?php if(isset($_GET['subjectErr']))echo $_GET['subjectErr']; ?></span> <br>
			<label>Message:</label>
			<textarea name="message" id="text"></textarea><br>
			<span id="messagespan" class="error"><?php if(isset($_GET['textErr']))echo $_GET['textErr']; ?></span> <br>
			<div style="margin-left: 40px;">
				What is the best way to reach you?<br>
				<input  type="checkbox" name="reach" value="Phone" id="phone1"> Phone
				<input type="checkbox" name="reach" value="Email" id="email1"> Email <br>
				<span id="reachspan" class="error" style="margin-left: 110px;"><?php if(isset($_GET['reachErr']))echo $_GET['reachErr']; ?></span> <br>
			</div>
			<button type="submit" id="subButton" name="submit" onclick="return validate()">Send message</button>
		</form>

		<p id="par"></p>
	</div>

	<div id="address">
		<h2>Where to find us</h2> <br>
		<p>Primary address: Campus Northen Arizona 2002 S.Avenue 80E,Yuma,AZ 85365</p> <br>
		<p>Phone: (892) 403 289</p>
	</div>

<?php include('parts/footer.php'); ?>

<script type="text/javascript">

		function validate(){
		name = document.getElementById("name").value;
		 if(name == "") {
				document.getElementById("namespan").innerHTML = "Name is required";
		}else{
			document.getElementById("namespan").innerHTML = "";
		}
		
		var email = document.getElementById("email").value;
		if (email == "") {
				document.getElementById("emailspan").innerHTML = "Email is required";
		}else{
			document.getElementById("emailspan").innerHTML = "";
		}

		var male = document.getElementById("male").checked;
		var female = document.getElementById("female").checked;
		if(male==false && female==false){
			document.getElementById("genderspan").innerHTML = "Gender is required";
		}else{
			document.getElementById("genderspan").innerHTML = "";
		}

		var customerService = document.getElementById("customerService").checked;
		var subject2 = document.getElementById("subject2").checked;
		var subject3 = document.getElementById("subject3").checked;
		var other = document.getElementById("other").checked;

		if(customerService==false && subject2==false && subject3==false && other==false){
			document.getElementById("subjectspan").innerHTML = "Subject is required";
		}else{
			document.getElementById("subjectspan").innerHTML = "";
		}

		var phone = document.getElementById("phone").value;

		if (phone == "") {
				document.getElementById("phonespan").innerHTML = "Phone is required";
		}else{
			document.getElementById("phonespan").innerHTML = "";
		}

		message = document.getElementById("text").value;

		if (message == "") {
				document.getElementById("messagespan").innerHTML = "Message is required";
		}else{
			document.getElementById("messagespan").innerHTML = "";
		}

		var phone1 = document.getElementById("phone1").checked;
		var email1 = document.getElementById("email1").checked;

		if(phone1==false && email1==false){
			document.getElementById("reachspan").innerHTML = "Reaching method is required";
		}else{
			document.getElementById("reachspan").innerHTML = "";
		}

		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		if(re.test(email)==false && email != ""){
			document.getElementById("emailspan").innerHTML = "Email is not valid";
		}

		var ph = /[+]*[0-9]{3}(-)*[0-9]{3}(-)*[0-9]{3}/;
		if(ph.test(phone)==false && phone != ""){
			document.getElementById("phonespan").innerHTML = "Phone is not valid";
		}

		var r = /^[a-zA-Z ]*$/;
		if(r.test(name)==false && name != ""){
			document.getElementById("namespan").innerHTML = "Name can contain only letters!";
		}

		if(document.getElementById("namespan").innerText=="" && document.getElementById("messagespan").innerText=="" && 
			document.getElementById("emailspan").innerText=="" && document.getElementById("reachspan").innerText=="" && 
			document.getElementById("subjectspan").innerText=="" && document.getElementById("genderspan").innerText=="" 
			&& document.getElementById("phonespan").innerText==""){
			document.getElementById("par").innerHTML = "Form submitted";
		} else {
			return false;
		}
	}
</script>
