const loginEmail = document.querySelector("#loginEmailInput");
const loginPassword = document.querySelector("#loginPasswordInput");
const regAvatar = document.querySelector("#avatarInput");
const regFname = document.querySelector("#fnameInput");
const regLname = document.querySelector("#lnameInput");
const regAddress = document.querySelector("#addressInput");
const regPhone = document.querySelector("#phoneNumberInput");
const regEmail = document.querySelector("#emailInput");
const regPassword = document.querySelector("#passwordInput");
const regConfirmPassword = document.querySelector("#confirmPasswordInput");
const toastMessage = document.querySelector("#toastmessage");


let currentAuthScreen = "Sign in";

//Navbar navigation
$(".navbar .nav-link").on("click", function () {
  $(".navbar").find(".active").removeClass("active");
  $(this).addClass("active");
});



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
    if(isError){
        $("#toastmessage img").attr("src", "./Images/icons8-close-64.png");
        $("#toastmessage #heading").text("Error !");
        $("#toastmessage .toast-body").addClass("text-danger").text(message.toString());
    }else{

    }
    const toast = new bootstrap.Toast(toastMessage);
      toast.show();
}



