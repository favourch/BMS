<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: WeekDays
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
class Base_Model_Lib_Catelog_Dao_WeekDays extends Zend_Db_Table {
	protected $_name = 'tbl_week_days'; // the table name
	protected $_primary = 'id'; // the primary key


	public $weekDays;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a WeekDays information
	 * 				  from the database.
	 * @param       : $id (WeekDays Id)
	 * @return      : Entity WeekDays Object (Base_Model_Lib_Catelog_Entity_WeekDays)
	 */
	public function getItem($weekDaysId) {
		$objWeekDays = new Base_Model_Lib_Catelog_Entity_WeekDays();

		try {
			if($weekDaysId){
				$id = ( int ) $weekDaysId;
				$row = $this->fetchRow ( 'id = ' . $id );
	
				if ($row != "") {
					$result = $row->toArray ();
					$objWeekDays->setId($row ['id']);
                                        $objWeekDays->setName($row ['name']);
                                        $objWeekDays->setNameKey($row ['name_key']);
                                        $objWeekDays->setIsOpen($row ['is_open']);
				}
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_WeekDays</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objWeekDays;
	}


	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAll() {
		$weekDays = array ();

		try {
			$objWeekDays = new Base_Model_Lib_Catelog_Entity_WeekDays ( );
				
			$select = $this->select ()
                                ->from ('tbl_week_days', array ('id' ) );
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objWeekDays = $this->getItem ( $row->id );
				array_push ( $weekDays, $objWeekDays);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $weekDays;
	}
        
        
        	/*
	 * @name        : getItem
	 * @Description : The function is to get a WeekDays information
	 * 				  from the database.
	 * @param       : $id (WeekDays Id)
	 * @return      : Entity WeekDays Object (Base_Model_Lib_Catelog_Entity_WeekDays)
	 */
	public function getItemWithSettings($weekDaysId) {
		$objWeekDays = new Base_Model_Lib_Catelog_Entity_WeekDays();
                $objSettings = new Base_Model_Lib_System_Service_Settings();

		try {
			if($weekDaysId){
				$id = ( int ) $weekDaysId;
				$row = $this->fetchRow ( 'id = ' . $id );
	
				if ($row != "") {
					$result = $row->toArray ();
					$objWeekDays->setId($row ['id']);
                                        $objWeekDays->setName($row ['name']);
                                        $objWeekDays->setNameKey($row ['name_key']);
                                        $objWeekDays->setIsOpen($row ['is_open']);
                                        $objWeekDays->setSettings($objSettings->getAllByTypeAndRel('OFFICE_OPEN_HRS', $row ['id']));
				}
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_WeekDays</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objWeekDays;
	}
        
        
        	/*
	 * @name        : getAllWithSettings
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAllWithSettings() {
		$weekDays = array ();

		try {
			$objWeekDays = new Base_Model_Lib_Catelog_Entity_WeekDays ( );
				
			$select = $this->select ()
                                ->from ('tbl_week_days', array ('id' ) );
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objWeekDays = $this->getItemWithSettings( $row->id );
				array_push ( $weekDays, $objWeekDays);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
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
			throw new Base_Model_Lib_System_Exception ( " Payment Method Entity not intialized" );
				
			$data = array (
                            'name'          => $this->weekDays->getName(), 
                            'name_key'      => $this->weekDays->getNameKey(), 
                            'is_open'     => $this->weekDays->getIsOpen()
			);
	
			$this->update ( $data, 'id = ' . ( int ) $this->weekDays->getId () );
			$success = true;

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Dao_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;

	}

}
?>
