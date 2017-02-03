<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Status.Dao
 * @name 			: StatusChange
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The object-oriented interface to bcas database table tbl_status_change
 * 	
 */
class Base_Model_Lib_Status_Dao_StatusChange extends Zend_Db_Table{

	 protected $_name 				= 'tbl_status_change'; // the table name 
	 protected $_primary 			= 'id'; // the primary key
	
	 protected $_dependentTables 	= array('tbl_user','tbl_status');
	
	 protected $_referenceMap 		= array(
        	'Location' => array(
	            'columns'           => array('id'),
	            'refTableClass'     => 'Base_Model_Lib_User_Dao_User',
	            'refColumns'        => array('tbl_user_id'),
	            'onDelete'          => self::CASCADE,
	            'onUpdate'          => self::RESTRICT
        	),'Location2' => array(
	            'columns'           => array('id'),
	            'refTableClass'     => 'Base_Model_Lib_Status_Dao_Status',
	            'refColumns'        => array('tbl_status_id'),
	            'onDelete'          => self::CASCADE,
	            'onUpdate'          => self::RESTRICT
        	)
        );

        
        
      // the statusChange object
      public $statusChange;
      
      
      
	/*
	 * @name        : getStatusChange
	 * @Description : The function is to get a StatusChange information
	 * 				  from the database.
	 * @param       : $id (StatusChange Id)
	 * @return      : Entity StatusChange Object (Base_Model_Lib_Status_Entity_StatusChange)
	 */
	
	public function getStatusChange($id) {
		$objStatusChange 		= new Base_Model_Lib_Status_Entity_StatusChange( );
		
		try {
			
			$id 	= ( int ) $id;
			$row 	= $this->fetchRow ( 'id = ' . $id );
			
			if ($row != "") {
				$result = $row->toArray ();
				$objStatusChange->setId($result['id']);
				$objStatusChange->setUpdatedBy($result['tbl_user_id']);
				$objStatusChange->setStatusId($result['tbl_status_id']);
				$objStatusChange->setStatusChangeObjectKey($result['status_change_object_key']);
				$objStatusChange->setUpdatedTime($result['updated_time']);
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_StatusChange</em>, <strong>Function -</strong> <em>getStatusChange()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objStatusChange;
	}
	
	/*
	 * @name        : addStatusChange
	 * @Description : The function is to add a statusChange information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	
	public function addStatusChange() {
		$last_inserted_id = 0;
		
		try {
			
			if (! ($this->statusChange instanceof Base_Model_Lib_Status_Entity_StatusChange))
				throw new Base_Model_Lib_Status_Exception ( " StatusChange Entity not intialized" );
			
			$data = array (
				'tbl_user_id' 				=> $this->statusChange->getUpdatedBy(),
				'tbl_status_id' 			=> $this->statusChange->getUpdatedBy(),
			    'updated_time'  			=> $this->statusChange->getUpdatedTime(),
				'status_change_object_key' 	=> $this->statusChange->getStatusChangeObjectKey()
			);
			$last_inserted_id = $this->insert ( $data );
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_StatusChange</em>, <strong>Function -</strong> <em>addStatusChange()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $last_inserted_id;
	}
	
	/*
	 * @name        : updateStatusChange
	 * @Description : The function is to update/edit a StatusChange information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateStatusChange() {
		$success = false;
		try {
			
			if (! ($this->statusChange instanceof Base_Model_Lib_Status_Entity_StatusChange))
				throw new Base_Model_Lib_Status_Exception ( " StatusChange Entity not intialized" );
			
			$data = array (
				'tbl_user_id' 				=> $this->statusChange->getUpdatedBy(),
				'tbl_status_id' 			=> $this->statusChange->getUpdatedBy(),
			    'updated_time'  			=> $this->statusChange->getUpdatedTime(),
				'status_change_object_key' 	=> $this->statusChange->getStatusChangeObjectKey()
			);
			$this->update ( $data, 'id = ' . ( int ) $this->statusChange->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_StatusChange</em>, <strong>Function -</strong> <em>updateStatusChange()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : deleteStatusChange
	 * @Description : The function is to delete a statusChange information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function deleteStatusChange() {
		$success = false;
		try {
			
			if (! ($this->statusChange instanceof Base_Model_Lib_Status_Entity_StatusChange))
				throw new Base_Model_Lib_Status_Exception ( " StatusChange Entity not intialized" );
			
			if ($this->delete ( 'id =' . ( int ) $this->status->getId () ) == '1') {
				$success = true;
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_StatusChange</em>, <strong>Function -</strong> <em>deleteStatusChange()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	
	
}
?>