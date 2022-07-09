$(".navbar .nav-link").on("click", function() {
  $(".navbar").find(".active").removeClass("active");
  $(this).addClass("active");
});
