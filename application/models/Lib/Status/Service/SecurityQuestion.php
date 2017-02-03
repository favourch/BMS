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
class Base_Model_Lib_Status_Service_SecurityQuestion extends Base_Model_Lib_Eav_Model_Service{

	
	const RESULT_PER_PAGE = 20; // the const variable for pagging
	public $securityQuestion;
	
	/*
	 * @name        : getStatus
	 * @Description : The function is to get a Status information
	 * 				  from the database.
	 * @param       : $id (Status Id)
	 * @return      : Base_Model_Lib_Status_Entity_Status
	 */
	
	public function getSecurityQuestion($id)
	{
		$objSecurityQuestion = "";
		try {
			$objStatus 		= new Base_Model_Lib_Status_Dao_SecurityQuestion();
			$objSecurityQuestion 		= $objStatus->getSecurityQuestion($id);
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>getStatus()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $objSecurityQuestion;
	}


	
	/*
	 * Function name - getAllByType($type)
	 * @description - get all the status using the type
	 */
	public function getAll(){
		$statues = "";
		try{
			$objStatusService = new Base_Model_Lib_Status_Dao_SecurityQuestion();
			$statues		  = $objStatusService->getAll();
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>deleteStatus()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $statues;
	}
}

?>