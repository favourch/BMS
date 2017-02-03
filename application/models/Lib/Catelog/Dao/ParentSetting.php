<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: ParentSetting
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
class Base_Model_Lib_Catelog_Dao_ParentSetting extends Zend_Db_Table {
	protected $_name = 'tbl_parent_setting'; // the table name
	protected $_primary = 'id'; // the primary key


	public $parentSetting;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a ParentSetting information
	 * 				  from the database.
	 * @param       : $id (ParentSetting Id)
	 * @return      : Entity ParentSetting Object (Base_Model_Lib_Catelog_Entity_ParentSetting)
	 */
	public function getItem($ParentSettingId) {
		$objParentSetting = new Base_Model_Lib_Catelog_Entity_ParentSetting();

		try {
			if($ParentSettingId){
				$id = ( int ) $ParentSettingId;
				$row = $this->fetchRow ( 'id = ' . $id );
	
				if ($row != "") {
					$result = $row->toArray ();
					$objParentSetting->setId($row ['id']);
                                        $objParentSetting->setName($row ['name']);
                                        $objParentSetting->setNameKey($row ['name_key']);
				}
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_ParentSetting</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objParentSetting;
	}


	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAll() {
		$ParentSetting = array ();

		try {
			$objParentSetting = new Base_Model_Lib_Catelog_Entity_ParentSetting ( );
				
			$select = $this->select ()
                                ->from ('tbl_parent_setting', array ('id' ) );
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objParentSetting = $this->getItem ( $row->id );
				array_push ( $ParentSetting, $objParentSetting);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $ParentSetting;
	}
        
        
        	/*
	 * @name        : getItem
	 * @Description : The function is to get a ParentSetting information
	 * 				  from the database.
	 * @param       : $id (ParentSetting Id)
	 * @return      : Entity ParentSetting Object (Base_Model_Lib_Catelog_Entity_ParentSetting)
	 */
	public function getItemWithSettings($ParentSettingId) {
		$objParentSetting = new Base_Model_Lib_Catelog_Entity_ParentSetting();
                $objSettings = new Base_Model_Lib_System_Service_Settings();

		try {
			if($ParentSettingId){
				$id = ( int ) $ParentSettingId;
				$row = $this->fetchRow ( 'id = ' . $id );
	
				if ($row != "") {
					$result = $row->toArray ();
					$objParentSetting->setId($row ['id']);
                                        $objParentSetting->setName($row ['name']);
                                        $objParentSetting->setNameKey($row ['name_key']);
                                        $objParentSetting->setSettings($objSettings->getAllByTypeAndRel('SYSTEM_SETTINGS', $row ['id']));
				}
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_ParentSetting</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objParentSetting;
	}
        
        
        	/*
	 * @name        : getAllWithSettings
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAllWithSettings() {
		$ParentSetting = array ();

		try {
			$objParentSetting = new Base_Model_Lib_Catelog_Entity_ParentSetting ( );
				
			$select = $this->select ()
                                ->from ('tbl_parent_setting', array ('id' ) );
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objParentSetting = $this->getItemWithSettings( $row->id );
				array_push ( $ParentSetting, $objParentSetting);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $ParentSetting;
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
			throw new Base_Model_Lib_System_Exception ( " Payment Method Entity not intialized" );
				
			$data = array (
                            'name'          => $this->parentSetting->getName(), 
                            'name_key'      => $this->parentSetting->getNameKey()
			);
	
			$this->update ( $data, 'id = ' . ( int ) $this->parentSetting->getId () );
			$success = true;

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Dao_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;

	}

}
?>
