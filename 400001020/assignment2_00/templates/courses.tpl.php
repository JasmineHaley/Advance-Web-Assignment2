<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=LogOut">Log Out</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		<h1>Courses</h1>
		<ul class="course-list">
			<?php
				foreach ($courses as $k=>$c):	
			?>
			<li><div>
				<a href="#"><img src="images/<?php echo $c[2]?>" alt="<?php echo $c[1]?>"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department"><?php echo $c[0]?></span>	
					<span class="course-title"><?php echo $c[1]?></span>
					<span class="instructor"><?php echo $c[3]?></span></a>
				</div>
				<div>
					<p>Get Curious.</p>
					<a href="#" class="startnow-button startnow-btn">Start Now!</a>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>