<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Helpers/DBConnection.php');

class ProductService
{
    private $products = array();
    private $totalPrice = 0;
    private $cartCount = 0;

     public function fetchAllProducts(String $keyword)
    {
     
        $dbConnection = new DBConnection();
        $this->products = array();
        if($keyword == "null"){
            $sql = "SELECT p.product_id , p.description, p.name as prod_name , c.name as cat_name , p.price , i.image from product p INNER JOIN category c ON p.category_id=c.category_id INNER JOIN product_image i ON i.image_id = p.img_id";
        }else{
            $sql = "SELECT p.product_id , p.description, p.name as prod_name , c.name as cat_name , p.price , i.image from product p INNER JOIN category c ON p.category_id=c.category_id INNER JOIN product_image i ON i.image_id = p.img_id WHERE c.name = '$keyword' OR p.product_id = '$keyword'";
        }
        
        $this->products  = $dbConnection->executeSelectQuery($sql);
        if(count($this->products) > 0){
            return true;
           
        }else{
            return false;
        }
    }

    
    public function showAllProducts(String $keyword)
    {
        
        if ($this->fetchAllProducts($keyword)) {
            
            foreach ($this->products as $key => $value) {
                $cartData = array('prod_id'=>$value["product_id"] ,'qty'=>1);
                $buildcartData = http_build_query($cartData);
                echo '<div class="col-12 col-lg-3 col-md-6 col-sm-12 p-5 product-card">';
                echo '<div class="card " style="width:18rem;height: auto;"  id="product" >';
                echo '<a class="card-block text-decoration-none" href="/View/product_details/product.php?product_id='.$value["product_id"].'">' ;
                echo '<img src="data:image/jpeg;base64,' . base64_encode($value['image']) . '" class="card-img-top rounded " alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $value["prod_name"] . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted ">' . $value["cat_name"] . '</h6>';
                echo '<p class="card-text mb-3">LKR ' . $value["price"] . '</p>';
                echo '<a  class="btn btn-primary" href="/View/Cart/add_to_cart.php?'.$buildcartData.'" role="button"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }
        }else{
            echo "No Product Result found";
        }
    }

    public function getCart(){
        $dbConnection = new DBConnection();
        $this->products = array();
        $sql = "SELECT  p.product_id , p.name as prod_name , c.name as cat_name , p.price , i.image , cart.qty from product p INNER JOIN category c ON p.category_id=c.category_id INNER JOIN product_image i ON i.image_id = p.img_id INNER JOIN cart ON cart.prod_id = p.product_id  WHERE cart.cust_id = " . $_SESSION["uid"] . "";
        $this->products  = $dbConnection->executeSelectQuery($sql);
        $this->cartCount = count($this->products);
    }
    public function getCartProducts()
    {
        $this->getCart();
        if ($this->cartCount > 0) {
            $this->totalPrice = 500;
            foreach ($this->products as $key => $value) {
                $tot = $value["price"]*$value["qty"];
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
                echo"<div class='row'>";
                echo"<div class='col-8'>";
                echo '<small> LKR ' . $value["price"] . ' * ' . $value["qty"] . ' Product </small>';
                echo '<h6>LKR ' . $tot . '</h6>';
                echo '</div>';
                echo '<div class="col-4 d-flex justify-content-center align-items-center">';
                echo '<a class="btn btn-danger btn-sm " href="/View/Cart/cart.php?id='.$value["product_id"].'" role="button"><i class="fa-solid fa-trash"></i> </a>';    
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
                $this->totalPrice = $this->totalPrice+ $tot;
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
