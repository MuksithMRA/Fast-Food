<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Helpers/DBConnection.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Category.php');

class CategoryService{

    
    private $categories = [];



    public function getAllCategories()
    {
        $this->categories = [];
        $dbConnection = new DBConnection();
        $sql = "SELECT * FROM category";
        $result = $dbConnection->executeSelectQuery($sql);
         $category = new Category();
        if(count($result)>0){
        
            foreach ($result as $key => $value){
                $category->setCategory_id($value['category_id']);
                $category->setName($value['name']);
                $category->setProduct_count($value['product_count']);
                array_push($this->categories,$category);
                $category = new Category();
            }
        
            
        } 
        return $this->categories;
    }
	/**
	 * @return mixed
	 */
	function getCategories() {
		return $this->categories;
	}
}

?>

