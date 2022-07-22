<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Model/product_service.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Model/category_service.php');
$productService = new ProductService();
$categoryService = new CategoryService();
if (count($categoryService->getAllCategories()) > 0) {
    $categories = $categoryService->getCategories();
}
$cart_count = 0;
if (isset($_SESSION["authenticated"])) {
    $productService->getCart();
    $cart_count = $productService->getCartCount();
    $email = $_SESSION["email"];
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="./View/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./View/mediaquery.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/09789629f4.js" crossorigin="anonymous"></script>



  <title>Fast Food</title>
</head>

<body>

  <!---Preloader start--->
  <div id="loader"></div>
  <!---Preloader end--->


  <div class="content">
  <!--Nav bar -- Start -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top navTop">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./Images/logo.png" alt="" height="70px" width="70px" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item mx-auto">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item mx-auto">
            <a class="nav-link" href="#product_list">Browse Foods</a>
          </li>
          <li class="nav-item mx-auto">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item mx-auto">
            <a class="nav-link" href="/View/About Us/about_us.php">About Us</a>
          </li>
        </ul>

        <!-- cart Button trigger modal start -->
        <form class="d-flex">
          <a href="/View/Cart/cart.php" class="btn btn-primary mx-auto position-relative">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php echo $cart_count ?>
              <span class="visually-hidden">
                cart items
              </span>
            </span>
            <i class="fa-solid fa-cart-shopping"></i>
          </a>
        </form>
        <!-- cart Button trigger modal end -->

        <div data-bs-toggle="collapse" style="width: 20px"></div>

        <!-- Account Button trigger modal start-->


        <?php if (isset($_SESSION["authenticated"])) { ?>

          <form class="d-flex me-3">
            <button type="button" class="btn btn-primary mx-auto " data-bs-toggle="modal" data-bs-target="#ProfileIntro"><i class="fa-solid fa-user"></i>&nbsp; My Profile </button>
          </form>

          <form class="d-flex">
            <a class="btn btn-primary mx-auto " href="./View//Login/logout.php" role="button"><i class="fa fa-sign-out" aria-hidden="true"></i> </i>&nbsp; </a>
          </form>

        <?php } else { ?>
          <form class="d-flex">
            <a class="btn btn-primary mx-auto " href="./View/Login/login.php" role="button"><i class="fa-solid fa-user"></i>&nbsp; Account </a>
          </form>

        <?php } ?>
        <!-- Account Button trigger modal end-->

      </div>
    </div>
  </nav>
  <!---Navbar -- End-->


  <!---Landing Page --- Start-->
  <div class="container-fluid">
    <br><br>
    <div class="row landing-page pt-20">


      <!--Left Column start --->
      <div class="col-12 col-lg-5 col-md-5 col-sm-12 d-flex flex-column justify-content-center px-5 newCol">
        <div class="mt-4 p-5 text-white rounded">
          <h1>Fast Food</h1>
          <h6>Find your favorite & delicous foods from here !</h6>
          <br>

          <form action="./View/category.php" method="post">
            <div class="row">
              <div class="col-12 col-lg-5 d-flex flex-column align-items-center justify-content-center mb-2">

                <select class="form-control m-0" id="categorySelection" name="categories">
                  <option value="null" selected> All Categories</option>
                  <?php if (isset($categories)) {
    foreach ($categories as $cat) {
        ?>
                      <option value="<?php echo $cat->getName()  ?>">
                        <?php echo $cat->getName() ?> (<?php echo $cat->getProduct_count() ?>)
                      </option>


                  <?php
    }
} ?>
                </select>
              </div>

              <div class="col-12 col-lg-6 d-flex flex-column align-items-lg-start justify-content-center mb-2">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-bowl-food"></i>&nbsp; Browse Foods</button>
              </div>
            </div>
          </form>

        </div>
        <br />
      </div>
      <!--Left Column end --->

      <!--Right Column start --->
      <div class="col-12 col-lg-7 col-md-7 col-sm-12  d-flex flex-column justify-content-center newCol">
        <div id="carouselExampleControls" class="carousel slide w-70 " data-bs-ride="carousel">
          <div class="carousel-inner w-70">

            <div class="carousel-item active w-70">
              <img src="./Images/home-img-1.png" class="d-block w-70" alt="...">
            </div>
            <div class="carousel-item w-70 ">
              <img src="./Images/home-img-2.png" class="d-block w-70" alt="...">
            </div>
            <div class="carousel-item w-70">
              <img src="./Images/home-img-3.png" class="d-block w-70" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!--Right Column end --->


    </div>
  </div>
  <!---Landing Page --- End-->

  <br><br>


  <!---Search & Sort Row Start-->
  <div class="container">
    <div class="row w-100">
      <div class="col-6 d-flex justify-content-center">
        <div class="input-group">
          <span class="input-group-text bg-primary text-light" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
          <input type="text" class="form-control" placeholder="Search your favorite food" aria-label="Search" aria-describedby="basic-addon1">
        </div>
      </div>
      <div class="col-6 d-flex justify-content-end">
        <a class="btn btn-outline-primary btn-sm d-flex align-items-center" href="#" role="button">Sort &nbsp; <i class="fa-solid fa-arrow-down-short-wide"></i> </a>
      </div>
    </div>
  </div>
  <!---Search & Sort Row End-->

  <br><br>


  <!--Product Item List Start-->
  <div class="row w-100 d-sm-flex justify-content-center" id="product_list">

    <!-------Product  Items Start #from database-->

    <?php
    if (isset($_GET["cato"])) {
        $productService->showAllProducts($_GET["cato"]);
    } else {
        $productService->showAllProducts("null");
    }

    ?>
  </div>
  <!-------Product  Items End-->

  </div>
  <!---Product Item List End--->

  <br><br>

  <!----Pagination Start-->
  <div>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </div>
  <!------Pagination end-->

  </div>



  <!---toast-Start-->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="toastmessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="./Images/icons8-close-64.png" class="rounded me-2" alt="error-icon" height="30" width="30">
        <strong class="me-auto" id="heading">Error !</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">

      </div>
    </div>
  </div>
  <!--- toast-End-->

  <!-- Profile Intro Start -->
  <div class="modal fade" id="ProfileIntro" tabindex="-1" aria-labelledby="ProfileIntroLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="avatar-pic text-center" style="width: 100%;">

            <img src="<?php echo "data:image/jpeg;base64," . base64_encode($_SESSION['avatar']) . ""; ?>" alt="" id="avatar" height="150" width=150 class="rounded-circle m-4 mb-2">
          </div>
          <div class="user-details text-center">
            <h4><?php echo "" . $_SESSION["fname"] . " " . $_SESSION["lname"] . "" ?></h4>
            <p><?php echo $email ?></p>
            <br><br>

          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <a class="btn btn-primary" href="#" role="button"> View Profile</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Profile Intro End -->

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="./View/script.js"></script>

  <script>
    changeSelected('<?php echo $_GET["cato"] ?>')
  </script>


  <?php if (isset($GET["status"])) {?>
    <script>console.log("Hello");</script>
  <?php  if ($_GET["status"] == "auth_fail") { ?>
    <script>
      showToast("Please login to add this product to cart !",true);
    </script>
  <?php } elseif ($_GET["status"]=="added") { ?>
    <script>
      showToast("Added to cart successfully !",false);
    </script>
  <?php }?>
  <?php }?>
  

</body>

</html>