<?php 
	$currentPage = 'about';
	include('parts/header.php');
	require ('database/mysql.php');
	$query = "SELECT * FROM `aboutusemp`";
    $result = $conn->query($query);
    $query2 = "SELECT * FROM `aboutustext`";
    $result2 = $conn->query($query2);
    $row2 = $result2->fetch_assoc();
?>
<section id="aboutHeader">
	<h1>Who we are?</h1>
	<p><?php echo $row2['subtext']; ?></p>
</section>	
<section id="aboutMain">
	<?php echo $row2['text']; ?>
</section>

<section id="teamText">
	<h1>Our amazing team</h1>
	<p><?php echo $row2['teamText']; ?></p>
</section>	
<section id="aboutTeam">
	<?php while($row = $result->fetch_assoc()) {  ?>
			<div class="block">
				<img src="<?php echo str_replace("../", "", $row['photo']); ?>">
				<h3><?php echo $row['name']; ?></h3>
				<span><?php echo $row['title']; ?></span>
				<p><?php echo $row['description']; ?></p>
			</div>
	<?php }?>
	<div class="block">
		<img src="images/addTeam.png">
		<h3>You?</h3>
		<span>WE'RE HIRING</span>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor.</p>
	</div>
</section>
<?php include('parts/footer.php'); ?>