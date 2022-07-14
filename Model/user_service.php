<?php
require_once('../Helpers/DBConnection.php');
require('../Model/Customer.php');
    class UserService{

        private Customer $customer;

        public function getUser($email)
        {
            
            $sql = "SELECT * FROM customer c JOIN auth a ON c.auth_id = a.uid WHERE email = '".$email."'";
            $dbcontroller = new DBConnection();
            $result = $dbcontroller->executeSelectQuery($sql);

            
            
            if(count($result)>0){
                $this->customer = new Customer(
                    $result[0]["customer_id"],
                    $result[0]["avatar"],
                    $result[0]["first_name"],
                    $result[0]["last_name"],
                    $result[0]["address"],
                    $result[0]["phone_number"],
                    new User(
                        $result[0]["uid"],
                        $result[0]["email"],
                        $result[0]["password"],
                        $result[0]["registered_date"]
                    )
                );
            
                return true;
            }else{
                return false;
            }
           
        }
    	/**
	 * @return Customer
	 */
	function getCustomer(): Customer {
		return $this->customer;
	}
}

?>