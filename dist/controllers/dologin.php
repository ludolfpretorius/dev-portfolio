<?php
	ob_start();
	$password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : '';
	$hash = '$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm';
	if (isset($_POST['password']) && password_verify($password, $hash)) {
		setcookie('employer', password_hash('$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm', PASSWORD_DEFAULT), time() + 86400, '/');
		header('Location: /certs.php');
		exit();
	} else {
		header("Location: /login.php?login=failed", true, 302);
		exit();
	}
	ob_end_flush();