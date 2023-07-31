
// function saveEmployee(){

//       alert()
//     var fname=$('#fname').val();
//     var lname=$('#lname').val();
//     var email=$('#email').val();
//     var pass=$('#pass').val();




//  $.ajax({
//     method: "POST",
//     contentType: "application/json",
//     url:"http://localhost:8080/api/auth/register",
//     async:true,
//     data:JSON.stringify({
      
        
//         "firstname":fname,
//         "lastname":lname,
//         "email":email,
//         "password":pass,

    

    
//     }),
//     success:function(data){
//         alert("saved");
//         resetForm();
        
//     },
//     error:function(xhr,status,error){
//         if (error.hasOwnProperty('message')) {
//             alert("Error Message: " + error.message);
//           } else {
//             alert("Unknown Error Occurred");
//           }
//     }
//  })

// }

function saveEmployee() {
    var fname = $('#names').val();
    var nic = $('#nic').val();
    var email = $('#email').val();
    var add = $('#address').val();
    var pnum = $('#pnumber').val();
    var pass = $('#pass').val();
    var con = $('#con').val();
    var role="Admin";


    // Reset error messages
    $('.error-text').text('');

    // Validate first name and last name
    // if (fname.trim() === '') {

    //     swal({
    //         title: "First name is required",
    //         button: {
    //           className: "custom-button-class",
    //         },
    //       });
        
       
    //     return;
    // }
    // if (nic.trim() === '') {
    //     swal({
    //         title: "Last name is required",
    //         button: {
    //           className: "custom-button-class",
    //         },
    //       });
      
    //     return;
    // }

    // Validate password and confirm password
    if (pass !== con) {
        swal({
            title: "Passwords do not match",
            button: {
              className: "custom-button-class",
            },
          });
      
        return;
    }

    // Send AJAX request
    $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/admin/save",
        async: true,
        data: JSON.stringify({
            "name": fname,
            "nic": nic,
            "email": email,
            "phone":pnum,
            "address":add,
            "password": pass,
            
        }),
        success: function (data) {

            swal({
                title: "Good job!",
                text: "Registed!",
                icon: "success",
                button: "OK!",
              })
       
            resetForm();
        },
        error: function (xhr, status, error) {
            if (error.hasOwnProperty('message')) {
                alert("Error Message: " + error.message);
            } else {
                alert("Unknown Error Occurred");
            }
        }
    });
}







function LogEmployee(){
    

       var username = $('#username').val();
       var password = $('#password').val();



    //  getUserDetails(username);

      
            
            $.ajax({
                url:"http://localhost:8080/admin/getCustomer?email="+username+"&password="+password,
                type: 'GET',
                success: function(data) {
                  var name=data;
                  window.location.href = "index.html"+"?id=" + encodeURIComponent(name) ;
                },
                error: function(xhr,status,error) {
                    swal({
                        
                        text: "login failed!",
                        icon: "warning",
                        button: "OK!",
                      })
               
                }
            });
            

}



function resetForm() {
    document.getElementById("fname").value = "";
    document.getElementById("lname").value = "";
    document.getElementById("email").value = "";
    document.getElementById("pass").value = "";
    document.getElementById("con").value = "";
  }


  function resetFormLogin() {
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
  }


// Get user details according to the email
function getUserDetails(email) {


  $.ajax({
    method: "GET",
    url: "http://localhost:8080/api/user/getUser/" + email,
    async: true,
    success: function (data) {
      if (data.length > 0) {
        let id = data[0].id;
        let name = data[0].firstname;
        let lname = data[0].lastname;
        let email = data[0].email;
        let password = data[0].password;

    
        

        // // Construct the URL for the new page with query parameters
        // var url = "userupdate.html" +
        //   "?id=" + encodeURIComponent(id) +
        //   "&name=" + encodeURIComponent(name) +
        //   "&lname=" + encodeURIComponent(lname) +
        //   "&email=" + encodeURIComponent(email) +
        //   "&password=" + encodeURIComponent(password);



        // // Redirect the user to the new page
        // window.location.href = url;
      } else {
        console.log("No user found");
      }
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
    }
  });
}

