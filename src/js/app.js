const logout = document.querySelector('#logout');
logout.addEventListener('click', () => {
  fetch('./dist/controllers/dologout.php')
  .then(() => window.location.reload())
})