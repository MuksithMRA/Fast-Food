const toastMessage = document.getElementById("toastmessage");


let currentAuthScreen = "Sign in";

//Navbar navigation
$(".navbar .nav-link").on("click", function () {
  $(".navbar").find(".active").removeClass("active");
  $(this).addClass("active");
});


//category selection
function changeSelected(val){
  console.log(val);
  const $select = document.querySelector('#categorySelection');
  $select.value = val
};



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
        $("#toastmessage .toast-body").removeClass("text-dark").addClass("text-danger").text(message.toString());
    }else{
      $("#toastmessage img").attr("src", "./Images/icons8-done-64.png");
      $("#toastmessage #heading").text("Success !");
      $("#toastmessage .toast-body").removeClass("text-danger").addClass("text-dark").text(message.toString());
    }
    const toast = new bootstrap.Toast(toastMessage);
      toast.show();
}



$('.dropdown-menu').on( 'click', 'a', function() {
  var text = $(this).html();
  var htmlText = text + ' <span class="caret"></span>';
  $(this).closest('.dropdown').find('.dropdown-toggle').html(htmlText);
});