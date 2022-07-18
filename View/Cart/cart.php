<?php session_start() ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/09789629f4.js"></script>
    <link rel="stylesheet" href="/View/Cart/cart.css">
    <link rel="stylesheet" href="/View/style.css">
    <title>My Cart</title>
</head>

<body>

    <div class="row py-4  w-100" style="position: fixed;top:0;z-index:1;background:white">
        <h3 class="d-flex justify-content-center align-items-center"><i class="fa-solid fa-cart-shopping"></i>&nbsp; My Cart</h3>
    </div>

    <div class="container" style="margin-top:12vh;height:80vh;width:auto;overflow: auto;">
        <ul class="list-group d-flex flex-column align-items-center" style="list-style: none;">
           
            <?php 
                if(isset($_SESSION["authenticated"])) {
                    
                    include($_SERVER['DOCUMENT_ROOT'] . '/Model/product_service.php');
                    $productService = new ProductService();
                    $productService->getCartProducts();
                    if($productService == array()){
                        echo 'No items in cart';
                    }
                }else{
                    echo 'Please Login first'; 
                }
            ?>
        </ul>
    </div>


    <div class="cart-footer h-20 w-100 bg-primary px-3 py-2 text-white" style="position:fixed;bottom:0">
        <div class="row">

            <div class="col-8 d-flex justify-content-center align-items-start flex-column">
                <h6>Delivery : LKR 500 </h6>
                <h5>Total : LKR 1500</h5>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <a class="btn btn-outline-light" href="#" role="button">Checkout</a>
            </div>
        </div>
    </div>
</body>

</html>