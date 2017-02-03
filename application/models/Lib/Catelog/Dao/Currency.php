<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: Currency
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
class Base_Model_Lib_Catelog_Dao_Currency extends Zend_Db_Table {
	protected $_name = 'tbl_currency'; // the table name
	protected $_primary = 'id'; // the primary key


	public $currency;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a Currency information
	 * 				  from the database.
	 * @param       : $id (Currency Id)
	 * @return      : Entity Currency Object (Base_Model_Lib_Catelog_Entity_Currency)
	 */
	public function getItem($currencyId) {
		$objCurrency = new Base_Model_Lib_Catelog_Entity_Currency ( );

		try {
			if($currencyId){
				$id = ( int ) $currencyId;
				$row = $this->fetchRow ( 'id = ' . $id );
	
				if ($row != "") {
					$result = $row->toArray ();
					$objCurrency->setId ( $row ['id'] );
					$objCurrency->setName ( $row ['name'] );
					$objCurrency->setCode( $row ['currency_code'] );
					$objCurrency->setCurrentRateInUsd($row['current_rate_in_usd']);
                                        $objCurrency->setIsDefault($row['is_default']);
                                        $objCurrency->setCurrencySym($row['currency_sym']);
				}
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objCurrency;
	}


	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAll() {
		$currency = array ();

		try {
			$objCurrency = new Base_Model_Lib_Catelog_Entity_Currency ( );
				
			$select = $this->select ()->from ( 'tbl_currency', array ('id' ) );
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objCurrency = $this->getItem ( $row->id );
				array_push ( $currency, $objCurrency);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $currency;
	}
        
        
        /*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getDefaultCurrency() {
		$objCurrency = '';

		try {
			$objCurrency = new Base_Model_Lib_Catelog_Entity_Currency ( );
				
			$select = $this->select ()
                                ->from ( 'tbl_currency', array ('id' ) )
                                ->where('is_default = ?', 'Yes');
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objCurrency = $this->getItem ( $row->id );
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objCurrency;
	}

}
?>
