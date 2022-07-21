<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Helpers/DBConnection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Customer.php');

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

        public static function getAuth($email){
            echo $email;
            $sql = "SELECT count(uid) AS uid_count , uid ,email,password, registered_date FROM auth WHERE email = '$email' ";
            $dbcontroller = new DBConnection();
            $result = $dbcontroller->executeSelectQuery($sql);

            if($result[0]["uid_count"]>0){
                return new User(
                    $result[0]["uid"],
                    $result[0]["email"],
                    $result[0]["password"],
                    $result[0]["registered_date"]
                );
            }
            return null;
        }


        public static function registerUser(Customer $cust){

            $dbcontroller = new DBConnection();
			$email = $cust->getUser()->getEmail();
            $password = $cust->getUser()->getPassword();
            $regDate = $cust->getUser()->getCreatedDate();

            $sql="INSERT INTO auth VALUES(
                0,
                '$email',
                '$password',
                '$regDate'
            )";

            $result = $dbcontroller->executeQuery($sql);
			if($result != 0){
                $user = UserService::getAuth($cust->getUser()->getEmail());
                if($user != null){
                    $cust_id = $cust->getId();
                    $avatar = $cust->getAvatar();
                    $fname = $cust->getFirst_name();
                    $lname =$cust->getLast_name();
                    $address=$cust->getAddress();
                    $phone=$cust->getPhone_number();
                    $uid=$user->getUid();

                    $sql = "INSERT INTO customer VALUES(
                        '$cust_id',
                        '$avatar',
                        '$fname',
                        '$lname',
                        '$address',
                        '$phone',
                        '$uid'
                    )";

                    $result = $dbcontroller->executeQuery($sql);
                    $avatarNew = $dbcontroller->executeQuery("SELECT avatar FROM customer WHERE customer_id =  '$cust_id'")[0]['avatar'];
                    if($result != 0){
                        session_start();
                        $_SESSION["uid"] = $user->getUid();
                        $_SESSION["email"] = $user->getEmail();
                        $_SESSION["authenticated"] = true;
                        $_SESSION["fname"] = $fname;
                        $_SESSION["lname"] = $lname;
                        $_SESSION["avatar"] = $avatarNew;
                        $_SESSION["address"] = $address;
                        $_SESSION["phone"] = $phone;
                        return true;
                    }
                }
                
			}
            return false;
            
        }
    
}

?>