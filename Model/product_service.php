<?php

    require_once('./Helpers/DBConnection.php');
    Class ProductService{
        private $products = array();
         public function getAllProducts()
        {
            $dbConnection = new DBConnection();
            $sql = "SELECT p.name as prod_name , c.name as cat_name , p.price , i.image from product p INNER JOIN category c ON p.category_id=c.category_id INNER JOIN product_image i ON i.image_id = p.img_id";
            $this->products  = $dbConnection ->executeSelectQuery($sql);
            foreach ($this->products as $key => $value) {
              echo '<div class="col-12 col-lg-3 col-md-6 col-sm-12 p-5">';
              echo '<div class="card " style="width:18rem;height: auto;"  id="product" >';
              echo '<img src="data:image/jpeg;base64,'.base64_encode($value['image']).'" class="card-img-top rounded " alt="...">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">'.$value["prod_name"]. '</h5>';
              echo '<h6 class="card-subtitle mb-2 text-muted ">'.$value["cat_name"].'</h6>';
              echo '<p class="card-text">LKR '.$value["price"].'</p>';
              echo '<a  class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
            
        }


       

    }
