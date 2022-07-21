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

//Read profile pic & assign to image container
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#avatar").attr("src", e.target.result).width(150).height(150);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

//Verify password and confirm password matching
let isMatch = false;
$(document).ready(function () {
  $("#confirmPasswordInput").on("keyup", function () {
    if ($("#passwordInput").val() == $("#confirmPasswordInput").val()) {
      $("#message").html("Matching with New Password").css("color", "green");
      isMatch = true;
    } else{
       $("#message").html("Not Matching with New Password").css("color", "#ff1744");
       isMatch = false;
    }
  });
});



//Show toast

function showToast(message , isError) {
  if(isError){
      $("#toastmessage img").attr("src", "/Images/icons8-close-64.png");
      $("#toastmessage #heading").text("Error !");
      $("#toastmessage .toast-body").addClass("text-danger").text(message.toString());
  }else{

  }
  const toast = new bootstrap.Toast(toastMessage);
    toast.show();
}

