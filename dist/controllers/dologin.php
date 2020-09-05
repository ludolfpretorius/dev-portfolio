<?php
	error_reporting(E_ALL);
	ob_start();
	include './utils.php';

	$url = isset($_POST['url']) ? substr(filter_var($_POST['url'], FILTER_SANITIZE_STRING), 1) : '';
	$url = $url === 'certs' ? $url.'.php' : '';
	$password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : '';
	$hashes = json_decode(file_get_contents('../../db/hashes.json'));
	
	if (isset($_POST['password']) && password_verify($password, $hashes->user)) {
		logUser('../../logs/users.txt');
		setcookie('employer', password_hash($hashes->cookie, PASSWORD_DEFAULT), time() + 86400, '/');
		header('Location: /'.$url);
		exit();
	} elseif (isset($_POST['password']) && preg_match("/<|>|--|#|\/\/|;/i", $_POST['password'])) {
		blockUser('../../logs/blocked.txt', 'employer', '../../blocked.php');
	} elseif (isset($_POST['password']) && !password_verify($password, $hash)) {
		header('Location: /login.php?login=failed', true, 302);
		exit();
	} else {
		blockUser('../../logs/blocked.txt', 'employer', '../../blocked.php');
	}
	
	ob_end_flush();