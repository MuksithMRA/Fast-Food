const product_list = document.querySelector("#product_list");
const product = document.querySelector("#product");

$(".navbar .nav-link").on("click", function () {
  $(".navbar").find(".active").removeClass("active");
  $(this).addClass("active");
});

product_list.innerHTML = null;
for (let index = 0; index < 5; index++) {
  const col = document.createElement("div");
  col.classList.add("col-12");
  col.classList.add("col-lg-3");
  col.classList.add("col-md-6");
  col.classList.add("col-sm-12");
  col.classList.add("p-5");
  col.innerHTML = product.innerHTML;
  product_list.appendChild(col);
}
