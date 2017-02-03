<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Status.Dao
 * @name 			: Status
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The object-oriented interface to bcas database table tbl_status
 * 	
 */
class Base_Model_Lib_Status_Dao_Status extends Zend_Db_Table{

	
	protected $_name 		= 'tbl_status'; // the table name 
	protected $_primary 	= 'id'; // the primary key
	

	public $status;
	
	/*
	 * @name        : getStatus
	 * @Description : The function is to get a Status information
	 * 				  from the database.
	 * @param       : $id (Status Id)
	 * @return      : Entity Status Object (Base_Model_Lib_Status_Entity_Status)
	 */
	
	public function getStatus($id) {
		$objStatus 		= new Base_Model_Lib_Status_Entity_Status( );
		
		try {
			
			$id 	= ( int ) $id;
			$row 	= $this->fetchRow ( 'id = ' . $id );
			
			if ($row != "") {
				$result = $row->toArray ();
				$objStatus->setId($result['id']);
				$objStatus->setName($result['name']);
				$objStatus->setType($result['type_2']);
                                $objStatus->setStatusColorCode($result['status_color_code']);
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_Status</em>, <strong>Function -</strong> <em>getStatus()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objStatus;
	}
	
	/*
	 * @name        : addStatus
	 * @Description : The function is to add a status information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	
	public function addStatus() {
		$last_inserted_id = 0;
		
		try {
			
			if (! ($this->status instanceof Base_Model_Lib_Status_Entity_Status))
				throw new Base_Model_Lib_Status_Exception ( " Status Entity not intialized" );
			
			$data = array (
				'name' => $this->status->getName(),
				'type_2' => $this->status->getType(),
                                'status_color_code' => $this->status->getStatusColorCode()
			);
			$last_inserted_id = $this->insert ( $data );
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_Status</em>, <strong>Function -</strong> <em>addStatus()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $last_inserted_id;
	}
	
	/*
	 * @name        : updateStatus
	 * @Description : The function is to update/edit a Status information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateStatus() {
		$success = false;
		try {
			
			if (! ($this->status instanceof Base_Model_Lib_Status_Entity_Status))
				throw new Base_Model_Lib_Status_Exception ( " Status Entity not intialized" );
			
			$data = array (
				'name' => $this->status->getName(),
				'type_2' => $this->status->getType(),
                                'status_color_code' => $this->status->getStatusColorCode()
			);
			$this->update ( $data, 'id = ' . ( int ) $this->status->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_Status</em>, <strong>Function -</strong> <em>updateLocation()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : deleteStatus
	 * @Description : The function is to delete a status information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function deleteStatus() {
		$success = false;
		try {
			
			if (! ($this->status instanceof Base_Model_Lib_Status_Entity_Status))
				throw new Base_Model_Lib_Status_Exception ( " Status Entity not intialized" );
			
			if ($this->delete ( 'id =' . ( int ) $this->status->getId () ) == '1') {
				$success = true;
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_Status</em>, <strong>Function -</strong> <em>deleteStatus()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	
	
	/*
	 * @name        : getAllByType
	 * @Description : 
	 * @return      : 
	 */
	
	public function getAllByType($type) {
		$statues = array ();
		
		try {
			$objStatus = new Base_Model_Lib_Status_Entity_Status();
			
			$select = $this->select ()
					->from ('tbl_status',array ('id'))
					->where('type_2 = ?',$type);
			//print($select->__toString());
			//exit;
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objStatus = $this->getStatus( $row->id );
				array_push ($statues, $objStatus );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $statues;
	}
	
}
?>