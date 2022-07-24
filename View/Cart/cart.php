<?php session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/cart_service.php');
if (isset($_GET["id"])) {
    $cartService = new CartService();
    $cartService->removeFromCart($_GET["id"]);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/09789629f4.js"></script>
    <link rel="stylesheet" href="/View/Cart/cart.css">
    <link rel="stylesheet" href="/View/style.css">
    <script src="./cart.js"></script>
    <title>My Cart</title>
</head>

<body>
    <!---Preloader start--->
    <div id="loader"></div>
    <!---Preloader end--->

    <div class="content">
        
        <div class="row py-4  w-100 fixed-top" style="z-index:1;background:white">
            <h3 class="d-flex justify-content-center align-items-center"><i class="fa-solid fa-cart-shopping"></i>&nbsp; My Cart</h3>
        </div>

        <?php if (isset($_SESSION["authenticated"])) { ?>
            <div class="container" style="margin-top:12vh;height:80vh;width:auto;overflow: auto;">
                <ul class="list-group d-flex flex-column align-items-center" style="list-style: none;">

                    <?php

                    include($_SERVER['DOCUMENT_ROOT'] . '/Model/product_service.php');
                    $productService = new ProductService();
                    $cart_Products = $productService->getCartProducts();


                    if ($cart_Products == array()) {
                        echo 'No items in cart';
                    }
                    ?>
                </ul>
            </div>


            <div class="cart-footer h-20 w-100 bg-primary px-3 py-2 text-white" style="position:fixed;bottom:0">
                <div class="row">

                    <div class="col-8 d-flex justify-content-center align-items-start flex-column">
                        <p>Delivery : LKR 500 </p>
                        <h5>Total : LKR <?php echo $productService->getTotalPrice() ?></h5>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <a class="btn btn-outline-light" href="<?php if($cart_Products!= array()){ echo "/View/Checkout/checkout.php";} ?>" role="button">Checkout</a>
                    </div>
                </div>
            </div>

        <?php

        } else {
            echo '<div class="error-box">';
            echo '<h6>Please Login first</h6>';
            echo '<a class="btn btn-primary" href="/View/Login/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp; Login</a>';
            echo '</div>';
        }


        ?>
    </div>
    <script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "/View/Cart/cart.php");
    }
</script>

</body>

</html>