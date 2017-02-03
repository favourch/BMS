<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: WeekDays
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the WeekDays Object
 *
 */
class Base_Model_Lib_Catelog_Service_WeekDays extends Base_Model_Lib_Eav_Model_Service {

	public $weekDays;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a WeekDays information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Catelog_Entity_WeekDays
	 */

	public function getItem($id) {
		$weekDays = "";
		try {
			$objWeekDays 		= new Base_Model_Lib_Catelog_Dao_WeekDays ( );
			$weekDays 			= $objWeekDays->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_WeekDays</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $weekDays;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All WeekDays information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_WeekDays
	 */

	public function getAll() {
		$weekDays = "";
		try {
			$objWeekDays 	= new Base_Model_Lib_Catelog_Dao_WeekDays();
			$weekDays 		= $objWeekDays->getAll();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_WeekDays</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $weekDays;
	}
        
        
        /*
	 * @name        : getAll()
	 * @Description : The function is to get All WeekDays information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_WeekDays
	 */

	public function getAllWithSettings() {
		$weekDays = "";
		try {
			$objWeekDays 	= new Base_Model_Lib_Catelog_Dao_WeekDays();
			$weekDays 		= $objWeekDays->getAllWithSettings();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_WeekDays</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $weekDays;
	}
        
        
        /*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Settings information
	 * 				  in the database.
	 * @return      : $success true/false
	 */

	public function updateItem() {
		$success = false;
		try {
			if (! ($this->weekDays instanceof Base_Model_Lib_Catelog_Entity_WeekDays))
			throw new Base_Model_Lib_System_Exception ( " WeekDays Entity not intialized" );
                        
                        
                        $objWeekDaysDao = new Base_Model_Lib_Catelog_Dao_WeekDays();
			$objWeekDaysDao->weekDays = $this->weekDays;
			$success = $objWeekDaysDao->updateItem();
                        
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_WeekDays</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	}
}
?>