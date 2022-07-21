<?php
session_start();
$msg = "";
if (isset($_POST["register"])) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/user_service.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Customer.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $img = $_FILES["avatar"]['tmp_name'];
    $avatar = addslashes(file_get_contents($img));
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if (trim($password) == trim($confirmPassword)) {
        $isUserExist = UserService::getUser($email);
        if ($isUserExist) {
            $msg = "Email already exist";
        } else {
            $isRegistered =  UserService::registerUser(new Customer(
                0,
                $avatar,
                $fname,
                $lname,
                $address,
                $phone,
                new User(
                    0,
                    $email,
                    $password,
                    null,
                )
            ));

            if ($isRegistered) {
            
                header("Location: /index.php");
            }
        }
    } else {
        $msg = "Passwords doesn't match";
    }
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="/Images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/09789629f4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./register.css">
    <script src="./register.js"></script>
    <title>Register Page</title>
</head>

<body>
    <!---Preloader start--->
    <div id="loader"></div>
    <!---Preloader end--->


    <section class="register-bg"></section>
    <section class="register-bg-overlay d-flex justify-content-center align-items-center">
        <div class="container px-3 py-5 m-4 register-card">
            <form action="./register.php" method="POST" id="auth-form" enctype="multipart/form-data">
                <div class="row mb-3">
                    <h3 class="d-flex  align-items-center justify-content-center">Register</h3>

                    <?php if ($msg != "") { ?>
                        <div class="alert alert-danger mt-2 mb-2" role="alert">
                            <?php
                            echo $msg;
                            $msg = "";
                            ?>
                        </div>
                    <?php } ?>

                </div>
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <img src="/Images/sample_avatar.jpg" alt="" id="avatar" height="120" width=auto class="rounded-circle bg-light m-4 mb-2">
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">

                    </div>
                </div>
                <div class="row mb-4">

                    <div class="col-12 col-lg-6 col-md-6 d-flex flex-column  align-items-center">
                        <label for="avatarInput" class="form-label pt-3">Profile Picture&nbsp;<span class="text-danger">*</span></label>
                        <input type="file" name="avatar" accept=".jpg , .png , .jpeg" class="form-control" id="avatarInput" onchange="readURL(this);" required>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 d-flex flex-column  align-items-center">
                        <label for="fnameInput" class="form-label pt-3">First Name&nbsp;<span class="text-danger">*</span></label>
                        <input type="text" name="fname" value="<?php if (isset($fname)) {
                                                                    echo $fname;
                                                                } else {
                                                                    echo '';
                                                                } ?>" class="form-control" id="fnameInput" placeholder="ex:-John" required>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 d-flex flex-column  align-items-center">
                        <label for="lnameInput" class="form-label pt-3">Last Name&nbsp;<span class="text-danger">*</span></label>
                        <input type="text" name="lname" value="<?php if (isset($lname)) {
                                                                    echo $lname;
                                                                } else {
                                                                    echo '';
                                                                } ?>" class="form-control" id="lnameInput" placeholder="ex:-Doe" required>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 d-flex flex-column  align-items-center">
                        <label for="addressInput" class="form-label pt-3">Address&nbsp;<span class="text-danger">*</span></label>
                        <input type="text" name="address" value="<?php if (isset($address)) {
                                                                        echo $address;
                                                                    } else {
                                                                        echo '';
                                                                    } ?>" class="form-control" id="addressInput" placeholder="ex:-54/A , Galle rd , Colombo 06" required>
                    </div>
                    <div class="col-12 col-lg-6  col-md-6 d-flex flex-column  align-items-center">
                        <label for="phoneNumberInput" class="form-label pt-3">Phone Number&nbsp;<span class="text-danger">*</span></label>
                        <input type="tel" name="phone" value="<?php if (isset($phone)) {
                                                                    echo $phone;
                                                                } else {
                                                                    echo '';
                                                                } ?>" class="form-control" id="phoneNumberInput" placeholder="ex:- 0778475987" pattern="[0-9]{10}" required>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 d-flex flex-column  align-items-center">
                        <label for="emailInput" class="form-label pt-3">Email address&nbsp;<span class="text-danger">*</span></label>
                        <input type="email" name="email" value=" <?php if (isset($email)) {
                                                                        echo $email;
                                                                    } else {
                                                                        echo '';
                                                                    } ?>" class="form-control" id="emailInput" placeholder="John@example.com" required>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 d-flex flex-column  align-items-center">
                        <label for="passwordInput" class="form-label pt-3">Password&nbsp;<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" id="passwordInput" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#?$%^&*_=+-]).{8,}$" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 d-flex flex-column  align-items-center">
                        <label for="confirmPasswordInput" class="form-label pt-3">Confirm Password&nbsp;<span class="text-danger">*</span></label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPasswordInput" required>
                        <span id='message'></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <button type="submit" name="register" class="btn btn-primary px-5 mx-2" id="submit-btn"> Register</button>
                        <button type="reset" class="btn btn-danger px-5 mx-2">Clear</button>
                    </div>
                </div>

            </form>

        </div>
    </section>
</body>

</html>