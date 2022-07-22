<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Model/product_service.php');

$productService = new ProductService();
if ($productService->fetchAllProducts($_GET["product_id"])) {
  $product = $productService->getProducts()[0];
  $product_name = $product['prod_name'];
  //$description = $product['description'];
  $price = $product['price'];
  //$isAvailable = $product['available_status']==1?"Available":"Unavailable";
  $image = $product['image'];
  $category = $product['cat_name'];

  if ($productService->fetchAllProducts($category)) {
    $productsByCategory = $productService->getProducts();
  }
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/Images/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/09789629f4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./product.css">
  <title>Product Page</title>
</head>

<body>
  <!---Preloader start--->
  <div id="loader"></div>
  <!---Preloader end--->

  <div class="main">

    <!--Carousel-->

    <div class="row">
      <div class="col-12 col-lg-6 col-md-auto col-sm-auto">

        <div id="productCarousel" class="carousel slide" data-bs-ride="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src='<?php echo "data:image/jpeg;base64," . base64_encode($image) . ""; ?>' class="d-block w-100" alt="product_image">
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
        <div class="title h3 mb-4">
          <?php echo $product_name ?>
        </div>
        <p class="price_qty">
          Rs. <?php echo $price ?>
        </p>
        <br>
        <count-txt class="price_qty me-5">
          Quantity
        </count-txt>
        <button type="button" class="btn btn-primary rounded rounded-circle" style="height: 3rem;width:3rem;">-</button>
        <count class="mx-2">1</count>
        <button type="button" class="btn btn-primary rounded rounded-circle" style="height: 3rem;width:3rem;">+</button>

        <div class="row mt-5">
          <div class="col-12 col-lg-3 col-md-4 col-sm-4">
            <button type="button" class="btn btn-warning rounded my-1 text-white"><i class="fa-solid fa-cart-plus"></i> &nbsp;Add to Cart</button>
          </div>
          <div class="col-12 col-lg-3 col-md-4 col-sm-4">
            <button type="button" class="btn btn-primary rounded my-1 text-white"><i class="fa-solid fa-bag-shopping"></i>&nbsp;Buy Now</button>
          </div>
        </div>
      </div>
    </div>
    <h4 class="mt-3">
      You may also like
    </h4>
    <div class="underline bg-warning mb-3" style="height: 4px; width:2rem"></div>
    <?php foreach ($productsByCategory as $key => $value) { ?>
      <ul class="list-group border-0 d-flex flex-row align-items-center" style="width: 100%;overflow:auto;scrollbar-width: thin;">
        <li class="list-group-item">
          <div class="card " style="width:18rem;height: auto;" id="product">
            <a class="card-block stretched-link text-decoration-none" href="/View/product_details/product.php">
              <img src='<?php echo "data:image/jpeg;base64," . base64_encode($value['image']) . ""; ?>' class="card-img-top rounded " alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $value['prod_name']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted "><?php echo $value['cat_name']; ?></h6>
                <p class="card-text mb-3">LKR <?php echo $value['price']; ?></p>
                <a class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>
              </div>
            </a>
          </div>
        </li>
      </ul>
    <?php }  ?>

  </div>
</body>

</html>