<?php
    session_start();
    $prod_id = $_GET["prod_id"];
    $qty = $_GET["qty"];
    if(isset($_SESSION["authenticated"])){
        $cartService = new CartService();
        $cart = new Cart();
        $cart->setCart_id(0);
        $cart->setProd_id($prod_id);
        $cart->setCust_id($_SESSION["cust_id"]);
        $cart->setQty($qty);
        if($cartService->addToCart($cart)){

                header("Location: /index.php?cato=null&status=added");

        }else{
            
        }
    }else{
    
        
            header("Location: /index.php?cato=null&status=auth_fail");

    }
