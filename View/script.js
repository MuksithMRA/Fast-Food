//Element definning
const product_list = document.querySelector("#product_list");
const product = document.querySelector('#product');

//Navbar navigation
$(".navbar .nav-link").on("click", function(){
    $(".navbar").find(".active").removeClass("active");
    $(this).addClass("active");
 });

//product list looping
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

/* 

$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});

*/

//bi-eye
 const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });

