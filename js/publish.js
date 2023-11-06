import {short_name,username,access_token} from "./app.js";
function fetch_pages(){
    var xhr = new XMLHttpRequest();
    var url = `https://api.telegra.ph/getPageList?access_token=${access_token}`; // Replace with your API endpoint
    xhr.open("GET", url, true);
    xhr.responseType = "json";
    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = xhr.response;
        var result = response.result;
        var pages = result.pages;

        // Create a container for the data
        var container = document.getElementById("api-data");
    
        // Loop through the pages and display the information in the div
        pages.forEach(function (page) {
          var pageDiv = document.createElement("div");
          pageDiv.style ="width:50%;padding: 5px; text-align:center; border: 1px solid black; border-radius:10px;"
          pageDiv.innerHTML = "<h3 style='color:blue;>" + page.title + "</h3>" +
            "<p><strong>URL:</strong> <a href='" + page.url + "'>" + page.url + "</a></p-->" +
            "<p><strong></strong> " + page.description + "</p>" +
            "<p><strong>Views:</strong> " + page.views + "</p>" +
            "<p><strong>Can Edit:</strong> " + page.can_edit + "</p>";
    
          container.appendChild(pageDiv);
        });;
      } else {
        console.error("XHR request failed with status code:", xhr.status);
      }
    };
    xhr.send();
  }
let publishForm = document.getElementById("publishForm");

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
    var url = `https://api.telegra.ph/createPage?access_token=${access_token}&author_name=${username}&title=${title}&content=[{"tag":"p","children":["${content}"]}]`; // Replace with your API endpoint
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
  }
});
fetch_pages()