<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Service
 * @name 			: UserLog
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The Service class for the UserLog Object 
 * 	
 */
class Base_Model_Lib_User_Service_UserLog extends Base_Model_Lib_Eav_Model_Service{
	
	const RESULT_PER_PAGE = 20; // the const variable for pagging
	public $userLog;
	
	
/*
	 * @name        : getUserLog
	 * @Description : The function is to get a user log information
	 * 				  from the database.
	 * @param       : $id (UserLog Id)
	 * @return      : Base_Model_Lib_User_Entity_UserLog
	 */
	
	public function getUserLog($id)
	{
		$userLog = "";
		try {
			$objUserLog 		= new Base_Model_Lib_User_Dao_UserLog();
			$userLog 			= $objUserLog->getUserLog($id);
		} catch( Exception $e) {
			throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_UserLog</em>, <strong>Function -</strong> <em>getUserLog()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $userLog;
	}
	
	/*
	 * @name        : addUserLog
	 * @Description : The function is to add a user Log information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	public function addUserLog()
	{
			$last_inserted_id = 0;
		try	{

			if(!($this->userLog instanceof Base_Model_Lib_User_Entity_UserLog))
			throw new Base_Model_Lib_User_Exception(" UserLog Entity not intialized");

			$objUserLogDao 			= new Base_Model_Lib_User_Dao_UserLog();
			$objUserLogDao->userLog	= $this->userLog;
			$last_inserted_id 		= $objUserLogDao->addUserLog();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_UserLog</em>, <strong>Function -</strong> <em>addUserLog()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $last_inserted_id;
	}
	
	
	
	/*
	 * @name        : updateUserLog
	 * @Description : The function is to add a user Log information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	public function upldateUserLog()
	{
			$last_inserted_id = 0;
		try	{

			if(!($this->userLog instanceof Base_Model_Lib_User_Entity_UserLog))
			throw new Base_Model_Lib_User_Exception(" UserLog Entity not intialized");

			$objUserLogDao 			= new Base_Model_Lib_User_Dao_UserLog();
			$objUserLogDao->userLog	= $this->userLog;
			$last_inserted_id 		= $objUserLogDao->upldateUserLog();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_UserLog</em>, <strong>Function -</strong> <em>addUserLog()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $last_inserted_id;
	}

	/*
	 * @name        : getAll
	 * @Description : The function is to get All user information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_User_Dao_User
	 */
	
	public function getAll()
	{
		$userHistory = "";
		try {
			$objUserLogDao 			= new Base_Model_Lib_User_Dao_UserLog();
			$userHistory 			= $objUserLogDao->getAll();
		
		} catch( Exception $e) {
			throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $userHistory;
	}
	
	
	
/*
	 * @name        : search()
	 * @Description : The function is to add a user Log information
	 * 				  to the database.
	 * @return      : array of userLog Objects
	 */
	public function search()
	{
			$userLogs = "";
		try	{

			if(!($this->userLog instanceof Base_Model_Lib_User_Entity_UserLog))
			throw new Base_Model_Lib_User_Exception(" UserLog Entity not intialized");

			$objUserLogDao 			= new Base_Model_Lib_User_Dao_UserLog();
			$objUserLogDao->userLog	= $this->userLog;
			$userLogs 				= $objUserLogDao->search();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_UserLog</em>, <strong>Function -</strong> <em>addUserLog()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $userLogs;
	}
        
        
        
        /*
	 * @name        : search()
	 * @Description : The function is to add a user Log information
	 * 				  to the database.
	 * @return      : array of userLog Objects
	 */
	public function searchCount()
	{
			$totalUserLogs = 0;
		try	{

			if(!($this->userLog instanceof Base_Model_Lib_User_Entity_UserLog))
			throw new Base_Model_Lib_User_Exception(" UserLog Entity not intialized");

			$objUserLogDao 			= new Base_Model_Lib_User_Dao_UserLog();
			$objUserLogDao->userLog	= $this->userLog;
			$totalUserLogs 				= $objUserLogDao->searchCount();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_UserLog</em>, <strong>Function -</strong> <em>addUserLog()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $totalUserLogs;
	}
	
	
/*
	 * @name        : getLastLoginDetails
	 * @Description : The function is to get last login details for a  user
	 * 				  from the database.
	 * @return      : Aray Of Entity UserLog Object (Base_Model_Lib_User_Entity_UserLog)
	 */
	
	public function getLastLoginDetails($userId)
	{
		$userLog = "";
		try {
			$objUserLog 		= new Base_Model_Lib_User_Dao_UserLog();
			$userLog 			= $objUserLog->getLastLoginDetails($userId);
		} catch( Exception $e) {
			throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_UserLog</em>, <strong>Function -</strong> <em>getUserLog()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $userLog;
	}
	
}
?>