
let qty = 1;
  
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


  $(document).ready(function () {
    $("#inc_qty").click(function (e) { 
      qty = parseInt($("#qty").text());
      if(qty>=1){
        qty += 1;
        $("#qty").text(qty.toString());
      }   
    });
  
    $("#dec_qty").click(function (e) { 
      qty = parseInt($("#qty").text());
      if(qty>1){
        qty -= 1;
        $("#qty").text(qty.toString());
      }   
    });
  });
  