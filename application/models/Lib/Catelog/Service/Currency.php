<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: Currency
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Currency Object
 *
 */
class Base_Model_Lib_Catelog_Service_Currency extends Base_Model_Lib_Eav_Model_Service {

	public $currency;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a Currency information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Catelog_Entity_Currency
	 */

	public function getItem($id) {
		$currency = "";
		try {
			$objCurrency 		= new Base_Model_Lib_Catelog_Dao_Currency ( );
			$currency 			= $objCurrency->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $currency;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All Currency information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Currency
	 */

	public function getAll() {
		$currency = "";
		try {
			$objCurrency 	= new Base_Model_Lib_Catelog_Dao_Currency();
			$currency 		= $objCurrency->getAll();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Currency</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $currency;
	}
	
	// covert currency rate 
	public function convertCurrencyRate($value,$fromCurrencyId,$toCurrencyId){
		$currencyRate = 0;
		try {
			$fromCurrencyRateInUsd  = $this->getItem($fromCurrencyId)->getCurrentRateInUsd();
			$toCurrencyRateInUsd    = $this->getItem($toCurrencyId)->getCurrentRateInUsd();
			$currencyRate			= ($fromCurrencyRateInUsd * $toCurrencyRateInUsd)*$value;
			$currencyRate			= round($currencyRate, 2);			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Currency</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $currencyRate;
	}
        
        
        /*
	 * @name        : getDefaultCurrency()
	 * @Description : The function is to get All Currency information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Currency
	 */

	public function getDefaultCurrency() {
		$currency = "";
		try {
			$objCurrency 	= new Base_Model_Lib_Catelog_Dao_Currency();
			$currency 		= $objCurrency->getDefaultCurrency();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Currency</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $currency;
	}

}

?>