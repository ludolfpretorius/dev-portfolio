<?php
	ob_start();

	$url = isset($_POST['url']) ? substr(filter_var($_POST['url'], FILTER_SANITIZE_STRING), 1) : '';
	$url = $url === 'certs' ? $url.'.php' : '';
	$password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : '';
	$hash = '$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm';
	$query = json_decode(file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR']));

	function writeToFile($filepath, $details) {
		$file = $filepath;
		$currentFileData = file_get_contents($file);
		$currentFileData .= $details . PHP_EOL;
		file_put_contents($file, $currentFileData);
	}

	function logUser() {
		if ($query && $query->status == 'success') {
			$user = $_SERVER['REMOTE_ADDR'].' - '.date("H:i:s d-m-Y").' - '.$query->country.', '.$query->regionName.', '.$query->city.', '.$query->zip.', '.$query->isp.', '.$query->org.', '.$query->as;
			writeToFile('../../logs/users.txt', $user);
		} else {
			$user = $_SERVER['REMOTE_ADDR'].' - '.date("H:i:s d-m-Y");
			writeToFile('../../logs/users.txt', $user);
		}
	}

	function blockUser() {
		if ($query && $query->status == 'success') {
			$user = $_SERVER['REMOTE_ADDR'].' - '.date("H:i:s d-m-Y").' - '.$query->country.', '.$query->regionName.', '.$query->city.', '.$query->zip.', '.$query->isp.', '.$query->org.', '.$query->as;
			writeToFile('../../logs/blocked.txt', $user);
			setcookie('employer', password_hash('$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm', PASSWORD_DEFAULT), time() - 86400, '/');
			header('Location: ../../blocked.php');
			exit();
		} else {
			$user = $_SERVER['REMOTE_ADDR'].' - '.date("H:i:s d-m-Y");
			writeToFile('../../logs/blocked.txt', $user);
			setcookie('employer', password_hash('$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm', PASSWORD_DEFAULT), time() - 86400, '/');
			header('Location: ../../blocked.php');
			exit();
		}
	}
	
	if (isset($_POST['password']) && password_verify($password, $hash)) {
		logUser();
		setcookie('employer', password_hash('$2y$10$.aA.fY9A2EJvrmycUMYd7uQTLmfuCEUrqDI.Kp8XKQLtAqNwB0LHm', PASSWORD_DEFAULT), time() + 86400, '/');
		header('Location: /'.$url);
		exit();
	} elseif (isset($_POST['password']) && preg_match("/<|>|--|#|\/\/|;/i", $_POST['password'], $matchPercentage)) {
		blockUser();
	} elseif (isset($_POST['password']) && !password_verify($password, $hash)) {
		header('Location: /login.php?login=failed', true, 302);
		exit();
	} else {
		blockUser();
	}

	ob_end_flush();