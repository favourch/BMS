<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: PaymentMethod
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
class Base_Model_Lib_Catelog_Dao_PaymentMethod extends Zend_Db_Table {
	protected $_name = 'tbl_payment_method'; // the table name
	protected $_primary = 'id'; // the primary key


	public $paymentMethod;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a PaymentMethod information
	 * 				  from the database.
	 * @param       : $id (PaymentMethod Id)
	 * @return      : Entity PaymentMethod Object (Base_Model_Lib_Catelog_Entity_PaymentMethod)
	 */
	public function getItem($paymentMethodId) {
		$objPaymentMethod = new Base_Model_Lib_Catelog_Entity_PaymentMethod();

		try {
			if($paymentMethodId){
				$id = ( int ) $paymentMethodId;
				$row = $this->fetchRow ( 'id = ' . $id );
	
				if ($row != "") {
					$result = $row->toArray ();
					$objPaymentMethod->setId($row ['id']);
                                        $objPaymentMethod->setName($row ['name']);
                                        $objPaymentMethod->setNameKey($row ['name_key']);
                                        $objPaymentMethod->setStatusIs($row ['status_is']);
				}
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_PaymentMethod</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objPaymentMethod;
	}


	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAll() {
		$paymentMethod = array ();

		try {
			$objPaymentMethod = new Base_Model_Lib_Catelog_Entity_PaymentMethod ( );
				
			$select = $this->select ()
                                ->from ('tbl_payment_method', array ('id' ) );
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objPaymentMethod = $this->getItem ( $row->id );
				array_push ( $paymentMethod, $objPaymentMethod);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $paymentMethod;
	}
        
        
        	/*
	 * @name        : getItem
	 * @Description : The function is to get a PaymentMethod information
	 * 				  from the database.
	 * @param       : $id (PaymentMethod Id)
	 * @return      : Entity PaymentMethod Object (Base_Model_Lib_Catelog_Entity_PaymentMethod)
	 */
	public function getItemWithSettings($paymentMethodId) {
		$objPaymentMethod = new Base_Model_Lib_Catelog_Entity_PaymentMethod();
                $objSettings = new Base_Model_Lib_System_Service_Settings();

		try {
			if($paymentMethodId){
				$id = ( int ) $paymentMethodId;
				$row = $this->fetchRow ( 'id = ' . $id );
	
				if ($row != "") {
					$result = $row->toArray ();
					$objPaymentMethod->setId($row ['id']);
                                        $objPaymentMethod->setName($row ['name']);
                                        $objPaymentMethod->setNameKey($row ['name_key']);
                                        $objPaymentMethod->setStatusIs($row ['status_is']);
                                        $objPaymentMethod->setSettings($objSettings->getAllByTypeAndRel('PAYMENT_GATEWAY', $row ['id']));
				}
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_PaymentMethod</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objPaymentMethod;
	}
        
        
        	/*
	 * @name        : getAllWithSettings
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAllWithSettings() {
		$paymentMethod = array ();

		try {
			$objPaymentMethod = new Base_Model_Lib_Catelog_Entity_PaymentMethod ( );
				
			$select = $this->select ()
                                ->from ('tbl_payment_method', array ('id' ) );
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objPaymentMethod = $this->getItemWithSettings( $row->id );
				array_push ( $paymentMethod, $objPaymentMethod);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
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
			throw new Base_Model_Lib_System_Exception ( " Payment Method Entity not intialized" );
				
			$data = array (
                            'name'          => $this->paymentMethod->getName(), 
                            'name_key'      => $this->paymentMethod->getNameKey(), 
                            'status_is'     => $this->paymentMethod->getStatusIs()
			);
	
			$this->update ( $data, 'id = ' . ( int ) $this->paymentMethod->getId () );
			$success = true;

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Dao_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;

	}

}
?>
