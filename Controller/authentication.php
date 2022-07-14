<?php

    include("../Model/user_service.php");

    
    $avatar = $_POST["avatar"];
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirmPassword"];

    $auth_type = $_POST["submit-auth"];

    $loginEmail = $_POST["loginEmail"];
    $loginPassword = $_POST["loginPassword"];


    $userService = new UserService();
    $isUserExist = $userService->getUser($loginEmail);
    
    
    
    if($auth_type=="Sign in"){
        if($isUserExist){
            $customer = $userService->getCustomer();
            echo "User exists";
            if(trim($customer->getUser()->getPassword())==trim($loginPassword)){
                echo" Password Matched";
            }else{
                echo"Password doesnt matched";
            }
        }else{
            echo "User Doesnt exists";
            header("Location:  ../index.php");
        }
    }

?>