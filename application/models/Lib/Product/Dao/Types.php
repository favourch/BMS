<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Dao
 * @name 			: Types
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
class Base_Model_Lib_Product_Dao_Types extends Zend_Db_Table {
	protected $_name = 'tbl_types'; // the table name
	protected $_primary = 'id'; // the primary key
	

	public $types;
	
	/*
	 * @name        : getItem
	 * @Description : The function is to get a Types information
	 * 				  from the database.
	 * @param       : $id (Types Id)
	 * @return      : Entity Types Object (Base_Model_Lib_Product_Entity_Types)
	 */
	public function getItem($typesId) {
		$objTypes = new Base_Model_Lib_Product_Entity_Types ( );
		try {
			if($typesId){
				$id = ( int ) $typesId;
				$row = $this->fetchRow ( 'id = ' . $id );
				
				if ($row != "") {
					$result = $row->toArray ();
					$objTypes->setId ( $row ['id'] );
					$objTypes->setName ( $row ['name'] );
				}
			}
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Types</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objTypes;
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
			
			$data = array (
							'name' 			=> $this->types->getName (),
							'object_name' 	=> $this->types->getObjectType());
			
			$last_inserted_id = $this->insert ( $data );
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Product</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
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
			
			$data = array (
							'name' 			=> $this->types->getName (),
							'object_name' 	=> $this->types->getObjectType());
			
			$this->update ( $data, 'id = ' . ( int ) $this->types->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Types</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : deleteItem
	 * @Description : The function is to delete a Types information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function deleteItem() {
		$success = false;
		try {
			
			if (! ($this->types instanceof Base_Model_Lib_Product_Entity_Types))
				throw new Base_Model_Lib_Product_Exception ( " Types Entity not intialized" );
			
			if ($this->delete ( 'id =' . ( int ) $this->types->getId () ) == '1') {
				$success = true;
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Types</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAll($objectname) {
		$types = array ();
		
		try {
			$objTypes = new Base_Model_Lib_Product_Entity_Types ( );
			
			$select = $this->select ()
						->from ( 'tbl_types', array ('id' ))
						->where('object_name = ?', $objectname);
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objTypes = $this->getItem ( $row->id );
				array_push ( $types, $objTypes );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $types;
	}

}
?>
