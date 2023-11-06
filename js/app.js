export {short_name,username,access_token};
var short_name = localStorage.getItem("short_name")
var username = localStorage.getItem("author_name");
var access_token = localStorage.getItem("access_token");
function logout(){
	localStorage.clear()
}
if(localStorage.getItem('access_token')== null){
window.location.href = "./login.html"
}
else{
	// alert(`Welcome ${localStorage.getItem('author_name')} !`)
	document.getElementById("username_holder").innerText = `${localStorage.getItem('author_name')}`
}
