const logout = document.querySelector('#logout');
logout.addEventListener('click', () => {
	fetch('./dist/controllers/dologout.php')
	.then(() => window.location.reload())
	.catch(e => {
		alert('Oops! An error occurred. Please try again.\r\n' + e)
		return window.location.reload()
	})
})