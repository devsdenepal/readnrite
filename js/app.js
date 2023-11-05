
if(localStorage.getItem('access_token')== null){
window.location.href = "./login.html"
}
else{
	alert(`Welcome ${localStorage.getItem('author_name')} !`)
	document.getElementById("username_holder").innerText = `${localStorage.getItem('author_name')}`
}