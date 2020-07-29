<?php
	ob_start();
	$filename = './logs/blocked.txt';
	$contents = file($filename);
	foreach($contents as $line) {
	    if (strpos($line, $_SERVER['REMOTE_ADDR']) !== false) {
	    	header('Location: blocked.php', true, 302);
	    	exit();
	    }
	}
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