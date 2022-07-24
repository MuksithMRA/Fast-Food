<?php  

    class Order_T{
        private int $order_id;
        private int $auth_id;
        private String $address;
        private int $phone_number;
        private String $payment_method;
        private  $listOfOrderProducts;

        private DateTime $ordered_date;
    	

	function getOrder_id(): int {
		return $this->order_id;
	}
	
	
	function setOrder_id(int $order_id): self {
		$this->order_id = $order_id;
		return $this;
	}
	
	
	function getAuth_id(): int {
		return $this->auth_id;
	}
	
	
	function setAuth_id(int $auth_id): self {
		$this->auth_id = $auth_id;
		return $this;
	}
	
	
	function getOrdered_date(): DateTime {
		return $this->ordered_date;
	}
	
	
	function setOrdered_date(DateTime $ordered_date): self {
		$this->ordered_date = $ordered_date;
		return $this;
	}
	
	function getAddress(): string {
		return $this->address;
	}
	
	
	function setAddress(string $address): self {
		$this->address = $address;
		return $this;
	}
	
	
	function getPayment_method(): string {
		return $this->payment_method;
	}
	
	
	function setPayment_method(string $payment_method): self {
		$this->payment_method = $payment_method;
		return $this;
	}
	

	function getPhone_number(): int {
		return $this->phone_number;
	}
	

	function setPhone_number(int $phone_number): self {
		$this->phone_number = $phone_number;
		return $this;
	}
	

	function getListOfOrderProducts() {
		return $this->listOfOrderProducts;
	}
	
	
	function setListOfOrderProducts($listOfOrderProducts): self {
		$this->listOfOrderProducts = $listOfOrderProducts;
		return $this;
	}
}
