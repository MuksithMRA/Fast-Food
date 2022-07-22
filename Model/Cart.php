<?php 

    class Cart{
        private int $cart_id;
        private int $prod_id;
        private int $cust_id;
        private int $qty;

        
    	/**
	 * @return int
	 */
	function getCart_id(): int {
		return $this->cart_id;
	}
	
	/**
	 * @param int $cart_id 
	 * @return Cart
	 */
	function setCart_id(int $cart_id): self {
		$this->cart_id = $cart_id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	function getProd_id(): int {
		return $this->prod_id;
	}
	
	/**
	 * @param int $prod_id 
	 * @return Cart
	 */
	function setProd_id(int $prod_id): self {
		$this->prod_id = $prod_id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	function getCust_id(): int {
		return $this->cust_id;
	}
	
	/**
	 * @param int $cust_id 
	 * @return Cart
	 */
	function setCust_id(int $cust_id): self {
		$this->cust_id = $cust_id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	function getQty(): int {
		return $this->qty;
	}
	
	/**
	 * @param int $qty 
	 * @return Cart
	 */
	function setQty(int $qty): self {
		$this->qty = $qty;
		return $this;
	}
}
?>