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
    
      
    if($auth_type=="Sign in"){
        $isUserExist = $userService->getUser($loginEmail);
        if($isUserExist){
            $customer = $userService->getCustomer();
            echo "User exists";
            if(trim($customer->getUser()->getPassword())==trim($loginPassword)){
                echo "Password Matched";
                //header('Location:  ../index.php?success="Login Successfull"');
                
            }else{
                echo"Password doesnt matched";
                //header('Location:  ../index.php?error="Password doesnt matched"');
            }
        }else{
            echo "User Doesnt exists";
            //header('Location:  ../index.php?error="User doesnt exists"');
        }
    }
    
    else if(trim($auth_type) =="Sign up"){
        
    }

?>