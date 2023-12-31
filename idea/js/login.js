let loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();

  let shortname = document.getElementById("shrtnm").value;
  let author_name = document.getElementById("flnm").value;

  if (shortname.value == "" || author_name.value == "") {
    alert("Ensure you input a value in both fields!");
  } else {
    // perform operation with form input
    //   let shortname = prompt("Your shortname: ");
    // let author_name = prompt("Author name");
    var xhr = new XMLHttpRequest();
    var url = `../api/createAccount?short_name=${shortname}&author_name=${author_name}`; // Replace with your API endpoint
    xhr.open("GET", url, true);
    xhr.responseType = "json";
    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = xhr.response;
        var result = response.result;
        var shortName = result.short_name;
        var authorName = result.author_name;
        var accessToken = result.user_key;
        var user_id = result.user_id;
        localStorage.setItem("short_name", shortName);
        localStorage.setItem("author_name", authorName);
        localStorage.setItem("user_key", accessToken);
        localStorage.setItem("user_id", user_id);
        window.location.href = "index.html";
      } else {
        console.error("XHR request failed with status code:", xhr.status);
      }
    };
    xhr.send();
  }
});
