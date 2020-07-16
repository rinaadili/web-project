<?php 
$currentPage = 'home';
include('parts/header.php');
require ('database/mysql.php');
$query = "SELECT * FROM `services` ORDER BY `created_date` DESC LIMIT 4";
    $result = $conn->query($query);
    $count =0;
?>
		<section id="slideshow">
			<div id="slideActive" class="slide">
				<img src="images/slide1.png">
				<div class="slideText">
					<h1>CLIENTS & BRAND PR</h1>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
				</div>
				<div class="slideButton">
					<a href="#">Know how we do it ></a>
				</div>
			</div>
			<div class="slide">
				<img src="images/slide2.png">
				<div class="slideText">
					<h1>CLIENTS & BRAND PR</h1>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
				</div>
				<div class="slideButton">
					<a href="#">Know how we do it ></a>
				</div>
			</div>
			<div  class="slide">
				<img src="images/slide3.png">
				<div class="slideText">
					<h1>CLIENTS & BRAND PR</h1>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
				</div>
				<div class="slideButton">
					<a href="#">Know how we do it ></a>
				</div>
			</div>
			<div id="slideBtn">
				<button id="activeB" onclick="slideShow(0)"></button>
				<button onclick="slideShow(1)"></button>
				<button onclick="slideShow(2)"></button>
			</div>
		</section>
		<section id="tipsSearch">
			<div class="tsBox">
				<img src="images/tipsIcon.png">
				<span class="tsSpan">Tips: </span>
				<input type="text" placeholder="1.Lorem ipsum dolor sit amet, consectetur adipisicing elit">
			</div>
			<div class="tsBox">
				<img src="images/searchIcon.png">
				<span class="tsSpan">Search: </span>
				<input type="text" name="Search" placeholder="Keyword">
			</div>
		</section>

		<section id="content">
			<div class="box">
				<?php 
					while($row = $result->fetch_assoc()) { 
						if($count === 0) {
				?>
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
				<?php  }else if($count === 1) {?>
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
			<div class="box"> 
				<?php  } elseif ($count === 2) { ?>
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
				<?php  } elseif ($count === 3) { ?>
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
			<?php } $count++; } ?>
		</div>
		</section>
		<section id="clients">
			<div>
				<img src="images/clients.png">
			</div>
		</section>


<script type="text/javascript">
function slideShow(n){
	var s = document.getElementsByClassName('slide');
	document.getElementById("slideActive").removeAttribute("id");
	s[n].setAttribute("id", "slideActive");


	var b = document.querySelectorAll('#slideBtn > button');
	document.getElementById("activeB").removeAttribute("id");
	b[n].setAttribute("id", "activeB");
}
function autoSlideShow(){
	var i = 0;
	window.onload = setInterval(function(){
		if(i != 3){
			slideShow(i++);
		}else{
			i = 0;
			slideShow(i++);
		}
	}, 8000);
}

</script>

<?php include('parts/footer.php'); ?>