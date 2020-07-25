<?php
	ob_start();
	$cookie = isset($_COOKIE['employer']) ? $_COOKIE['employer'] : '';
	$hash = '$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm';
	if (isset($_COOKIE['employer']) && password_verify($hash, $cookie)) {
		if (strpos($_SERVER['REQUEST_URI'], '/login.php') !== false) {
			header("Location: /");
			exit();
		}
	} else {
		if (strpos($_SERVER['REQUEST_URI'], '/login.php') === false) {
			header('Location: /login.php?'.explode('.', substr($_SERVER['REQUEST_URI'], 1))[0]);
			exit();
		}
	}
	ob_end_flush();