<?php
include($_SERVER['DOCUMENT_ROOT'].'/Model/Order.php');
include($_SERVER['DOCUMENT_ROOT'].'/Helpers/DBConnection.php');

    class OrderService{

        private $listOforders=array();

        public function addOrder(Order_T $order)
        {
          
            $dbConnection = new DBConnection();
            $auth_id = $order->getAuth_id();
            $address = $order->getAddress();
            $phone = $order->getPhone_number();
            $payment_method = $order->getPayment_method();
            $listOfProducts = $order->getListOfOrderProducts();

            $sql = "INSERT INTO order_t VALUES(NULL,'$auth_id','$address','$phone','$payment_method',current_timestamp())";
            if($dbConnection->executeQuery($sql) >0){
                $last_order_id = $dbConnection->executeSelectQuery("SELECT MAX(order_id) AS last_id FROM order_t")[0]['last_id'];
                for ($i=0; $i < count($listOfProducts); $i++) {
                    $product_id = $listOfProducts[$i]->getProduct_id();
                    $qty = $listOfProducts[$i]->getQty(); 
                    $sql = "INSERT INTO order_product VALUES(NULL,'$product_id','$qty','$last_order_id')";
                    $dbConnection->executeQuery($sql);
                }
                
                return true;
            }
           return false;
        }
        

        public function fetchOrders($keyword=null)
        {
            $dbConnection = new DBConnection();
            $sql = "SELECT * FROM order_t o JOIN product p ON o.prod_id = p.product_id WHERE o.auth_id = '$keyword'";

            $result = $dbConnection->executeSelectQuery($sql);
            $this->listOforders = [];
            if(count($result)>0){
                foreach ($result as $key => $value) {
                    $order = new Order_T();
                    $order->setOrder_id($value['order_id']);
                    $order->setAuth_id($value['auth_id']);
                    $order->setAddress($value['address']);
                    $order->setPhone_number($value['phone']);
                    $order->setPayment_method($value['payment_method']);
                    $order->setOrdered_date($value['ordered_date']);

                    $this->listOforders[] = $order;
                }
            }
            return $this->getListOforders();
        }


	function getListOforders() {
		return $this->listOforders;
	}
}

?>