<?php require('./dist/controllers/checkuser.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./dist/css/app.min.css">
</head>
<body>
	
	<!-- Nav -->
	<div id="nav">
		<div id="navWrap">
			<a id="logo" href="/">
				Ludolf Pretorius
			</a>
			<div id="navLinks">
				<ul>
					<li><a href="/">Home</a></li>
				</ul>
			</div>
		</div>
	</div>
		
	<div class="login-content-wrap">	
		<h3>My certs</h3>
		<p>Please enter the password</p>
		<form action="./dist/controllers/dologin.php" method="POST">
			<div id="inputWrap">
				<input type="password" placeholder="Enter password" name="password" required data-lpignore="true">
				<button type="submit" name="submit" class="submit"><i class="fas fa-sign-in-alt"></i></button>
			</div>
		</form>
		<div class="alert danger" style="opacity: 0">Oops! The password you entered is incorrect.</div>
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
		input.focus()		
	</script>
	<script src="./dist/js/app.min.js"></script>

</body>
</html>