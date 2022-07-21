<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/09789629f4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./product.css">
  <title>Document</title>
</head>

<body>


  <div class="main">

    <!--Carousel-->

    <div class="row">
      <div class="col-12 col-lg-6 col-md-auto col-sm-auto">

        <div id="productCarousel" class="carousel slide" data-bs-ride="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/Images/menu-2.jpg" class="d-block w-100" alt="Grilled_Chicken">
            </div>
            <div class="carousel-item">
              <img src="/Images/home-img-1.png" class="d-block w-100" alt="sub_img1">
            </div>
            <div class="carousel-item">
              <img src="/Images/sub2.jpg" class="d-block w-100" alt="sub_img2">
            </div>
            <div class="carousel-item">
              <img src="/Images/sub3.jpg" class="d-block w-100" alt="sub_img3">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <!--Description-->
      <div class="col-12 col-lg-6 col-md-auto col-sm-auto description mt-3 mt-3">
        <div class="title h3">
          Grilled Chicken legs in barbecue sause with pepper seeds parsley, salt in a blck stone plate on a black stone table
        </div>
        <p class="price_qty">
          Rs. 1400.00
        </p><br>
        <count-txt class="price_qty me-5">
          Quantity
        </count-txt>
        <button type="button" class="btn btn-primary rounded rounded-circle" style="height: 3rem;width:3rem;">-</button>
        <count class="mx-2">1</count>
        <button type="button" class="btn btn-primary rounded rounded-circle" style="height: 3rem;width:3rem;">+</button>

        <div class="row mt-5">
          <div class="col-12 col-lg-3 col-md-4 col-sm-4">
            <button type="button" class="cart btn btn-warning my-1 text-white"><i class="fa-solid fa-cart-plus"></i> &nbsp;Add to Cart</button>
          </div>
          <div class="col-12 col-lg-3 col-md-4 col-sm-4">
            <button type="button" class="buy btn btn-primary my-1 text-white"><i class="fa-solid fa-bag-shopping"></i>&nbsp;Buy Now</button>
          </div>
        </div>
      </div>
    </div>
    <h4 class="mt-3">
      You may also like
    </h4>
    <div class="underline bg-warning mb-3" style="height: 4px; width:2rem"></div>

    <ul class="list-group border-0 d-flex flex-row align-items-center" style="width: 100%;overflow:auto;scrollbar-width: thin;">
      <li class="list-group-item">
        <div class="card " style="width:18rem;height: auto;"  id="product" >
          <a class="card-block stretched-link text-decoration-none" href="/View/product_details/product.php">
            <img src="/Images/menu-2.jpg" class="card-img-top rounded " alt="...">
                <div class="card-body">
                <h5 class="card-title">Title of the card</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Burger</h6>
                <p class="card-text">LKR 500</p>
                <a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>
                </div>
            </a>
        </div>
      </li>
      <li class="list-group-item">
        <div class="card " style="width:18rem;height: auto;"  id="product" >
          <a class="card-block stretched-link text-decoration-none" href="/View/product_details/product.php">
            <img src="/Images/menu-2.jpg" class="card-img-top rounded " alt="...">
                <div class="card-body">
                <h5 class="card-title">Title of the card</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Burger</h6>
                <p class="card-text">LKR 500</p>
                <a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>
                </div>
            </a>
        </div>
      </li>
      <li class="list-group-item">
        <div class="card " style="width:18rem;height: auto;"  id="product" >
          <a class="card-block stretched-link text-decoration-none" href="/View/product_details/product.php">
            <img src="/Images/menu-2.jpg" class="card-img-top rounded " alt="...">
                <div class="card-body">
                <h5 class="card-title">Title of the card</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Burger</h6>
                <p class="card-text">LKR 500</p>
                <a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>
                </div>
            </a>
        </div>
      </li>
      <li class="list-group-item">
        <div class="card " style="width:18rem;height: auto;"  id="product" >
          <a class="card-block stretched-link text-decoration-none" href="/View/product_details/product.php">
            <img src="/Images/menu-2.jpg" class="card-img-top rounded " alt="...">
                <div class="card-body">
                <h5 class="card-title">Title of the card</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Burger</h6>
                <p class="card-text">LKR 500</p>
                <a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>
                </div>
            </a>
        </div>
      </li>
      <li class="list-group-item">
        <div class="card " style="width:18rem;height: auto;"  id="product" >
          <a class="card-block stretched-link text-decoration-none" href="/View/product_details/product.php">
            <img src="/Images/menu-2.jpg" class="card-img-top rounded " alt="...">
                <div class="card-body">
                <h5 class="card-title">Title of the card</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Burger</h6>
                <p class="card-text">LKR 500</p>
                <a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>
                </div>
            </a>
        </div>
      </li>
      <li class="list-group-item">
        <div class="card " style="width:18rem;height: auto;"  id="product" >
          <a class="card-block stretched-link text-decoration-none" href="/View/product_details/product.php">
            <img src="/Images/menu-2.jpg" class="card-img-top rounded " alt="...">
                <div class="card-body">
                <h5 class="card-title">Title of the card</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Burger</h6>
                <p class="card-text">LKR 500</p>
                <a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>
                </div>
            </a>
        </div>
      </li>
      <li class="list-group-item">
        <div class="card " style="width:18rem;height: auto;"  id="product" >
          <a class="card-block stretched-link text-decoration-none" href="/View/product_details/product.php">
            <img src="/Images/menu-2.jpg" class="card-img-top rounded " alt="...">
                <div class="card-body">
                <h5 class="card-title">Title of the card</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Burger</h6>
                <p class="card-text">LKR 500</p>
                <a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>
                </div>
            </a>
        </div>
      </li>


    </ul>

  </div>
</body>

</html>
