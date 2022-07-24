<?php

    class OrderProduct{

        private int $id;
        private int $product_id;
        private int $qty;
        private int $order_id; 

        
    	/**
	 * @return int
	 */
	function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return OrderProduct
	 */
	function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * @return int
	 */
	function getProduct_id(): int {
		return $this->product_id;
	}
	
	/**
	 * @param int $product_id 
	 * @return OrderProduct
	 */
	function setProduct_id(int $product_id): self {
		$this->product_id = $product_id;
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
	 * @return OrderProduct
	 */
	function setQty(int $qty): self {
		$this->qty = $qty;
		return $this;
	}
	
	/**
	 * @return int
	 */
	function getOrder_id(): int {
		return $this->order_id;
	}
	
	/**
	 * @param int $order_id 
	 * @return OrderProduct
	 */
	function setOrder_id(int $order_id): self {
		$this->order_id = $order_id;
		return $this;
	}

    public function FunctionName()
    {
        # code...
    }
}

?>