<?php
  class DBConnection{
    public $conn = "";
    private $servername = "104.152.222.128";
    private $username = "irixsolu_fast_food_user";
    private $password = "fastfood123?";
    private $db = "irixsolu_fast_food_db";

    function __construct() {
      $conn = $this->connectDB();
      if(!empty($conn)) {
        $this->conn = $conn;			
      }
    }
    
    
    // Check connection
    function connectDB() {
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      return $conn;
    }

    function executeQuery($query) {
      $conn = $this->connectDB();    
      $result = mysqli_query($conn, $query);
      if (!$result) {
          //check for duplicate entry
          if($conn->errno == 1062) {
              return false;
          } else {
              trigger_error (mysqli_error($conn),E_USER_NOTICE);
      
          }
      }		
      $affectedRows = mysqli_affected_rows($conn);
      return $affectedRows;
    }

    function executeSelectQuery($sql) {
      $result = $this->conn->query($sql);
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $resultSet[] = $row;
        }
      }
      
      if(!empty($resultSet))
          return $resultSet;
      }
  } 
  
?>







