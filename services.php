<?php 
	$currentPage = 'services';
	include('parts/header.php'); 
	require ('database/mysql.php');
	$query = "SELECT * FROM `services` ORDER BY `created_date` DESC";
    $result = $conn->query($query);
    $count =0;
?>
	<section id="servicesHeader">
		<h1>Our Services</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat.</p>
	</section>
	<section id="content">

		<?php while($row = $result->fetch_assoc()) {?>
			<div class="box boxServicePage">
				<div class="inBox">
					<div class="inBoxImg">
						<img src="<?php echo str_replace("../", "", $row['photo']); ?>">
					</div>
					<div class="inBoxText">
						<h3><?php echo $row['title']; ?></h3>
						<p><?php echo $row['description']; ?></p>
						<a href="#" class="btnReadMore">Read More</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</section>
<?php include('parts/footer.php'); ?>