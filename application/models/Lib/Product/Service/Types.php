<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Service
 * @name 			: Types
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com)
 *
 * Description : The Service class for the Types Object
 *
 */
class Base_Model_Lib_Product_Service_Types extends Base_Model_Lib_Eav_Model_Service {

	public $types;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a Types information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Product_Entity_Types
	 */

	public function getItem($id) {
		$types = "";
		try {
			$objTypes 		= new Base_Model_Lib_Product_Dao_Types ( );
			$types 			= $objTypes->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $types;
	}

	/*
	 * @name        : addItem
	 * @Description : The function is to add a Types information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	public function addItem() {
		$last_inserted_id = 0;
		try {

			if (! ($this->types instanceof Base_Model_Lib_Product_Entity_Types))
			throw new Base_Model_Lib_Product_Exception ( " Types Entity not intialized" );

			$objTypesDao 				= new Base_Model_Lib_Product_Dao_Types( );
			$objTypesDao->types 	= $this->types;
			$last_inserted_id			= $objTypesDao->addItem();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Types</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $last_inserted_id;
	}

	/*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Types information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateItem() {
		$success = false;
		try {

			if (! ($this->types instanceof Base_Model_Lib_Product_Entity_Types))
			throw new Base_Model_Lib_Product_Exception ( " Types Entity not intialized" );

			$objTypesDao 				= new Base_Model_Lib_Product_Dao_Types( );
			$objTypesDao->types 	= $this->types;
			$success 					= $objTypesDao->updateItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Types</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : deleteItem()
	 * @Description : The function is to update/edit a Types information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function deleteItem() {
		$success = false;
		try {

			if (! ($this->types instanceof Base_Model_Lib_Product_Entity_Types))
			throw new Base_Model_Lib_Product_Exception ( " Types Entity not intialized" );

			$objTypesDao 				= new Base_Model_Lib_Product_Dao_Types( );
			$objTypesDao->types 	= $this->types;
			$success 				= $objTypesDao->deleteItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Catelog</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All Types information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Types
	 */

	public function getAll($objectname) {
		$types = "";
		try {
			$objTypes 	= new Base_Model_Lib_Product_Dao_Types();
			$types 		= $objTypes->getAll($objectname);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Types</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $types;
	}
	


}
?>