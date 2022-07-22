<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Helpers/DBConnection.php');
class CartService
{
    public function addToCart(Cart $cart)
    {
        $dbConnection = new DBConnection();
        $cart_id = $cart->getCart_id();
        $prod_id = $cart->getProd_id();
        $cust_id = $cart->getCust_id();
        $qty = $cart->getQty();
        $sql = "SELECT count(cart_id) AS cart_item_count FROM cart WHERE prod_id='$prod_id'";

        if ($dbConnection->executeSelectQuery($sql)[0]["cart_item_count"] > 0) {
            $sql = "UPDATE cart SET qty = qty + '$qty' WHERE prod_id = '$prod_id'";
            $rows = $dbConnection->executeQuery($sql);
            if($rows>0){
                return true;
            }else{
                return false;
            }
        }else{
            $sql = "INSERT INTO cart VALUES('$cart_id','$prod_id','$cust_id')";
            $rows = $dbConnection->executeQuery($sql);

            if ($rows > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function removeFromCart($prod_id)
    {
        $dbConnection = new DBConnection();
        $sql = "DELETE FROM cart WHERE prod_id = '$prod_id'";
        $rows = $dbConnection->executeQuery($sql);

        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
