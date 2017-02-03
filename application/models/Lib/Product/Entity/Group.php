<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Entity
 * @name 			: Group
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com/)
 *
 * @Created on     	: 28-11-2010
 * @Modified on     : 28-11-2010
 *
 */
class Base_Model_Lib_Product_Entity_Group {

	//declare variables...
	private $id;
	private $name;
        private $products;
	
	

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

        public function getProducts() {
            return $this->products;
        }

        public function setProducts($products) {
            $this->products = $products;
        }


}
?>
