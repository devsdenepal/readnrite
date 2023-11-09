import {access_token,username} from "./app.js";
const urlParams = new URLSearchParams(window.location.search);
const article = urlParams.get('article');
var xhr = new XMLHttpRequest();
var url = `https://api.telegra.ph/getPage/${article}`; // Replace with your API endpoint
xhr.open("GET", url, true);
xhr.responseType = "json";
xhr.onload = function () {
  if (xhr.status === 200) {
    var response = xhr.response;
    var result = response.result;
    document.getElementById("container").innerHTML =
    `
    <h1>${result.title}</h1>
    <h6>${result.author_name}</h6>
    <b> ${result.views} view(s)</b>
    <p>${result.description}</p>
    `
  } else {
    console.error("XHR request failed with status code:", xhr.status);
  }
};
xhr.send();
