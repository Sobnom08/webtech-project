document.addEventListener("DOMContentLoaded", function() {
  document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Validate input
    if (username.trim() === "") {
      alert("Username cannot be empty!");
      document.getElementById("username").focus();
      return;
    }

    if (password.trim() === "") {
      alert("Password cannot be empty!");
      document.getElementById("password").focus();
      return;
    }

    // Prepare data to send
    var data = {
      username: username,
      password: password
    };

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "loginaction.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
            window.location.href = "booking.php"; // Redirect after successful login
          } else {
            alert("Login unsuccessful. Please check your credentials.");
          }
        } else {
          alert("Error: " + xhr.status);
        }
      }
    };

    xhr.send(JSON.stringify(data));
  });
});
