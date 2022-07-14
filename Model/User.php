<?php

    class User{
        private $uid;
        private $email;
        private $password;
        private $createdDate;

        
        public function __construct($uid,$email,$password,$createdDate)
        {
            $this->uid = $uid;
            $this->email = $email;
            $this->password = $password;
            $this->createdDate = $createdDate;
        }


    	/**
	 * @return mixed
	 */
	function getUid() {
		return $this->uid;
	}
	
	/**
	 * @param mixed $uid 
	 * @return User
	 */
	function setUid($uid): self {
		$this->uid = $uid;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return User
	 */
	function setEmail($email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	function getPassword() {
		return $this->password;
	}
	
	/**
	 * @param mixed $password 
	 * @return User
	 */
	function setPassword($password): self {
		$this->password = $password;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	function getCreatedDate() {
		return $this->createdDate;
	}
	
	/**
	 * @param mixed $createdDate 
	 * @return User
	 */
	function setCreatedDate($createdDate): self {
		$this->createdDate = $createdDate;
		return $this;
	}
}


?>