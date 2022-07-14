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
const errorToast = document.querySelector("#errorToast");


let currentAuthScreen = "Sign in";

//Navbar navigation
$(".navbar .nav-link").on("click", function () {
  $(".navbar").find(".active").removeClass("active");
  $(this).addClass("active");
});

//Account modal Navigation
$(document).ready(function () {
  $(".nav .nav-link").on("click", function () {
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
    currentAuthScreen = $(this).text();
    changeText();
    
  });
});

changeText();

function changeText() {
  $(document).ready(function () {
    $(".modal-footer .save").text(currentAuthScreen + " now").prop('value', currentAuthScreen);
  });
  onTabChange();
  $('#auth-form')[0].reset();

}

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

//Validation with Sign in Sign up button

function onTabChange() {
  if (currentAuthScreen.trim() == "Sign in") {
    manageLoginValidations();
  } else if (currentAuthScreen.trim() == "Sign up") {

    //Verify password and confirm password matching
    $('#confirmPasswordInput').on('keyup', function () {
      if ($('#passwordInput').val() == $('#confirmPasswordInput').val()) {
        $('#message').html('Matching with New Password').css('color', 'green');
      } else 
        $('#message').html('Not Matching with New Password').css('color', 'red');
    });
    
    manageRegisterValidations();
  }
}

function manageLoginValidations() {

  loginEmail.setAttribute("required", "");
  loginPassword.setAttribute("required", "");
  regAvatar.removeAttribute("required");
  regFname.removeAttribute("required");
  regLname.removeAttribute("required");
  regAvatar.removeAttribute("required");
  regEmail.removeAttribute("required");
  regPassword.removeAttribute("required");
  regPassword.removeAttribute("pattern");
  regPassword.removeAttribute("title");
  regPhone.removeAttribute("required");
  regPhone.removeAttribute("pattern");
  regConfirmPassword.removeAttribute("required");
}

function manageRegisterValidations() {
  loginEmail.removeAttribute("required");
  loginPassword.removeAttribute("required");
  regFname.setAttribute("required", "");
  regLname.setAttribute("required", "");
  regAvatar.setAttribute("required", "");
  regEmail.setAttribute("required", "");
  regPassword.setAttribute("required", "");
  regPassword.setAttribute("pattern","^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#?$%^&*_=+-]).{8,}$")
  regPassword.setAttribute("title","Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters");
  regPhone.setAttribute("required", "");
  regPhone.setAttribute("pattern","[0-9]{3}-[0-9]{3}-[0-9]{4}");
  regConfirmPassword.setAttribute("required", "");
}


function validate() {
  if(currentAuthScreen.trim()=="Sign up"){
    if($('#passwordInput').val() != $('#confirmPasswordInput').val()){
      const toast = new bootstrap.Toast(errorToast);
      toast.show();
      return false;
    }else{
        return true;
    }
  }else{
    return true;
  }
}

