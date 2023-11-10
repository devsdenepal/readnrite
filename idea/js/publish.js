import {short_name,username,user_key,user_id} from "./app.js";
function fetch_pages(){
    var xhr = new XMLHttpRequest();
    var url = `../api/getPageList?user=${user_id}`; // Replace with your API endpoint
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
          var maxLength = 50; // Set your desired maximum length
          var description = page.description;
          if (page.description.length > maxLength) {
            description = description.substring(0, maxLength) + '...';
          }
          pageDiv.className = "card";
          pageDiv.style ="width: 18rem;";
          pageDiv.innerHTML = `
          <div class="card-body">
    <h1 class="card-title"> ${page.title} </h1>
    <p class="card-text"> ${description}</p> <a href="./edit.html?article=${page.url.replace("https://telegra.ph/","")}"" class="btn btn-primary">Edit</a><a href="./view.html?article=${page.url.replace("https://telegra.ph/","")}"" class="btn btn-secondary">View</a>
    </div>
  </div> 
            `;
          
            // "<p><strong>Can Edit:</strong> " + page.can_edit + "</p>";
    
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
    var url = `../createPage?user_key=${user_key}&author_name=${username}&title=${title}&content=${content}&user_id=${user_id}`; // Replace with your API endpoint
    xhr.open("GET", url, true);
    xhr.responseType = "json";
    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = xhr.response;
        var result = response.result;
        // var url = result.url;
      } else {
        console.error("XHR request failed with status code:", xhr.status);
      }
    };
    xhr.send();
    window.location.reload();
  }
});
fetch_pages()