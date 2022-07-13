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
  <script src="https://kit.fontawesome.com/09789629f4.js" crossorigin="anonymous"></script>

  <title>Fast Food</title>
</head>

<body>
  <div id="loader"></div>
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
              <a class="nav-link" href="#">Browse Foods</a>
            </li>
            <li class="nav-item mx-auto">
              <a class="nav-link" href="./View/checkout_layout.html">Checkout</a>
            </li>
            <li class="nav-item mx-auto">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>
          <form class="d-flex">
            <a href="./View/cart.html" class="btn btn-primary mx-auto position-relative">
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                99+
                <span class="visually-hidden">cart items</span> </span><i class="fa-solid fa-cart-shopping"></i>
            </a>
          </form>
          <div data-bs-toggle="collapse" style="width: 20px"></div>
          <form class="d-flex">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mx-auto open-auth" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa-solid fa-user"></i>&nbsp; Account
            </button>



          </form>
        </div>
      </div>
    </nav>

    <!---Navbar -- End-->
    <!---Landing Page --- Start-->

    <div class="container-fluid">
      <br><br>
      <div class="row landing-page pt-20">
        <div class="col-12 col-lg-5 col-md-5 col-sm-12 d-flex flex-column justify-content-center px-5 newCol">
          <div class="mt-4 p-5 text-white rounded">
            <h1>Fast Food</h1>
            <h6>Find your favorite & delicous foods from here !</h6>
            <br>
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-bowl-food"></i> &nbsp Select a Category
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </div>
          </div>
          <br />
        </div>
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
      </div>
    </div>

    <!---Landing Page --- End-->
    <br><br>
    <!---Search Row Start-->
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

    <!---Search Row End-->
    <br><br>
    <!--Product Item List Start-->
    <div class="row w-100 d-sm-flex justify-content-center" id="product_list">

      <!-------Product  Items Start-->

      <?php
      include('./Model/product_service.php');
      $productService = new ProductService();
      $productService->getAllProducts();
      ?>

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

  <!--  Account Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Your Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Login</button>
            <button class="nav-link" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register" aria-selected="false">Register</button>
          </ul>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab" tabindex="0">
              <div class="container">
                <div class="container-fluid d-flex justify-content-center">
                  <img src="./Images/logo.png" alt="" height="100rem" width="100rem">
                </div>
                <label for="exampleFormControlInput1" class="form-label pt-3">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                <label for="exampleFormControlInput1" class="form-label pt-3">Password</label>
                <input type="password" class="form-control" id="exampleFormControlInput1">
              </div>
            </div>
            <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab" tabindex="0">
              Velit harum cum laudantium natus dignissimos magni labore, officia rerum praesentium impedit corporis laborum.
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary save">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="./View/script.js"></script>
</body>

</html>
