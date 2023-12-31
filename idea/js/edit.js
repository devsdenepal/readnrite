import {short_name,username,user_key} from "./app.js";
const urlParams = new URLSearchParams(window.location.search);
const article = urlParams.get('article');
function fetch_page(){
    var xhr = new XMLHttpRequest();
    var url = `../api/getPage?page_id=${article}&user_key=${user_key}`; // Replace with your API endpoint
    xhr.open("GET", url, true);
    xhr.responseType = "json";
    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = xhr.response;
        var result = response.result;
        document.getElementById("title").value = result.title;
        document.getElementById("content").value = result.description;
    } else {
        console.error("XHR request failed with status code:", xhr.status);
      }
    };
    xhr.send();
}
publishForm.addEventListener("submit", (e) => {
  e.preventDefault();

  let title = document.getElementById("title").value;
  let content = document.getElementById("content").value;

  if (title.value == "" || content.value == "") {
    alert("Ensure you input a value in both fields!");
  } else {
    // perform operation with form input
    //   let title = prompt("Your title: ");
    // let content = prompt("Author name");
    var xhr = new XMLHttpRequest();
    var url = `../api/edit_page${article}?user_key=${user_key}&author_name=${username}&title=${title}&content=${content}`; // Replace with your API endpoint
    xhr.open("GET", url, true);
    xhr.responseType = "json";
    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = xhr.response;
        var result = response.result;
        var url = result.url;
      } else {
        console.error("XHR request failed with status code:", xhr.status);
      }
    };
    xhr.send();
    window.location.reload();
  }
});
fetch_page()