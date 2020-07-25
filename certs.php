<?php require('./dist/controllers/checkuser.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Certs</title>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./dist/css/app.min.css">
</head>
<body>

	<div id="siteWrap">
		
		<!-- Nav -->
		<div id="nav">
			<div id="navWrap">
				<a id="logo" href="/">
					Ludolf Pretorius
				</a>
				<div id="navLinks">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/#projects">Projects</a></li>
						<li><a href="/certs.php">Certs</a></li>
						<li><a href="javascript:;" id="logout">Log out</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Certs -->
		<div id="certs">
			<h4>My certificates</h4>
			<div class="wrap">
				<a class="doc" href="./dist/files/LudolfPretorius_ND.pdf" target="_blank">
					<img src="./dist/img/pdf.svg">
					<p>ND - Graphic Design & Illustration</p>
				</a>
				<a class="doc unavailable" onclick="alert('This certificate is unfortunately unavailable')">
					<img src="./dist/img/pdf.svg">
					<p>OCC - HTML, CSS & JQuery</p>
				</a>
				<a class="doc unavailable" onclick="alert('This certificate is unfortunately unavailable')">
					<img src="./dist/img/pdf.svg">
					<p>OCC - PHP Basics</p>
				</a>
				<a class="doc" href="./dist/files/OCC - The Complete Web Developer - ZTM (JS-React-Node-PostgreSQL).pdf" target="_blank">
					<img src="./dist/img/pdf.svg">
					<p>OCC - The Complete Web Developer: ZTM (JS, React, Node, Postgres)</p>
				</a>
				<a class="doc" href="./dist/files/OCC - Advanced JavaScript Concepts.pdf" target="_blank">
					<img src="./dist/img/pdf.svg">
					<p>OCC - Advanced JavaScript Concepts</p>
				</a>
				<a class="doc" href="./dist/files/OCC - Learning Vue.js.pdf" target="_blank">
					<img src="./dist/img/pdf.svg">
					<p>OCC - Learning Vue.js</p>
				</a>
				<a class="doc unavailable" onclick="alert('I am currently in the process of completing this course')">
					<img src="./dist/img/pdf.svg">
					<p>OCC - JavaScript Algorithms and Data Structures Masterclass</p>
				</a>
			</div>
		</div>
		
		<div id="footer">
			<p>Lekker man, lekker!</p>
		</div>
		

	</div>

	<script>
		const certPar = [...document.querySelectorAll('.doc p')]
		function ellips(targ) {
			for (let i = 0; i < targ.length; i++) {
				if (targ[i].innerText.length > 31) {
					targ[i].innerText = targ[i].innerText.slice(0, 31).trim() + '...'
				}
			}
		}
		ellips(certPar)
	</script>
	<script src="./dist/js/app.min.js"></script>

</body>
</html>