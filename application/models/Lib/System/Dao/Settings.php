<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Dao
 * @name 			: Settings
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Jasmin Media . (http://www.jasmin-media.com/)
 *
 * @Created on     	: 11-04-2010
 * @Modified on     : 11-04-2010
 *
 */
class Base_Model_Lib_System_Dao_Settings extends Zend_Db_Table {
	protected $_name 	= 'tbl_setting'; // the table name
	protected $_primary = 'id'; // the primary key


	public $settings;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a Settings information
	 * 				  from the database.
	 * @param       : $id (Settings Id)
	 * @return      : Entity Settings Object (Base_Model_Lib_System_Entity_Settings)
	 */
	public function getItem($settingsId) {
		$objSettings 		= new Base_Model_Lib_System_Entity_Settings ( );
		try {
				
			$id = ( int ) $settingsId;
			$row = $this->fetchRow ( 'id = ' . $id );
				
			if ($row != "") {
				$result = $row->toArray ();
				$objSettings->setId($row ['id']);
                                $objSettings->setDisplayOrder($row ['display_order']);
                                $objSettings->setRelId($row ['rel_id']);
                                $objSettings->setSettingFieldName($row ['setting_field_name']);
                                $objSettings->setSettingType($row ['setting_type']);
                                $objSettings->setSettingValue($row ['setting_value']);
                                $objSettings->setFieldDescription($row ['field_description']);
                                $objSettings->setInputType($row ['input_field_type']);
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Dao_Settings</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objSettings;
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
				
			if (! ($this->settings instanceof Base_Model_Lib_System_Entity_Settings))
			throw new Base_Model_Lib_System_Exception ( " Settings Entity not intialized" );
				
			$data = array (
                            'setting_type' 	=> $this->settings->getSettingType(), 
                            'setting_field_name'=> $this->settings->getSettingFieldName(), 
                            'setting_value'     => $this->settings->getSettingValue(),
                            'display_order' 	=> $this->settings->getDisplayOrder(),
                            'rel_id'            => $this->settings->getRelId(),
                            'field_description' => $this->settings->getFieldDescription(),
                            'input_field_type' => $this->settings->getInputType()
			);
				
			$this->update ( $data, 'id = ' . ( int ) $this->settings->getId () );
			$success = true;

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Dao_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;

	}
        
        
        /*
	 * @name        : getAllByType
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAllByType($type) {
		$settingValues = array ();
		try {
			$objSettings = new Base_Model_Lib_System_Entity_Settings();
				
			$select = $this->select ()
                                ->from ('tbl_setting', array ('id' ))
                                ->where('setting_type = ?', $type);
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objSettings = $this->getItem ( $row->id );
				array_push ($settingValues, $objSettings);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $settingValues;
	}

        
           /*
	 * @name        : getAllByType
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAllByTypeAndRel($type,$relId) {
		$settingValues = array ();
		try {
			$objSettings = new Base_Model_Lib_System_Entity_Settings();
				
			$select = $this->select ()
                                ->from ('tbl_setting', array ('id' ))
                                ->where('setting_type = ?', $type)
                                ->where('rel_id = ?', $relId);
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objSettings = $this->getItem ( $row->id );
				array_push ($settingValues, $objSettings);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $settingValues;
	}
        
        
        
        /*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Settings information
	 * 				  in the database.
	 * @return      : $success true/false
	 */

	public function updateValue() {
		$success = false;
		try {
				
			if (! ($this->settings instanceof Base_Model_Lib_System_Entity_Settings))
			throw new Base_Model_Lib_System_Exception ( " Settings Entity not intialized" );
				
			$data = array (
                            'setting_value'     => $this->settings->getSettingValue()
			);
			$this->update ( $data, 'id = ' . ( int ) $this->settings->getId () );
			$success = true;

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Dao_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;

	}

}
?>
