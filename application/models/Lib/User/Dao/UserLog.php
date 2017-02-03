<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Dao
 * @name 			: UserLog
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The object-oriented interface to bcas database table tbl_user_login_history
 * 	
 */
class Base_Model_Lib_User_Dao_UserLog extends Zend_Db_Table {
	
	protected $_name = 'tbl_user_login_history'; // the table name 
	protected $_primary = 'id'; // the primary key
	

	// the user object
	public $userLog;
	
	// the methods goes from here......
	/*
	 * @name        : getUserLog
	 * @Description : The function is to get a userLog information
	 * 				  from the database.
	 * @param       : $id (User Id)
	 * @return      : Entity UserLog Object (Base_Model_Lib_User_Entity_UserLog)
	 */
	
	public function getUserLog($id) {
		$objUserLog = new Base_Model_Lib_User_Entity_UserLog ( );
		$objUser    = new Base_Model_Lib_User_Service_User();
		try {
			
			$id = ( int ) $id;
			$row = $this->fetchRow ( 'id = ' . $id );
			
			if ($row != "") {
				$result = $row->toArray ();
				$objUserLog->setId ( $result ['id'] );
				$objUserLog->setLoginDate ( $result ['login_date'] );
				$objUserLog->setLoginTime ( $result ['login_time'] );
				$objUserLog->setLogoutTime( $result ['logout_time'] );
				$objUserLog->setTotalUsedTime( $result ['total_used_time'] );
				$objUserLog->setUserId( $result ['tbl_user_id'] );
				$objUserLog->setLoginFrom($result ['login_from']);
				$objUserLog->setUserInfo($objUser->getUser($result ['tbl_user_id']));
                                $objUserLog->setUserType($result ['user_type']);
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>getUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objUserLog;
	}
	
	/*
	 * @name        : addUserLog
	 * @Description : The function is to add a user log information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	
	public function addUserLog() {
		$last_inserted_id = 0;
		
		try {
			
			if (! ($this->userLog instanceof Base_Model_Lib_User_Entity_UserLog))
				throw new Base_Model_Lib_User_Exception ( " UserLog Entity not intialized" );
			
			$data = array (
					'login_date'		=> $this->userLog->getLoginDate(),
					'login_time'		=> $this->userLog->getLoginTime(),
					'logout_time'		=> $this->userLog->getLogoutTime(),
					'total_used_time'	=> $this->userLog->getTotalUsedTime(),
					'tbl_user_id'		=> $this->userLog->getUserId(),
                                        'user_type'		=> $this->userLog->getUserType(),
					'login_from'		=> $this->userLog->getLoginFrom()
			);
			
			$last_inserted_id = $this->insert ( $data );
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserLog</em>, <strong>Function -</strong> <em>addUserLog()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $last_inserted_id;
	}
	
	
	
/*
	 * @name        : addUserLog
	 * @Description : The function is to add a user log information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	
	public function upldateUserLog() {
		$success = false;
		try {
			
			if (! ($this->userLog instanceof Base_Model_Lib_User_Entity_UserLog))
				throw new Base_Model_Lib_User_Exception ( " UserLog Entity not intialized" );
			
			$data = array (
					'logout_time'		=> $this->userLog->getLogoutTime(),
					'total_used_time'	=> $this->userLog->getTotalUsedTime(),
					'tbl_user_id'		=> $this->userLog->getUserId()
			);
				
			
			$this->update ( $data, 'id = ' . ( int ) $this->userLog->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_Batch</em>, <strong>Function -</strong> <em>updateBatch()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
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
		$userLogs = array ();
		
		try {
			$objUserLog = new Base_Model_Lib_User_Entity_UserLog ( );
			
			$select = $this->select ()->from ( 'tbl_user_login_history', array ('id' ) );
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objUserLog = $this->getUserLog ( $row->id );
				array_push ( $userLogs, $objUserLog );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $userLogs;
	}
	
	
	
	
	/*
	 * @name        : search
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function search() {
		$userLogs = array ();
		$arrWhere    = array();
		$sql		 = "";
		try {
			if (! ($this->userLog instanceof Base_Model_Lib_User_Entity_UserLog))
				throw new Base_Model_Lib_User_Exception ( " UserLog Entity not intialized" );
			
				$userId 			= $this->userLog->getUserId();
				$loginFromDate 		= $this->userLog->getLoginDateFrom();
				$loginToDate 		= $this->userLog->getLoginDateTo();
				$limitFrom          = $this->userLog->getLimitFrom();
				$limit              = $this->userLog->getLimit();
                                
                                 $sql = "SELECT id FROM tbl_user_login_history ";

                                if ($userId != '')
                                    array_push($arrWhere, "tbl_user_id = '" . $userId . "'");
				
				if (count($arrWhere) > 0)
                                    $sql.= "WHERE " . implode(' AND ', $arrWhere);

                                // $limit
                                $sql.= $limit;
                                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                                $result = $db->fetchCol($sql);
                                
                                 foreach ($result as $oid) {
                                        $objUserLog = $this->getUserLog($oid);
                                        array_push($userLogs, $objUserLog);
                                    }
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $userLogs;
	}
	
        
        
        
        /*
	 * @name        : searchCount
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function searchCount() {
		$totalUserLogs = 0;
		$arrWhere    = array();
		$sql		 = "";
		try {
			if (! ($this->userLog instanceof Base_Model_Lib_User_Entity_UserLog))
				throw new Base_Model_Lib_User_Exception ( " UserLog Entity not intialized" );
			
				$userId 			= $this->userLog->getUserId();
				$loginFromDate 		= $this->userLog->getLoginDateFrom();
				$loginToDate 		= $this->userLog->getLoginDateTo();
				$limitFrom          = $this->userLog->getLimitFrom();
				$limit              = $this->userLog->getLimit();
                                
                                 $sql = "SELECT count(id) as tot FROM tbl_user_login_history ";

                                if ($userId != '')
                                    array_push($arrWhere, "tbl_user_id = '" . $userId . "'");
				
				if (count($arrWhere) > 0)
                                    $sql.= "WHERE " . implode(' AND ', $arrWhere);

                                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                                $totalUserLogs = $db->fetchOne($sql);
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $totalUserLogs;
	}
	
	/*
	 * @name        : getLastLoginDetails
	 * @Description : The function is to get last login details for a  user
	 * 				  from the database.
	 * @return      : Aray Of Entity UserLog Object (Base_Model_Lib_User_Entity_UserLog)
	 */
	
	public function getLastLoginDetails($userId) {
		$objUserLog = "";
		
		try {
			$objUserLog = new Base_Model_Lib_User_Entity_UserLog ( );
			
			$select = $this->select ()
						->from ('tbl_user_login_history', array('id'))
						->where('tbl_user_id = ?', $userId)
						->order(array('login_date DESC','login_time DESC'))
					  	->limit(1, 0);
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objUserLog = $this->getUserLog ( $row->id );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objUserLog;
	}

}
?>