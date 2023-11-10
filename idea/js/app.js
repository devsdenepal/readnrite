export {short_name,username,user_key, user_id};
var short_name = localStorage.getItem("short_name")
var username = localStorage.getItem("author_name");
var user_key = localStorage.getItem("user_key");
var user_id = localStorage.getItem("user_id");
function logout(){
	localStorage.clear()
}
if(localStorage.getItem('user_key')== null){
window.location.href = "./login.html"
}
else{
	// alert(`Welcome ${localStorage.getItem('author_name')} !`)
	document.getElementById("username_holder").innerText = `${localStorage.getItem('author_name')}`
}
