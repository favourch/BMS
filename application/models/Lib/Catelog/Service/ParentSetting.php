<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: ParentSetting
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the ParentSetting Object
 *
 */
class Base_Model_Lib_Catelog_Service_ParentSetting extends Base_Model_Lib_Eav_Model_Service {

	public $parentSetting;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a ParentSetting information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Catelog_Entity_ParentSetting
	 */

	public function getItem($id) {
		$parentSetting = "";
		try {
			$objParentSetting 		= new Base_Model_Lib_Catelog_Dao_ParentSetting ( );
			$parentSetting 			= $objParentSetting->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_ParentSetting</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $parentSetting;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All ParentSetting information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_ParentSetting
	 */

	public function getAll() {
		$parentSetting = "";
		try {
			$objParentSetting 	= new Base_Model_Lib_Catelog_Dao_ParentSetting();
			$parentSetting 		= $objParentSetting->getAll();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_ParentSetting</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $parentSetting;
	}
        
        
        /*
	 * @name        : getAll()
	 * @Description : The function is to get All ParentSetting information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_ParentSetting
	 */

	public function getAllWithSettings() {
		$parentSetting = "";
		try {
			$objParentSetting 	= new Base_Model_Lib_Catelog_Dao_ParentSetting();
			$parentSetting 		= $objParentSetting->getAllWithSettings();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_ParentSetting</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $parentSetting;
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
			if (! ($this->parentSetting instanceof Base_Model_Lib_Catelog_Entity_ParentSetting))
			throw new Base_Model_Lib_System_Exception ( " ParentSetting Entity not intialized" );
                        
                        
                        $objParentSettingDao = new Base_Model_Lib_Catelog_Dao_ParentSetting();
			$objParentSettingDao->parentSetting = $this->parentSetting;
			$success = $objParentSettingDao->updateItem();
                        
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_ParentSetting</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	}
}
?>