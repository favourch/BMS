<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Dao
 * @name 			: Product
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT Pvt Ltd. (http://www.pluspro.com/)
 *
 * @Created on     	: 28-11-2010
 * @Modified on     : 28-11-2010
 *
 */
class Base_Model_Lib_Product_Dao_Product extends Zend_Db_Table {
	protected $_name = 'tbl_products'; // the table name
	protected $_primary = 'id'; // the primary key
	

	public $product;
	
	/*
	 * @name        : getItem
	 * @Description : The function is to get a Product information
	 * 				  from the database.
	 * @param       : $id (Product Id)
	 * @return      : Entity Product Object (Base_Model_Lib_Product_Entity_Product)
	 */
	public function getItem($productId) {
		$objProduct = new Base_Model_Lib_Product_Entity_Product ( );
                $objProductType = new Base_Model_Lib_Product_Service_Types();
                $objProductGroup = new Base_Model_Lib_Product_Service_Group();
                $objProductPricing = new Base_Model_Lib_Product_Service_Pricing();
		try {
			if($productId){
				$id = ( int ) $productId;
				$row = $this->fetchRow ( 'id = ' . $id );
				
				if ($row != "") {
					$result = $row->toArray ();
					$objProduct->setId ( $row ['id'] );
					$objProduct->setProductType($objProductType->getItem($row ['type']));
                                        $objProduct->setProductGroup($row['gid']);
                                        $objProduct->setProductName($row ['name']);
                                        $objProduct->setProductDescription($row ['description']);
                                        $objProduct->setIsHidden($row ['hidden']);
                                        $objProduct->setShowdomainoptions($row ['showdomainoptions']);
                                        $objProduct->setWelcomeemail($row ['welcomeemail']);
                                        $objProduct->setStockcontrol($row ['stockcontrol']);
                                        $objProduct->setProductQty($row ['qty']);
                                        $objProduct->setPaytype($row ['paytype']);
                                        $objProduct->setAllowqty($row ['allowqty']);
                                        $objProduct->setRecurringcycles($row ['recurringcycles']);
                                        $objProduct->setTax($row ['tax']);
                                        $objProduct->setDownloads($row ['downloads']);
                                        $objProduct->setSortOrder($row ['sort_order']);
                                        $objProduct->setIsRetired($row ['retired']);
                                        $objProduct->setProductPrices($objProductPricing->getAll($productId));
                                        $objProduct->setHasAdmin($row['has_admin']);
                                        $objProduct->setCPanelPackage($row['c_panel_package']);
				}
			}
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Product</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objProduct;
	}
	
	/*
	 * @name        : addItem
	 * @Description : The function is to add a Product information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	
	public function addItem() {
		$last_inserted_id = 0;
		
		try {
			
			if (! ($this->product instanceof Base_Model_Lib_Product_Entity_Product))
				throw new Base_Model_Lib_Product_Exception ( " Product Entity not intialized" );
			
			$data = array (
                                'type' 			=> $this->product->getProductType(),
                                'gid' 			=> $this->product->getProductGroup(),
                                'name' 			=> $this->product->getProductName(),
                                'description' 		=> $this->product->getProductDescription(),
                                'hidden' 		=> $this->product->getIsHidden(),
                                'showdomainoptions' 	=> $this->product->getShowdomainoptions(),
                                'welcomeemail' 		=> $this->product->getWelcomeemail(),
                                'stockcontrol' 		=> $this->product->getStockcontrol(),
                                'qty' 			=> $this->product->getProductQty(),
                                'paytype' 		=> $this->product->getPaytype(),
                                'allowqty' 		=> $this->product->getAllowqty(),
                                'recurringcycles' 	=> $this->product->getRecurringcycles(),
                                'tax' 			=> $this->product->getTax(),
                                'downloads' 		=> $this->product->getDownloads(),
                                'sort_order' 		=> $this->product->getSortOrder(),
                                'retired' 		=> $this->product->getIsRetired(),
                                'has_admin' 		=> $this->product->getHasAdmin(),
                                'c_panel_package'       => $this->product->getCPanelPackage());
			
			$last_inserted_id = $this->insert ( $data );
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Product</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $last_inserted_id;
	}
	
	/*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Product information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateItem() {
		$success = false;
		try {
			
			if (! ($this->product instanceof Base_Model_Lib_Product_Entity_Product))
				throw new Base_Model_Lib_Product_Exception ( " Product Entity not intialized" );
			
			$data = array (
                                'type' 			=> $this->product->getProductType(),
                                'gid' 			=> $this->product->getProductGroup(),
                                'name' 			=> $this->product->getProductName(),
                                'description' 		=> $this->product->getProductDescription(),
                                'hidden' 		=> $this->product->getIsHidden(),
                                'showdomainoptions' 	=> $this->product->getShowdomainoptions(),
                                'welcomeemail' 		=> $this->product->getWelcomeemail(),
                                'stockcontrol' 		=> $this->product->getStockcontrol(),
                                'qty' 			=> $this->product->getProductQty(),
                                'paytype' 		=> $this->product->getPaytype(),
                                'allowqty' 		=> $this->product->getAllowqty(),
                                'recurringcycles' 	=> $this->product->getRecurringcycles(),
                                'tax' 			=> $this->product->getTax(),
                                'downloads' 		=> $this->product->getDownloads(),
                                'sort_order' 		=> $this->product->getSortOrder(),
                                'retired' 		=> $this->product->getIsRetired(),
                                'has_admin' 		=> $this->product->getHasAdmin(),
                                'c_panel_package'       => $this->product->getCPanelPackage());
			
			$this->update ( $data, 'id = ' . ( int ) $this->product->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : deleteItem
	 * @Description : The function is to delete a Product information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function deleteItem() {
		$success = false;
		try {
			
			if (! ($this->product instanceof Base_Model_Lib_Product_Entity_Product))
				throw new Base_Model_Lib_Product_Exception ( " Product Entity not intialized" );
			
			if ($this->delete ( 'id =' . ( int ) $this->product->getId () ) == '1') {
				$success = true;
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Product</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAll() {
		$product = array ();
		
		try {
			$objProduct = new Base_Model_Lib_Product_Entity_Product ( );
			
			$select = $this->select ()
						->from ( 'tbl_products', array ('id' ));
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objProduct = $this->getItem ( $row->id );
				array_push ( $product, $objProduct );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $product;
	}
        
        
        
        /*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAllByGroupId($groupId) {
		$product = array ();
		
		try {
			$objProduct = new Base_Model_Lib_Product_Entity_Product ( );
			
			$select = $this->select ()
						->from ( 'tbl_products', array ('id' ))
                                                ->where('gid = ?',$groupId);
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objProduct = $this->getItem ( $row->id );
				array_push ( $product, $objProduct );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $product;
	}

}
?>
