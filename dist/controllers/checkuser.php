<?php
	$cookie = isset($_COOKIE['employer']) ? $_COOKIE['employer'] : '';
	$hash = '$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm';
	if (isset($_COOKIE['employer']) && password_verify($hash, $cookie)) {
		if (strpos($_SERVER['REQUEST_URI'], '/login.php') !== false) {
			header('Location: /certs.php');
			exit();
		}
	} else {
		if (strpos($_SERVER['REQUEST_URI'], '/certs.php') !== false) {
			header('Location: /login.php');
			exit();
		}
	}