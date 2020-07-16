<?php
	require '../database/mysql.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../login.php"); // Redirecting To Home Page
    }else if($type_session === 'user') {
		header("location: ../index.php");
	}
    $query = "SELECT * from services";
    $result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	 <div id="topbar">
        <a href="#"><img src="../images/logo.png"></a>
        <p><a href="../functions/logout.php">Log Out</a></p>
        <p>Welcome: <?php echo $login_session; ?></p>
    </div>

	<div id="sidebar">
		<ul>
			<li><a href="#">Dashboard</a></li>
			<li><a href="../CRUD/services.php">Services</a></li>
			<li><a href="../CRUD/about.php">About us</a></li>
			<li><a href="#">Profile</a></li>

		</ul>
	</div>
</body>
</html>