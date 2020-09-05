<?php require('./dist/controllers/checkuser.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ludolf</title>

	<link rel="apple-touch-icon" sizes="180x180" href="./fav/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./fav/favicon-16x16.png">
	<link rel="manifest" href="./fav/site.webmanifest">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./dist/css/app.min.css">

	<script type="text/javascript" src="./dist/js/hotjar.js"></script>

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
						<li><a href="#">Home</a></li>
						<li><a href="#projects">Projects</a></li>
						<li><a href="javascript:;" id="logout">Log out</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Banner -->
		<div id="banner">
			<div class="wrap">
				<img src="./dist/img/avatar.png" alt="avatar">
				<h1>
					Hey, I'm Ludolf and I'm pretty much obsessed with code&nbsp;—&nbsp;all I want to do is learn more! 🤩
				</h1>
			</div>
		</div>

		<!-- Projects -->
		<div id="projects">
			<h4>Projects</h4>
			<div class="wrap">

				<div id="projectFilter">
					<div id="tool" class="filter" onclick="genProjects(event)">Tools</div>
					<div id="edTech" class="filter" onclick="genProjects(event), terms()">Ed-tech</div>
					<div id="site" class="filter" onclick="genProjects(event)">Sites</div>
					<div id="fun" class="filter" onclick="genProjects(event)">Fun</div>
				</div>
				<div id="projectsWrap"></div>
				<?php 
					$js = file_get_contents('./db/projects.json');
					echo "<script class=\"script\">
						const projects = $js
						document.querySelector('.script').remove()
					</script>"
				?>
				<script>
					const tools = document.querySelector('#tool')
					function genProjects() {
						const filters = document.querySelectorAll('.filter')
						const proWrap = document.querySelector('#projectsWrap')
						proWrap.innerHTML = ''
						filters.forEach(a => {
							a.classList.remove('show')
							event.currentTarget.classList.add('show')
						})
						projects.forEach(pro => {
							if (pro.type === event.currentTarget.id) {
								const card = `<div class="card">
									<div class="thumb-wrap">
										<div class="overlay" style="opacity: 0">
											${pro.github.length ? `<a href="${pro.github}" target="_blank" class="github">
												<i class="fab fa-github"></i>
											</a>` : ''}
											${pro.url.length ? `<a href="${pro.url}" target="_blank" class="url">
												<i class="fas fa-external-link-alt"></i>
											</a>` : ''}
										</div>
										<img src="./dist/img/${pro.thumb}" alt="thumbnail">
									</div>
									<h3>${pro.name}</h3>
									<p>${pro.description}</p>
								</div>`
								proWrap.insertAdjacentHTML('beforeend', card)
							}
						})
					}
					tools.click()

					function terms() {
						if (!localStorage.accept) {
							if (confirm('\r\nPLEASE NOTE:\r\nThe universities, along with 2U, own the rights to these components. Please do not share them.\r\nBy selecting \"OK\" you agree to never share these components.\r\nA digital acceptance signature will be logged.')) {
								fetch('./dist/controllers/accept.php')
								.then(r => {
									localStorage.accept = true
								})
								.catch(e => {
									alert('Oops! An error occurred. Please try again.\r\n' + e)
									return window.location.reload()
								})
								
							} else {
								tools.click()
							}
						}
					}
				</script>
			</div>
		</div>
		
		<!-- Footer -->
		<div id="footer">
			<!-- <p>More links:</p> -->
			<a href="https://stackoverflow.com/users/11472399/ludolfyn" target="_blank"><i class="fab fa-stack-overflow"></i></a>
			<a href="https://github.com/ludolfpretorius" target="_blank"><i class="fab fa-github"></i></a>
		</div>

	</div>
	
	<script src="./dist/js/app.min.js"></script>
</body>
</html>