import {user_id,user_key,username} from "./app.js";
document.getElementById("card_name").innerText = username;
var xhr = new XMLHttpRequest();
var url = `../getUser?user_key=${user_id}`; // Replace with your API endpoint
xhr.open("GET", url, true);
xhr.responseType = "json";
xhr.onload = function () {
  if (xhr.status === 200) {
    var response = xhr.response;
    var result = response.result;
    var short_name = result.short_name;
    var page_count = result.page_count;
    let bio = `${username} (${short_name}) has authored ${page_count} page(s).`;
    document.getElementById("bio").innerText = bio;
  } else {
    console.error("XHR request failed with status code:", xhr.status);
  }
};
xhr.send();
