<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Helpers/DBConnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/Model/Customer.php');
    class UserService{

        public static Customer $customer;

        public static function getUser($email)
        {
            
            $sql = "SELECT * FROM customer c JOIN auth a ON c.auth_id = a.uid WHERE email = '".$email."'";
            $rowCountSql = "SELECT count(uid) AS rowCount FROM customer c JOIN auth a ON c.auth_id = a.uid WHERE email = '".$email."'";
            $dbcontroller = new DBConnection();
            $rowCount = $dbcontroller->executeSelectQuery($rowCountSql);
            $result = $dbcontroller->executeSelectQuery($sql);

            
            if($rowCount[0]["rowCount"]>0){
                self::$customer = new Customer(
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
    
}

?>