<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/Model/order_service.php');
    include($_SERVER['DOCUMENT_ROOT'].'/Model/order_product.php');
    include($_SERVER['DOCUMENT_ROOT'].'/Model/cart_service.php');

    session_start();

    $from = $_GET['from'];
    $orderService = new OrderService();
    $auth_id = $_SESSION["uid"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $payment_method = $_POST["payment_method"];
    $order_products= array();

    foreach ($_SESSION["order_products"] as $key => $value) {
        $orderProduct = new OrderProduct();
        $orderProduct->setProduct_id($value['prod_id']);
        $orderProduct->setQty($value['qty']);

        array_push($order_products , $orderProduct);
    }


    $order = new Order_T();
    $order->setAuth_id($auth_id);
    $order->setAddress($address);
    $order->setPhone_number($phone);
    $order->setPayment_method($payment_method);
    $order->setListOfOrderProducts($order_products);

    $isOrderPlaced = $orderService->addOrder($order);

    if($isOrderPlaced){
        if($from == "cart"){
            $cartService= new CartService();
        if($cartService->clearMyCart($_SESSION['cust_id'])){
            header("Location: /index.php?status=order_placed");
        }
        }else{
            header("Location: /index.php?status=order_placed");
        }
        
        
        
        
    }
