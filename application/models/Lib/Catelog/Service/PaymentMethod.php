<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: PaymentMethod
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the PaymentMethod Object
 *
 */
class Base_Model_Lib_Catelog_Service_PaymentMethod extends Base_Model_Lib_Eav_Model_Service {

	public $paymentMethod;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a PaymentMethod information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Catelog_Entity_PaymentMethod
	 */

	public function getItem($id) {
		$paymentMethod = "";
		try {
			$objPaymentMethod 		= new Base_Model_Lib_Catelog_Dao_PaymentMethod ( );
			$paymentMethod 			= $objPaymentMethod->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_PaymentMethod</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $paymentMethod;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All PaymentMethod information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_PaymentMethod
	 */

	public function getAll() {
		$paymentMethod = "";
		try {
			$objPaymentMethod 	= new Base_Model_Lib_Catelog_Dao_PaymentMethod();
			$paymentMethod 		= $objPaymentMethod->getAll();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_PaymentMethod</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $paymentMethod;
	}
        
        
        /*
	 * @name        : getAll()
	 * @Description : The function is to get All PaymentMethod information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_PaymentMethod
	 */

	public function getAllWithSettings() {
		$paymentMethod = "";
		try {
			$objPaymentMethod 	= new Base_Model_Lib_Catelog_Dao_PaymentMethod();
			$paymentMethod 		= $objPaymentMethod->getAllWithSettings();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_PaymentMethod</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $paymentMethod;
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
			if (! ($this->paymentMethod instanceof Base_Model_Lib_Catelog_Entity_PaymentMethod))
			throw new Base_Model_Lib_System_Exception ( " PaymentMethod Entity not intialized" );
                        
                        
                        $objPaymentMethodDao = new Base_Model_Lib_Catelog_Dao_PaymentMethod();
			$objPaymentMethodDao->paymentMethod = $this->paymentMethod;
			$success = $objPaymentMethodDao->updateItem();
                        
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_PaymentMethod</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	}
}
?>