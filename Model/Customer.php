<?php
include($_SERVER['DOCUMENT_ROOT'].'/Model/User.php');
    Class Customer{
        private $id;
		private $avatar;
        private $first_name;
        private $last_name;
        private $address;
        private $phone_number;
		
        private User $user;

        public function __construct($id,$avatar,$first_name,$last_name,$address,$phone_number,$user)
        {
            $this->id = $id;
			$this->avatar = $avatar;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->address = $address;
            $this->phone_number = $phone_number;
            $this->user = $user;
        }

        
    	/**
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return Customer
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	function getFirst_name() {
		return $this->first_name;
	}
	
	/**
	 * @param mixed $first_name 
	 * @return Customer
	 */
	function setFirst_name($first_name): self {
		$this->first_name = $first_name;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	function getLast_name() {
		return $this->last_name;
	}
	
	/**
	 * @param mixed $last_name 
	 * @return Customer
	 */
	function setLast_name($last_name): self {
		$this->last_name = $last_name;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	function getAddress() {
		return $this->address;
	}
	
	/**
	 * @param mixed $address 
	 * @return Customer
	 */
	function setAddress($address): self {
		$this->address = $address;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	function getPhone_number() {
		return $this->phone_number;
	}
	
	/**
	 * @param mixed $phone_number 
	 * @return Customer
	 */
	function setPhone_number($phone_number): self {
		$this->phone_number = $phone_number;
		return $this;
	}
	
	
	/**
	 * @return mixed
	 */
	function getAvatar() {
		return $this->avatar;
	}
	
	/**
	 * @param mixed $avatar 
	 * @return Customer
	 */
	function setAvatar($avatar): self {
		$this->avatar = $avatar;
		return $this;
	}
	/**
	 * @return User
	 */
	function getUser(): User {
		return $this->user;
	}
	
	/**
	 * @param User $user 
	 * @return Customer
	 */
	function setUser(User $user): self {
		$this->user = $user;
		return $this;
	}
}
