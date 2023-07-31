getAllMessage() 

let tomail;
let usermail='Admin';
let is_replied=0;
let user_type="Admin";
let uemail;

function getAllMessage() {
    $.ajax({
      method: "GET",
      url: "http://localhost:8080/message/lastmessage",
      success: function(data) {
        // Clear existing table rows
        $('#chatlistnew').empty();
  
        // Loop through the array and create table rows dynamically
        for (let i = 0; i < data.length; i++) {
          let msg = data[i];
          let id = msg.id;
          uemail = msg.user_email;
          let messageto = msg.message_to;
          let umessage = msg.message;
          let time = msg.received_time;
          let dare = msg.received_date;
          let isReply=msg.is_replied;
          let userType=msg.user_type;

          let customerName= getCustomerDetails(uemail);

          

        
         
          // Define the chatMessageElement as a template literal
            let chatMessageElement = `
            <div id="chatDiv" class="imgBox">
                <img src="img/images/avatar.png" class="cover" alt="">
            </div>
            <div class="details" id="chatlist">
                <div class="listHead">
                    <h5>${customerName}</h5>
                    <p class="time">${time}</p>
                </div>
                <div class="message_p">
                    <p>${umessage}</p>
                </div>
            </div>
            `;

            // Append the chatMessageElement to the chatContainer
            $('#chatlistnew').append(chatMessageElement);

            // Add a click event to the chatDiv
            $('#chatlist').on('click', function() {
            // Get the customerName from the chatMessageElement
            const customerName = $(this).find('h5').text();

            // Update the name in the header
            $('.imgText h4').html(customerName + '<br><span>online</span>');
            });

            $('#chatlist').on('click', myClickHandler);



                    }
                  },
                  error: function(xhr, status, error) {
                    // Handle the error response
                    console.log("Error:", error);
                  }
                });
  } 

  function myClickHandler() {
    $.ajax({
      method: "GET",
      url: "http://localhost:8080/message/getAllMessage/"+uemail,
      success: function(data1) {
        // Clear existing table rows
        $('.chatbox').empty();
        tomail=uemail;
        // Loop through the array and create table rows dynamically
        for (let i = 0; i < data1.length; i++) {
          let msg1 = data1[i];
          let id1 = msg1.id;
          let messageto1 = msg1.message_to;
          let umessage1 = msg1.message;
          let time1 = msg1.received_time;
          let dare1 = msg1.received_date;
          let isReply1=msg1.is_replied;
          let userType1=msg1.user_type;


          let chatMessage;
          if (messageto1 === "Admin") {
            // The value of `messageto1` is equal to "admin"
           // Your existing code for creating the chatMessage
           chatMessage = `<div class="message my_msg"><div class="message-block"><p>${umessage1}<br><span>${time1}</span></p></div></div>`;
          } else {
            // The value of `messageto1` is not equal to "admin"
            chatMessage = `<div class="message friend_msg"><div class="message-block"><p>${umessage1}<br><span>${time1}</span></p></div></div>`;
          }

          // Append the chatMessageElement to the existing chatContainer
          $('.chatbox').append(chatMessage);

        }

        },
        error: function(xhr, status, error) {
          // Handle the error response
          console.log("Error:", error);
        }
      });

  }

  function  getCustomerDetails(cuemail) {
    var cusname;
    
    $.ajax({
      method: "GET",
      url: "http://localhost:8080/customer/getCustomer/" + cuemail,
      async: false,
      success: function(data1) {
        if (data1 != null) {
          
          cusname = data1;
             
        }
      },
      error: function(xhr, status, error) {
        console.log("Error:", error);
      }
    });
    return cusname;
    //alert(cusname);
    
  
  }

// Your JavaScript code - Function Definition
function sendMessage() {
  // Get the user input from the messageInput element
  const userInput = document.getElementById('messageInput').value;

  // Check if the user input is not empty
  if (userInput.trim() !== '') {
    // Send the message (you can replace this with any action you want)
    


    const currentDate = new Date();

    // Get the individual components of the date (year, month, day)
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based, so we add 1
    const day = String(currentDate.getDate()).padStart(2, '0');

    // Format the date as "YYYY-MM-DD"
    const formattedDate = `${year}-${month}-${day}`;
    

    // Create a new Date object to get the current time
    const currentTime = new Date();

    // Get the individual components of the time (hour, minute)
    const hours = String(currentTime.getHours()).padStart(2, '0');
    const minutes = String(currentTime.getMinutes()).padStart(2, '0');

    // Format the time as "HH:MM"
    const formattedTime = `${hours}:${minutes}`;

    if (typeof tomail === 'undefined' || tomail === '') {
      swal({
        title: "Error!",
        text: "Can't Identified User",
        button: {
          className: "custom-button-class",
        },
      }).then(() => {
        $('#vid').focus(); // Focus on the invalid field
      });
      return;
    }

    let formData = new FormData();
    formData.append("user_email", usermail);
    formData.append("message_to", tomail);
    formData.append("message", userInput);
    formData.append("received_time", formattedTime);
    formData.append("received_date", formattedDate);
    formData.append("is_replied", is_replied);
    formData.append("user_type", user_type);


    $.ajax({
      method: "POST",
      url: "http://localhost:8080/message/msgSave",
      processData: false,
      contentType: false,
      data: formData,
      success: function (data) {
       
        myClickHandler() 

      },
      error: function (xhr, exception) {
        alert("Error occurred while send message");
      }
    });
    
    // Clear the input field after sending the message
    document.getElementById('messageInput').value = '';
  }
}

