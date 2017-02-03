<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Status.Service
 * @name 			: Status
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The Service class for the Status Object 
 * 	
 */
class Base_Model_Lib_Status_Service_Status extends Base_Model_Lib_Eav_Model_Service{

	
	const RESULT_PER_PAGE = 20; // the const variable for pagging
	public $status;
	
	/*
	 * @name        : getStatus
	 * @Description : The function is to get a Status information
	 * 				  from the database.
	 * @param       : $id (Status Id)
	 * @return      : Base_Model_Lib_Status_Entity_Status
	 */
	
	public function getStatus($id)
	{
		$status = "";
		try {
			$objStatus 		= new Base_Model_Lib_Status_Dao_Status();
			$status 		= $objStatus->getStatus($id);
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>getStatus()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $status;
	}
	
	/*
	 * @name        : addStatus
	 * @Description : The function is to add a status information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	public function addStatus()
	{
			$last_inserted_id = 0;
		try	{

			if(!($this->status instanceof Base_Model_Lib_Status_Entity_Status))
			throw new Base_Model_Lib_Status_Exception(" Status Entity not intialized");

			$objStatusDao = new Base_Model_Lib_Status_Dao_Status();
			$objStatusDao->status = $this->status;
			$last_inserted_id = $objStatusDao->addStatus();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>addStatus()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $last_inserted_id;
	}
	
	
	
	/*
	 * @name        : updateStatus
	 * @Description : The function is to update/edit a status information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateStatus()
	{
			$success =  false;
		try	{

			if(!($this->status instanceof Base_Model_Lib_Status_Entity_Status))
			throw new Base_Model_Lib_Status_Exception(" Status Entity not intialized");

			$objStatusDao = new Base_Model_Lib_Status_Dao_Status();
			$objStatusDao->status = $this->status;
			$success = $objStatusDao->updateStatus();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>updateProgram()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $success;
	}
	
	
	
	/*
	 * @name        : deleteStatus()
	 * @Description : The function is to delete a status information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function deleteStatus()
	{
			$success =  false;
		try	{

			if(!($this->status instanceof Base_Model_Lib_Status_Entity_Status))
			throw new Base_Model_Lib_Status_Exception(" Status Entity not intialized");

			$objStatusDao = new Base_Model_Lib_Status_Dao_Status();
			$objStatusDao->status = $this->status;
			$success = $objStatusDao->deleteStatus();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>deleteStatus()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $success;
	}
	
	
	/*
	 * Function name - getAllByType($type)
	 * @description - get all the status using the type
	 */
	public function getAllByType($type){
		$statues = "";
		try{
			$objStatusService = new Base_Model_Lib_Status_Dao_Status();
			$statues		  = $objStatusService->getAllByType($type);
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>deleteStatus()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $statues;
	}
}

?>