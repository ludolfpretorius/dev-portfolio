<?php require('./dist/controllers/checkuser.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

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
	
	<!-- Nav -->
	<!-- <div id="nav">
		<div id="navWrap">
			<a id="logo" href="/">
				Ludolf Pretorius
			</a>
			<div id="navLinks">
				<ul>
					<li><a href="#"></a></li>
				</ul>
			</div>
		</div>
	</div> -->
		
	<div class="login-content-wrap">
		<img src="./dist/img/avatar.png" alt="avatar">
		<h3>Ludolf Pretorius</h3>
		<p>OooOoo do you know the password? 🤨</p>
		<form action="./dist/controllers/dologin.php" method="POST">
			<div id="inputWrap">
				<input type="password" placeholder="Enter password" name="password" required data-lpignore="true">
				<input type="hidden" name="url" value="" />
				<button type="submit" name="submit" class="submit"><i class="fas fa-sign-in-alt"></i></button>
			</div>
		</form>
		<div class="alert danger" style="opacity: 0"></div>
	</div>

	<?php
		if (isset($_GET["login"]) && $_GET["login"] == 'failed') {
			echo '<script type="text/javascript">';
			echo 'setTimeout(() => {document.querySelector(".alert").classList.add("show")}, 200)';
			echo '</script>';
		}
	?>

	<script>
		const input = document.querySelector('input')
		const hiddenInput = document.querySelector('input[type=hidden]')
		input.focus()
		hiddenInput.setAttribute('value', window.location.search)

		const arr = ['Ooof! Not quite...', 'Ooof! Not quite...', 'Com\'on, type carefully.', 'Are you trying to hack in???', 'Okay, try ";OR 1=1#"']
		const myAlert = document.querySelector('.alert')
		localStorage.attempts = localStorage.attempts ? Number(localStorage.attempts)+1 : 0
		myAlert.innerText = arr[Number(localStorage.attempts)]
		Number(localStorage.attempts) >= 4 ? localStorage.attempts = 0 : ''
	</script>
	<!-- <script src="./dist/js/app.min.js"></script> -->

</body>
</html>