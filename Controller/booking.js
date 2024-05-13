document.addEventListener("DOMContentLoaded", function () {
    var bookingForm = document.getElementById("bookingForm");
  
    bookingForm.addEventListener("submit", function (event) {
      event.preventDefault(); // Prevent the form from submitting normally
  
      // Collect form data
      var formData = new FormData(bookingForm);
  
      // Additional JSON data
      var additionalData = {
        "key1": "value1",
        "key2": "value2"
      };
  
      // Convert form data to JSON
      var jsonData = {};
      formData.forEach(function(value, key){
        jsonData[key] = value;
      });
  
      // Merge additional JSON data with form data
      Object.assign(jsonData, additionalData);
  
      // Send data to server
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../CONTROLLER/bookingaction.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");
  
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          // Handle response here
          console.log(response);
        }
      };
  
      xhr.send(JSON.stringify(jsonData));
    });
  
    // Other JavaScript code if needed
  });
  