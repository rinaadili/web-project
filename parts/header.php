<?php
$timestamp = date("YmdHis"); // output: 20150715164614
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Corporate</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo $timestamp;?>">
</head>
<body <?php if($currentPage =='home'){echo 'onload="autoSlideShow()';}?>">
	<div id="wrapper">
		<header id="main-header">
			<div id="brand">
				<img src="images/logo.png">
			</div>
			<nav>
				<ul id="menuList">
					<li><a href="index.php" class="<?php if($currentPage =='home'){echo 'active';}?>">HOME</a></li>
					<li><a href="about.php" class="<?php if($currentPage =='about'){echo 'active';}?>">ABOUT US</a></li>
					<li><a href="services.php" class="<?php if($currentPage =='services'){echo 'active';}?>">SERVICES</a></li>
					<li><a href="#" class="<?php if($currentPage =='gallery'){echo 'active';}?>">GALLERY</a></li>
					<li><a href="contact.php" class="<?php if($currentPage =='contact'){echo 'active';}?>">CONTACT</a></li>
				</ul>
			</nav>
		</header>