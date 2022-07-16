<?php
  session_start();
  if (isset($_POST["email"])) {
    $loginEmail = $_POST["email"];
    $loginPassword = $_POST["password"];

    include($_SERVER['DOCUMENT_ROOT'] . '/Model/user_service.php');
    
  
    $isUserExist = UserService::getUser($loginEmail);
    if ($isUserExist) {
      
      if (trim(UserService::$customer-> getUser()->getPassword()) == trim($loginPassword)) {
        
        $_SESSION["uid"] = UserService::$customer->getUser()->getUid();
        $_SESSION["email"] = $loginEmail;
        $_SESSION["authenticated"] = true;
        header('Location: /index.php');
        die;

      } else {
        
        $errorMessage = "Password doesnt matched";
      }
    } else {
      $errorMessage =  "User Doesnt exists";
    }
  }

  ?>

  

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="shortcut icon" href="/Images/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/09789629f4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/View/Login/login.css" />
  <link rel="stylesheet" href="/View/mediaquery.css" />
  <link rel="stylesheet" href="/View/style.css">
  <script src="./login.js"></script>

  <title>Login Page</title>
</head>

<body>
  
  <!---Preloader start--->
  <div id="loader"></div>
  <!---Preloader end--->


  <section class="container-fluid bg-primary login-bg"></section>
  <section class="container-fluid login-bg-overlay">
    <div class="row h-100">
      <div class="col-12 col-lg-5 login-jumborton"></div>
      <div class="col-12 col-lg-7 d-flex justify-content-center align-items-center">
        <div class="card login-card" style="width:30rem;">

          <div class="card-body">
            <br>
            <h3 class="card-title text-center">Login</h3>
            <div class="login-logo d-flex justify-content-center align-items-center">
              <img src="/Images/logo.png" alt="" width="150rem">
            </div>

            <h6 class="card-subtitle mb-4 text-center" style="font-size: 13;">Let's login to fast food for access more features</h6>

           
                <?php if(isset($errorMessage)){?>
                  <div class="alert alert-danger mt-2 mb-2" role="alert">
                <?php
                  echo $errorMessage;  
                  unset($errorMessage);
                ?>
                  </div>
                <?php }?>
            

            <p class="card-text">
            <form action="./login.php"  method="POST" id="login-form">
              <div class="mb-4">
                <label for="floatingInput">&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; Email address</label>
                <input type="email" class="form-control" id="emailInput" name="email" required>
              </div>
              <div class="mb-3">
                <label for="passwordInput" class="form-label">&nbsp; <i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
              </div>
              <br>
              <button class="btn btn-primary login-btn w-50 mb-4" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp; Login</button>
              <p style="font-size:15px">Don't you have an account? <a class="text-primary register-link">Register now</a></p>

            </form>
            </p>

          </div>
        </div>

      </div>
    </div>
  </section>

<!---Error toast-Start-->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="toastmessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="./Images/icons8-close-64.png" class="rounded me-2" alt="error-icon" height="30" width="30">
        <strong class="me-auto" id="heading">Error !</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-danger">
        Password doesn't match
      </div>
    </div>
  </div>
  <!---Error toast-End-->

  
</body>

</html>