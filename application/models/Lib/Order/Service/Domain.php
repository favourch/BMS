<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Domain.Service
 * @name 			: Domain
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com)
 *
 * Description : The Service class for the Domain Object
 *
 */
class Base_Model_Lib_Order_Service_Domain extends Base_Model_Lib_Eav_Model_Service {

	public $domain;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a Domain information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Order_Entity_Domain
	 */

	public function getItem($id) {
		$domain = "";
		try {
			$objDomain 		= new Base_Model_Lib_Order_Dao_Domain ( );
			$domain 		= $objDomain->getDomain( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $domain;
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

			$objDomainDao 				= new Base_Model_Lib_Order_Dao_Domain( );
			$objDomainDao->domain 	= $this->domain;
			$last_inserted_id			= $objDomainDao->addItem();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Domain</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
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

			$objDomainDao 				= new Base_Model_Lib_Order_Dao_Domain( );
			$objDomainDao->domain 	= $this->domain;
			$success 					= $objDomainDao->updateItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Domain</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : deleteItem()
	 * @Description : The function is to update/edit a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function deleteItem() {
		$success = false;
		try {

			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
			throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );

			$objDomainDao 				= new Base_Model_Lib_Order_Dao_Domain( );
			$objDomainDao->domain 	= $this->domain;
			$success 				= $objDomainDao->deleteItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Catelog</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All Domain information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Domain
	 */

	public function getAll() {
		$domain = "";
		try {
			$objDomain 	= new Base_Model_Lib_Order_Dao_Domain();
			$domain 		= $objDomain->getAll();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Domain</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $domain;
	}
        
      
	
        
        /*
	 * @name        : getAll()
	 * @Description : The function is to get All Domain information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Domain
	 */

	public function getAllOrderDomains($domainId) {
		$domain = "";
		try {
			$objDomain 	= new Base_Model_Lib_Order_Dao_Domain();
			$domain 		= $objDomain->getAllOrderDomains($domainId);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Domain</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $domain;
	}

        
        
         /*
	 * @name        : search
	 * @Description : The function is to search domains information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Order_Entity_Order
	 */
	
	public function search($limit)
	{
		$domains = "";
		try {
			
						
			if(!($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
			throw new Base_Model_Lib_Order_Exception(" Domain Entity not intialized");

			$objDomainDao = new Base_Model_Lib_Order_Dao_Domain();
			$objDomainDao->domain = $this->domain;
			$domains = $objDomainDao->search($limit);
			
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $domains;
	}
        
        
        /*
	 * @name        : searchCount
	 * @Description : The function is to search students information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Student_Entity_Student
	 */
	
	public function searchCount()
	{
		$totalDomains = 0;
		try {
				
			if(!($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
			throw new Base_Model_Lib_Order_Exception(" Order Entity not intialized");

			$objDomainDao = new Base_Model_Lib_Order_Dao_Domain();
			$objDomainDao->domain = $this->domain;
			$totalDomains = $objDomainDao->searchCount();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Student_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Student_Service_Student</em>, <strong>Function -</strong> <em>searchCount()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $totalDomains;
	}
        
        
        /*
	 * @name        : updateItemSubscriptionid()
	 * @Description : The function is to update/edit a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateItemSubscriptionid() {
		$success = false;
		try {

			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
			throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );

			$objDomainDao 		= new Base_Model_Lib_Order_Dao_Domain( );
			$objDomainDao->domain 	= $this->domain;
			$success                = $objDomainDao->updateItemSubscriptionid();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Domain</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

        
        
        /*
	 * @name        : updateDomainInfo()
	 * @Description : The function is to update/edit a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateDomainInfo() {
		$success = false;
		try {

			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
			throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );

			$objDomainDao 				= new Base_Model_Lib_Order_Dao_Domain( );
			$objDomainDao->domain 	= $this->domain;
			$success 					= $objDomainDao->updateDomainInfo();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Domain</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}
        
        
        
         /*
	 * @name        : updateDomainInvoiceDatesAndStatus()
	 * @Description : The function is to update/edit a Domain information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateDomainInvoiceDatesAndStatus() {
		$success = false;
		try {

			if (! ($this->domain instanceof Base_Model_Lib_Order_Entity_Domain))
			throw new Base_Model_Lib_Order_Exception ( " Domain Entity not intialized" );

			$objDomainDao 		= new Base_Model_Lib_Order_Dao_Domain();
			$objDomainDao->domain 	= $this->domain;
			$success 		= $objDomainDao->updateDomainInvoiceDatesAndStatus();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Domain</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}
        
        
         /*
	 * @name        : getAllDomainsByClientId($clientId)
	 * @Description : The function is to get All Domain information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Domain
	 */

	public function getAllDomainsByClientId($clientId) {
		$domain = "";
		try {
			$objDomain 	= new Base_Model_Lib_Order_Dao_Domain();
			$domain 		= $objDomain->getAllDomainsByClientId($clientId);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Domain</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $domain;
	}
}
?>