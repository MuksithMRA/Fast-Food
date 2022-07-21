<?php

    class Category{
        private int $category_id;
        private String $name;
        private int $product_count;
        
    	/**
	 * @return int
	 */
	function getCategory_id(): int {
		return $this->category_id;
	}
	
	/**
	 * @param int $category_id 
	 * @return Category
	 */
	function setCategory_id(int $category_id): self {
		$this->category_id = $category_id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return Category
	 */
	function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return int
	 */
	function getProduct_count(): int {
		return $this->product_count;
	}
	
	/**
	 * @param int $product_count 
	 * @return Category
	 */
	function setProduct_count(int $product_count): self {
		$this->product_count = $product_count;
		return $this;
	}
}

?>