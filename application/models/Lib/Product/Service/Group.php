<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Service
 * @name 			: Group
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com)
 *
 * Description : The Service class for the Group Object
 *
 */
class Base_Model_Lib_Product_Service_Group extends Base_Model_Lib_Eav_Model_Service {

	public $group;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a Group information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Product_Entity_Group
	 */

	public function getItem($id) {
		$group = "";
		try {
			$objGroup 		= new Base_Model_Lib_Product_Dao_Group ( );
			$group 			= $objGroup->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $group;
	}

	/*
	 * @name        : addItem
	 * @Description : The function is to add a Group information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	public function addItem() {
		$last_inserted_id = 0;
		try {

			if (! ($this->group instanceof Base_Model_Lib_Product_Entity_Group))
			throw new Base_Model_Lib_Product_Exception ( " Group Entity not intialized" );

			$objGroupDao 				= new Base_Model_Lib_Product_Dao_Group( );
			$objGroupDao->group 	= $this->group;
			$last_inserted_id			= $objGroupDao->addItem();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Group</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $last_inserted_id;
	}

	/*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Group information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateItem() {
		$success = false;
		try {

			if (! ($this->group instanceof Base_Model_Lib_Product_Entity_Group))
			throw new Base_Model_Lib_Product_Exception ( " Group Entity not intialized" );

			$objGroupDao 				= new Base_Model_Lib_Product_Dao_Group( );
			$objGroupDao->group 	= $this->group;
			$success 					= $objGroupDao->updateItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Group</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : deleteItem()
	 * @Description : The function is to update/edit a Group information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function deleteItem() {
		$success = false;
		try {

			if (! ($this->group instanceof Base_Model_Lib_Product_Entity_Group))
			throw new Base_Model_Lib_Product_Exception ( " Group Entity not intialized" );

			$objGroupDao 				= new Base_Model_Lib_Product_Dao_Group( );
			$objGroupDao->group 	= $this->group;
			$success 				= $objGroupDao->deleteItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Catelog</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All Group information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Group
	 */

	public function getAll() {
		$group = "";
		try {
			$objGroup 	= new Base_Model_Lib_Product_Dao_Group();
			$group 		= $objGroup->getAll();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Group</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $group;
	}
	

        
        /*
	 * @name        : getAll()
	 * @Description : The function is to get All Group information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Group
	 */

	public function getAllWithProducts() {
		$group = "";
		try {
			$objGroup 	= new Base_Model_Lib_Product_Dao_Group();
			$group 		= $objGroup->getAllWithProducts();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Group</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $group;
	}

}
?>