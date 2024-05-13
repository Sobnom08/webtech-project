document.addEventListener("DOMContentLoaded", function () {
    var bookingForm = document.getElementById("bookingForm");
  
    bookingForm.addEventListener("submit", function (event) {
        event.preventDefault(); 
  
       
        var formData = new FormData(bookingForm);
  
        
        var jsonData = {};
        formData.forEach(function(value, key){
            jsonData[key] = value;
        });
  
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