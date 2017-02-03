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
class Base_Model_Lib_Status_Dao_SecurityQuestion extends Zend_Db_Table{

	
	protected $_name 		= 'tbl_security_question'; // the table name 
	protected $_primary 	= 'id'; // the primary key
	

	public $securityQuestion;
	
	/*
	 * @name        : getStatus
	 * @Description : The function is to get a Status information
	 * 				  from the database.
	 * @param       : $id (Status Id)
	 * @return      : Entity Status Object (Base_Model_Lib_Status_Entity_Status)
	 */
	
	public function getSecurityQuestion($id) {
		$objSecurityQuestion 		= new Base_Model_Lib_Status_Entity_SecurityQuestion( );
		
		try {
			
			$id 	= ( int ) $id;
			$row 	= $this->fetchRow ( 'id = ' . $id );
			
			if ($row != "") {
				$result = $row->toArray ();
				$objSecurityQuestion->setId($result['id']);
				$objSecurityQuestion->setName($result['name']);
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Dao_SecurityQuestion</em>, <strong>Function -</strong> <em>getStatus()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objSecurityQuestion;
	}
	
	
	
	/*
	 * @name        : getAllByType
	 * @Description : 
	 * @return      : 
	 */
	
	public function getAll() {
		$statues = array ();
		
		try {
			$objStatus = new Base_Model_Lib_Status_Entity_SecurityQuestion();
			
			$select = $this->select ()
					->from ('tbl_security_question',array ('id'));
			//print($select->__toString());
			//exit;
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objStatus = $this->getSecurityQuestion( $row->id );
				array_push ($statues, $objStatus );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $statues;
	}
	
}
?>