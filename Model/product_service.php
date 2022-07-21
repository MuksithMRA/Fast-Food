<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Helpers/DBConnection.php');

class ProductService
{
    private $products = array();
    private $totalPrice = 0;
    private $cartCount = 0;
    public function getAllProducts()
    {
        $dbConnection = new DBConnection();
        $this->products = array();
        $sql = "SELECT p.name as prod_name , c.name as cat_name , p.price , i.image from product p INNER JOIN category c ON p.category_id=c.category_id INNER JOIN product_image i ON i.image_id = p.img_id";
        $this->products  = $dbConnection->executeSelectQuery($sql);
        if (count($this->products) > 0) {
            foreach ($this->products as $key => $value) {
                echo '<div class="col-12 col-lg-3 col-md-6 col-sm-12 p-5 product-card">';
                echo '<div class="card " style="width:18rem;height: auto;"  id="product" >';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($value['image']) . '" class="card-img-top rounded " alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $value["prod_name"] . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted ">' . $value["cat_name"] . '</h6>';
                echo '<p class="card-text">LKR ' . $value["price"] . '</p>';
                echo '<a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }

    public function getCart(){
        $dbConnection = new DBConnection();
        $this->products = array();
        $sql = "SELECT sum(price) AS total , count(cart_id) AS cart_count, p.name as prod_name , c.name as cat_name , p.price , i.image , cart.qty from product p INNER JOIN category c ON p.category_id=c.category_id INNER JOIN product_image i ON i.image_id = p.img_id INNER JOIN cart ON cart.prod_id = p.product_id  WHERE cart.cust_id = " . $_SESSION["uid"] . "";
        $this->products  = $dbConnection->executeSelectQuery($sql);
        $this->cartCount = $this->products[0]['cart_count'];
    }
    public function getCartProducts()
    {
        $this->getCart();
        if ($this->cartCount > 0) {
            foreach ($this->products as $key => $value) {
                echo '<li>';
                echo '<div class="card mb-3" style="max-width: 540px;">';
                echo '<div class="row g-0">';
                echo '<div class="col-md-4">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($value['image']) . '" id="product_img" class="img-fluid rounded-start" alt="product-image">';
                echo '</div>';
                echo '<div class="col-md-8">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $value["prod_name"] . '</h5>';
                echo '<p class="card-text">' . $value["cat_name"] . '</p>';
                echo '<p>' . $value["qty"] . ' Items </p>';
                echo '<h6>LKR ' . $value["price"] . '</h6>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
                $this->totalPrice = $value['total'];
            }
            return $this->products;
        }
        return array();
    }





    /**
     * @return mixed
     */
    function getProducts()
    {
        return $this->products;
    }
    /**
     * @return mixed
     */
    function getTotalPrice()
    {
        return $this->totalPrice;
    }
    /**
     * @return mixed
     */
    function getCartCount()
    {
        return $this->cartCount;
    }

    
}
