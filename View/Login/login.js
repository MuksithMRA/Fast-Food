


// $(function () {
//     var form = $("#login-form");
//     $(form).submit(function (e) { 
//        // e.preventDefault(); 

//         var formData = {
//             email: $("#emailInput").val(),
//             password: $("#passwordInput").val(),
            
//           };
//           console.log(formData);
      
//           $.ajax({
//             type: "POST",
//             url: './login.php',
//             data: formData,
//             dataType: "json",
//             encode: true,
//             success: function(data)
//         {
//           console.log(data); // show response from the php script.
//         }

//           });
         
//     });    
      
// });
   
      
      
    
  

  
  //Adding preloader
var loader = document.querySelector("#loader");

function loadNow(opacity) {
  if (opacity <= 0) {
    displayContent();
  } else {
    loader.style.opacity = opacity;
    window.setTimeout(function () {
      loadNow(opacity - 0.05);
    }, 50);
  }
}

function displayContent() {
  loader.style.display = "none";
  document.getElementById("content").style.display = "block";
}

document.addEventListener("DOMContentLoaded", function () {
  loader = document.getElementById("loader");
  loadNow(1);
});



//Show toast

function showToast(message , isError) {
    const toastMessage = document.querySelector("#toastmessage");
    if(isError){
        $("#toastmessage img").attr("src", "../Images/icons8-close-64.png");
        $("#toastmessage #heading").text("Error !");
        $("#toastmessage .toast-body").addClass("text-danger").text(message.toString());
    }else{

    }
    const toast = new bootstrap.Toast(toastMessage);
      toast.show();
}


function setToken(id) {
    localStorage.setItem("token",id.toString())
    console.log(localStorage.getItem("token"));
}

