<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Domain.Dao
 * @name 			: Domain
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT Pvt Ltd. (http://www.pluspro.com/)
 *
 * @Created on     	: 28-11-2010
 * @Modified on     : 28-11-2010
 *
 */
class Base_Model_Lib_Order_Dao_Domain extends Zend_Db_Table {
	protected $_name = 'tbl_domains'; // the table name
	protected $_primary = 'id'; // the primary key
	

	public $domain;
	
	/*
	 * @name        : getItem
	 * @Description : The function is to get a Domain information
	 * 				  from the database.
	 * @param       : $id (Domain Id)
	 * @return      : Entity Domain Object (Base_Model_Lib_Order_Entity_Domain)
	 */
	public function getDomain($domainId) {
		$objDomain = new Base_Model_Lib_Order_Entity_Domain();
                $objClientService = new Base_Model_Lib_Client_Service_Client();
                $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
		try {
			if($domainId){
				$id = ( int ) $domainId;
				$row = $this->fetchRow ( 'id = ' . $id );
				
				if ($row != "") {
					$result = $row->toArray ();
					$objDomain->setId ( $row ['id'] );
                                        $objDomain->setClient($objClientService->getClient($row ['tbl_client_id']));
                                        $objDomain->setOrder($row ['tbl_order_id']);
                                        $objDomain->setType($row ['type']);
                                        $objDomain->setRegistrationdate($row ['registrationdate']);
                                        $objDomain->setDomain($row ['domain']);
                                        $objDomain->setFirstpaymentamount($row ['firstpaymentamount']);
                                        $objDomain->setRecurringamount($row ['recurringamount']);
                                        $objDomain->setRegistrar($row['registrar']);
                                        $objDomain->setRegistrationperiod($row ['registrationperiod']);
                                        $objDomain->setExpirydate($row ['expirydate']);
                                        $objDomain->setSubscriptionid($row ['subscriptionid']);
                                        $objDomain->setPromoid($row ['promoid']);
                                        $objDomain->setStatus($row ['status']);
                                        $objDomain->setNextduedate($row ['nextduedate']);
                                        $objDomain->setNextinvoicedate($row ['nextinvoicedate']);
                                        $objDomain->setAdditionalnotes($row ['additionalnotes']);
                                        $objDomain->setPaymentmethod($objPaymentMethodService->getItem($row ['paymentmethod']));
                                        $objDomain->setDnsmanagement($row ['dnsmanagement']);
                                        $objDomain->setEmailforwarding($row ['emailforwarding']);
                                        $objDomain->setIdprotection($row ['idprotection']);
                                        $objDomain->setDonotrenew($row ['donotrenew']);
                                        $objDomain->setReminders($row ['reminders']);
                                        $objDomain->setSynced($row ['synced']);
                                        $objDomain->setRegistrarLock($row ['registrar_lock']);
                                        $objDomain->setDefaultNameServer($row ['default_nameserver']);
                                        $objDomain->setNameServer1($row ['nameserver_1']);
                                        $objDomain->setNameServer2($row ['nameserver_2']);
                                        $objDomain->setNameServer3($row ['nameserver_3']);
                                        $objDomain->setNameServer4($row ['nameserver_4']);
                                        $objDomain->setNameServer5($row ['nameserver_5']);
				}
			}
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Domain</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objDomain;
	}
	
	/*
	 * @name        : addItem
	 * @Description : The function is to add a Domain information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	
	public function addItem() {
		$last_inserted_id = 0;
		
		try {
			
			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
				throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );
			
			$data = array (
                            'tbl_client_id' 		=> $this->domain->getClient(),
                            'tbl_order_id' 		=> $this->domain->getOrder(),
                            'type'                      => $this->domain->getType(),
                            'registrationdate' 		=> $this->domain->getRegistrationdate(),
                            'domain'                    => $this->domain->getDomain(),
                            'firstpaymentamount' 	=> $this->domain->getFirstpaymentamount(),
                            'recurringamount' 		=> $this->domain->getRecurringamount(),
                            'registrar' 		=> $this->domain->getRegistrar(),
                            'registrationperiod' 	=> $this->domain->getRegistrationperiod(),
                            'expirydate' 		=> $this->domain->getExpirydate(),
                            'subscriptionid' 		=> $this->domain->getSubscriptionid(),
                            'promoid'                   => $this->domain->getPromoid(),
                            'status'                    => $this->domain->getStatus(),
                            'nextduedate' 		=> $this->domain->getNextduedate(),
                            'nextinvoicedate' 		=> $this->domain->getNextinvoicedate(),
                            'additionalnotes' 		=> $this->domain->getAdditionalnotes(),
                            'paymentmethod' 		=> $this->domain->getPaymentmethod(),
                            'dnsmanagement' 		=> $this->domain->getDnsmanagement(),
                            'emailforwarding' 		=> $this->domain->getEmailforwarding(),
                            'idprotection' 		=> $this->domain->getIdprotection(),
                            'donotrenew' 		=> $this->domain->getDonotrenew(),
                            'reminders' 		=> $this->domain->getReminders(),
                            'synced'                    => $this->domain->getSynced(),
                            'registrar_lock' 		=> $this->domain->getRegistrarLock(),
                            'default_nameserver' 	=> $this->domain->getDefaultNameServer(),
                            'nameserver_1' 		=> $this->domain->getNameServer1(),
                            'nameserver_2' 		=> $this->domain->getNameServer2(),
                            'nameserver_3' 		=> $this->domain->getNameServer3(),
                            'nameserver_4' 		=> $this->domain->getNameServer4(),
                            'nameserver_5' 		=> $this->domain->getNameServer5());
			
			$last_inserted_id = $this->insert ( $data );
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Domain</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $last_inserted_id;
	}
	
	/*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateItem() {
		$success = false;
		try {
			
			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
				throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );
			
			$data = array ('registrationdate' 		=> $this->domain->getRegistrationdate(),
                            'domain' 		=> $this->domain->getDomain(),
                            'firstpaymentamount' 		=> $this->domain->getFirstpaymentamount(),
                            'recurringamount' 		=> $this->domain->getRecurringamount(),
                            'registrar' 		=> $this->domain->getRegistrar(),
                            'registrationperiod' 		=> $this->domain->getRegistrationperiod(),
                            'expirydate' 		=> $this->domain->getExpirydate(),
                            'subscriptionid' 		=> $this->domain->getSubscriptionid(),
                            'promoid' 		=> $this->domain->getPromoid(),
                            'status' 		=> $this->domain->getStatus(),
                            'nextduedate' 		=> $this->domain->getNextduedate(),
                            'nextinvoicedate' 		=> $this->domain->getNextinvoicedate(),
                            'additionalnotes' 		=> $this->domain->getAdditionalnotes(),
                            'paymentmethod' 		=> $this->domain->getPaymentmethod(),
                            'dnsmanagement' 		=> $this->domain->getDnsmanagement(),
                            'emailforwarding' 		=> $this->domain->getEmailforwarding(),
                            'idprotection' 		=> $this->domain->getIdprotection(),
                            'donotrenew' 		=> $this->domain->getDonotrenew(),
                            'reminders' 		=> $this->domain->getReminders(),
                            'synced' 		=> $this->domain->getSynced(),
                            'registrar_lock' 		=> $this->domain->getRegistrarLock(),
                            'nameserver_1' 		=> $this->domain->getNameServer1(),
                            'nameserver_2' 		=> $this->domain->getNameServer2(),
                            'nameserver_3' 		=> $this->domain->getNameServer3(),
                            'nameserver_4' 		=> $this->domain->getNameServer4(),
                            'nameserver_5' 		=> $this->domain->getNameServer5());
			
			$this->update ( $data, 'id = ' . ( int ) $this->domain->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Domain</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : deleteItem
	 * @Description : The function is to delete a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function deleteItem() {
		$success = false;
		try {
			
			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
				throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );
			
			if ($this->delete ( 'id =' . ( int ) $this->domain->getId () ) == '1') {
				$success = true;
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Domain</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAll() {
		$domain = array ();
		
		try {
			$objDomain = new Base_Model_Lib_Order_Entity_Domain ( );
			
			$select = $this->select ()
						->from ( 'tbl_domains', array ('id' ));
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objDomain = $this->getDomain( $row->id );
				array_push ( $domain, $objDomain );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $domain;
	}
        
        
       /*
	 * @name        : search
	 * @Description : The function is to search Student information
	 * 				  from the database.
	 * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
	 */

    public function search($limit){
        // declare an array variable
	$arrDomains = array();
	$arrWhere    = array();
	$sql		 = "";
        try {

            if (!($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
                throw new Base_Model_Lib_Order_Exception(" Domain Entity not intialized");
            
                 $clientId        = $this->domain->getClient();
                 $domainStatus     = $this->domain->getStatus();
                 $domainStartDate    = $this->domain->getStartDate();
                 $domainEndDate      = $this->domain->getEndDate();
                 
                 $sql = "SELECT id FROM tbl_domains ";
                 
                 if($clientId !='')
			array_push($arrWhere,"tbl_client_id = '".$clientId."'");
                 
                 if($domainStatus !='')
			array_push($arrWhere,"status = '".$domainStatus."'");
                 
                 if($domainStartDate !='' && $domainEndDate != "")
			array_push($arrWhere,"registrationdate BETWEEN '".$domainStartDate."' AND '".$domainEndDate."'");
                 
                 
            
                 if( count($arrWhere)> 0)
				$sql.=	"WHERE ".implode(' AND ',$arrWhere);

				// $limit
			$sql.= 	$limit;
			$db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
			$result = $db->fetchCol($sql);
			
			foreach ($result as $cid) {
				$objDomain  = $this->getDomain($cid);
				array_push($arrDomains, $objDomain);
			}
           

        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Domain</em>, <strong>Function -</strong> <em>loginDomain()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrDomains;
    } 
    
    
    
    /*
	 * @name        : searchCount()
	 * @Description : The function is to search Student information
	 * 				  from the database.
	 * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
	 */

    public function searchCount(){
        // declare an array variable
	$totalDomains = 0;
	$arrWhere    = array();
	$sql		 = "";
        try {

            if (!($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
                throw new Base_Model_Lib_Order_Exception(" Domain Entity not intialized");
            
                $clientId        = $this->domain->getClient();
                 $domainStatus     = $this->domain->getStatus();
                 $domainStartDate    = $this->domain->getStartDate();
                 $domainEndDate      = $this->domain->getEndDate();
                 
                 $sql = "SELECT count(id) as tot FROM tbl_domains ";
                 
                 if($clientId !='')
			array_push($arrWhere,"tbl_client_id = '".$clientId."'");
                 
                 if($domainStatus !='')
			array_push($arrWhere,"status = '".$domainStatus."'");
                 
                 if($domainStartDate !='' && $domainEndDate != "")
			array_push($arrWhere,"registrationdate BETWEEN '".$domainStartDate."' AND '".$domainEndDate."'");
                 
                 
            
                 if( count($arrWhere)> 0)
				$sql.=	"WHERE ".implode(' AND ',$arrWhere);

				// $limit
			$db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
		 $totalDomains 	= $db->fetchOne($sql);
           

        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Domain</em>, <strong>Function -</strong> <em>loginDomain()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalDomains;
    } 
    
    
    /*
	 * @name        : getAllOrderDomains
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAllOrderDomains($orderId) {
		$orderDomains = array ();
		
		try {
			$objDomain = new Base_Model_Lib_Order_Entity_Domain ( );
			
			$select = $this->select ()
				  ->from ('tbl_domains', array ('id' ))
                                  ->where('tbl_order_id = ?',$orderId);
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objDomain = $this->getDomain( $row->id );
				array_push ($orderDomains, $objDomain );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $orderDomains;
	}
        
        
        	/*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateItemSubscriptionid() {
		$success = false;
		try {
			
			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
				throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );
			
			$data = array ('subscriptionid' => $this->domain->getSubscriptionid());
			
			$this->update ( $data, 'id = ' . ( int ) $this->domain->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Domain</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}

        
        
        
        
        /*
	 * @name        : updateDomainInfo
	 * @Description : The function is to update/edit a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateDomainInfo() {
		$success = false;
		try {
			
			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
				throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );
			
			$data = array (
                            'registrar_lock' 		=> $this->domain->getRegistrarLock(),
                            'default_nameserver' 	=> $this->domain->getDefaultNameServer(),
                            'nameserver_1' 		=> $this->domain->getNameServer1(),
                            'nameserver_2' 		=> $this->domain->getNameServer2(),
                            'nameserver_3' 		=> $this->domain->getNameServer3(),
                            'nameserver_4' 		=> $this->domain->getNameServer4(),
                            'nameserver_5' 		=> $this->domain->getNameServer5());
			
			$this->update ( $data, 'id = ' . ( int ) $this->domain->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Domain</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
        
        
        
        /*
	 * @name        : updateDomainInvoiceDatesAndStatus
	 * @Description : The function is to update/edit a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateDomainInvoiceDatesAndStatus() {
		$success = false;
		try {
			
			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
				throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );
			
			$data = array ('registrationdate' 		=> $this->domain->getRegistrationdate(),
                            'expirydate' 		=> $this->domain->getExpirydate(),
                            'status' 		=> $this->domain->getStatus(),
                            'nextduedate' 		=> $this->domain->getNextduedate(),
                            'nextinvoicedate' 		=> $this->domain->getNextinvoicedate());
			
			$this->update ( $data, 'id = ' . ( int ) $this->domain->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Domain</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
        
        
        
        /*
	 * @name        : getAllDomainsByClientId
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAllDomainsByClientId($clientId) {
		$orderDomains = array ();
		
		try {
			$objDomain = new Base_Model_Lib_Order_Entity_Domain ( );
			
			$select = $this->select ()
				  ->from ('tbl_domains', array ('id' ))
                                  ->where('tbl_client_id = ?',$clientId);
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objDomain = $this->getDomain( $row->id );
				array_push ($orderDomains, $objDomain );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $orderDomains;
	}
}
?>