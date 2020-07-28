<?php require('./dist/controllers/checkuser.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ludolf</title>
	
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
					document.querySelector('#tool').click()

					function terms() {
						if (!localStorage.accept) {
							if (confirm('Please note that the universities own the rights to these—please do not share them. By selecting \"OK\", you agree.')) {
								localStorage.accept = true
							} else {
								document.querySelector('#tool').click()
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