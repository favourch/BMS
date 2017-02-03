<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Status.Service
 * @name 			: StatusChange
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The Service class for the StatusChange Object 
 * 	
 */
class Base_Model_Lib_Status_Service_StatusChange extends Base_Model_Lib_Eav_Model_Service{

	const RESULT_PER_PAGE = 20; // the const variable for pagging
	public $statusChange;
	
	
/*
	 * @name        : getStatusChange
	 * @Description : The function is to get a StatusChange information
	 * 				  from the database.
	 * @param       : $id (Status Id)
	 * @return      : Base_Model_Lib_Status_Entity_StatusChange
	 */
	
	public function getStatusChange($id)
	{
		$statusChange = "";
		try {
			$objStatusChange 		= new Base_Model_Lib_Status_Dao_StatusChange();
			$statusChange 			= $objStatusChange->getStatusChange($id);
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_StatusChange</em>, <strong>Function -</strong> <em>getStatusChange()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $statusChange;
	}
	
	/*
	 * @name        : addStatusChange
	 * @Description : The function is to add a statusChange information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	public function addStatusChange()
	{
			$last_inserted_id = 0;
		try	{

			if(!($this->statusChange instanceof Base_Model_Lib_Status_Entity_StatusChange))
			throw new Base_Model_Lib_Status_Exception(" StatusChange Entity not intialized");

			$objStatusChangeDao = new Base_Model_Lib_Status_Dao_StatusChange();
			$objStatusChangeDao->statusChange = $this->statusChange;
			$last_inserted_id = $objStatusChangeDao->addStatusChange();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_StatusChange</em>, <strong>Function -</strong> <em>addStatusChange()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $last_inserted_id;
	}
	
	
	
	/*
	 * @name        : updateStatusChange
	 * @Description : The function is to update/edit a status change information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateStatusChange()
	{
			$success =  false;
		try	{

			if(!($this->statusChange instanceof Base_Model_Lib_Status_Entity_StatusChange))
			throw new Base_Model_Lib_Status_Exception(" StatusChange Entity not intialized");

			$objStatusChangeDao = new Base_Model_Lib_Status_Dao_StatusChange();
			$objStatusChangeDao->statusChange = $this->statusChange;
			$success = $objStatusChangeDao->updateStatusChange();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_StatusChange</em>, <strong>Function -</strong> <em>updateStatusChange()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $success;
	}
	
	
	
	/*
	 * @name        : deleteStatusChange()
	 * @Description : The function is to delete a status change information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function deleteStatusChange()
	{
			$success =  false;
		try	{

			if(!($this->statusChange instanceof Base_Model_Lib_Status_Entity_StatusChange))
			throw new Base_Model_Lib_Status_Exception(" StatusChange Entity not intialized");

			$objStatusChangeDao = new Base_Model_Lib_Status_Dao_StatusChange();
			$objStatusChangeDao->statusChange = $this->statusChange;
			$success = $objStatusChangeDao->deleteStatusChange();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_StatusChange</em>, <strong>Function -</strong> <em>deleteStatusChange()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		
		return $success;
	}
	
}

?>