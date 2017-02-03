<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Dao
 * @name 			: Group
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
class Base_Model_Lib_Product_Dao_Group extends Zend_Db_Table {
	protected $_name = 'tbl_product_group'; // the table name
	protected $_primary = 'id'; // the primary key
	

	public $group;
	
	/*
	 * @name        : getItem
	 * @Description : The function is to get a Group information
	 * 				  from the database.
	 * @param       : $id (Group Id)
	 * @return      : Entity Group Object (Base_Model_Lib_Product_Entity_Group)
	 */
	public function getItem($groupId) {
		$objGroup = new Base_Model_Lib_Product_Entity_Group ( );
		try {
			if($groupId){
				$id = ( int ) $groupId;
				$row = $this->fetchRow ( 'id = ' . $id );
				
				if ($row != "") {
					$result = $row->toArray ();
					$objGroup->setId ( $row ['id'] );
					$objGroup->setName ( $row ['name'] );
				}
			}
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Group</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objGroup;
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
			
			$data = array ('name' 	=> $this->group->getName());
			
			$last_inserted_id = $this->insert ( $data );
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Product</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
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
			
			$data = array ('name' 			=> $this->group->getName ());
			
			$this->update ( $data, 'id = ' . ( int ) $this->group->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Group</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : deleteItem
	 * @Description : The function is to delete a Group information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function deleteItem() {
		$success = false;
		try {
			
			if (! ($this->group instanceof Base_Model_Lib_Product_Entity_Group))
				throw new Base_Model_Lib_Product_Exception ( " Group Entity not intialized" );
			
			if ($this->delete ( 'id =' . ( int ) $this->group->getId () ) == '1') {
				$success = true;
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Group</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
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
		$group = array ();
		
		try {
			$objGroup = new Base_Model_Lib_Product_Entity_Group ( );
			
			$select = $this->select ()
				 ->from ( 'tbl_product_group', array ('id' ));
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objGroup = $this->getItem ( $row->id );
				array_push ( $group, $objGroup );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $group;
	}
        
        
        	/*
	 * @name        : getItem
	 * @Description : The function is to get a Group information
	 * 				  from the database.
	 * @param       : $id (Group Id)
	 * @return      : Entity Group Object (Base_Model_Lib_Product_Entity_Group)
	 */
	public function getItemWithProducts($groupId) {
		$objGroup = new Base_Model_Lib_Product_Entity_Group ( );
                $objProductService = new Base_Model_Lib_Product_Service_Product();
		try {
			if($groupId){
				$id = ( int ) $groupId;
				$row = $this->fetchRow ( 'id = ' . $id );
				
				if ($row != "") {
					$result = $row->toArray ();
					$objGroup->setId ( $row ['id'] );
					$objGroup->setName ( $row ['name'] );
                                        $objGroup->setProducts($objProductService->getAllByGroupId($groupId));
				}
			}
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Group</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objGroup;
	}
        
        
        /*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAllWithProducts() {
		$group = array ();
		
		try {
			$objGroup = new Base_Model_Lib_Product_Entity_Group ( );
			
			$select = $this->select ()
				 ->from ( 'tbl_product_group', array ('id' ));
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objGroup = $this->getItemWithProducts( $row->id );
				array_push ( $group, $objGroup );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $group;
	}

}
?>
