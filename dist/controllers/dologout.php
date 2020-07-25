<?php 
	ob_start();
	setcookie('employer', password_hash('$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm', PASSWORD_DEFAULT), time() - 86400, '/');
	header('Location: /');
	exit();
	ob_end_flush();