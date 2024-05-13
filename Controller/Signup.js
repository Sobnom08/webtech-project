document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("signup");
  console.log('5');

  form.addEventListener("submit", function (event) {
      event.preventDefault(); // Prevent the default form submission

      var formData = new FormData(form); // Create FormData object to send form data
      var jsonData = {}; // Object to store form data in JSON format

      formData.forEach(function (value, key) {
          jsonData[key] = value; // Convert FormData to JSON
      });

      var xhr = new XMLHttpRequest(); // Create new XMLHttpRequest object

      xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  var response = JSON.parse(xhr.responseText); // Parse JSON response

                  if (response.success) {
                      // Redirect to login page on successful signup
                      window.location.href = "login.php";
                  } else {
                      // Display error message
                      document.getElementById("error-message").innerHTML = response.message;
                  }
              } else {
                  console.error("Error:", xhr.status); // Log error if any
              }
          }
      };

      xhr.open("POST", "signup.php", true); // Specify request method, URL, and asynchronous
      xhr.setRequestHeader("Content-Type", "application/json"); // Set request header
      xhr.send(JSON.stringify(jsonData)); // Send JSON data
  });
});

