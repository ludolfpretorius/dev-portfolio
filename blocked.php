<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BLOCKED!</title>
</head>
<body>
	<!-- <iframe src="dist/audio/blocked-users-troll.mp3" allow="autoplay" id="audio" style="opacity: 0"></iframe> -->
	<audio loop autoplay="" >
		<source src="./dist/files/blocked-users-troll.mp3" type="audio/mp3">
	</audio>
	<h1 style="font-family: Arial, sans-serif;text-align: center; margin-top: 100px;">Well well well, if it isn't a malicious actor...<br>
	Enjoy the embarrassment.</h1>
	<a href="#" style="background-color: #448AFF; color: #fff; border-radius: 10px; padding: 16px 10px; margin: auto; font-family: Arial, sans-serif; text-decoration: none; text-align: center; display: block; width: 100px; font-weight: 700">Unblock</a>

	<script>
		localStorage.blocked ?? window.open('/blocked.php', '_blank');
		const noise = document.querySelector('audio')
		setTimeout(() => {
			document.body.appendChild(noise)
			setTimeout(() => {
				localStorage.blocked ?? window.location.reload();
				localStorage.blocked = '1';
			}, 100)
		}, 100);
		document.addEventListener('click', () => {
			noise.play();
			localStorage.clear();
		});
		document.addEventListener('keydown', () => {
			noise.play();
			localStorage.clear();
		})
	</script>
	
</body>
</html>