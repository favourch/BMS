<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Client.Dao
 * @name 			: Client
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The object-oriented interface to bcas database table tbl_client
 *
 */
class Base_Model_Lib_Client_Dao_Client extends Zend_Db_Table {

    protected $_name = 'tbl_clients'; // the table name
    protected $_primary = 'id'; // the primary key
    // the client object
    public $client;

    // the methods goes from here......
    /*
     * @name        : getClient
     * @Description : The function is to get a client information
     * 				  from the database.
     * @param       : $id (Client Id)
     * @return      : Entity Client Object (Base_Model_Lib_Client_Entity_Client)
     */

    public function getClient($id) {
        $objClient = new Base_Model_Lib_Client_Entity_Client ( );
        $objCurrencyService = new Base_Model_Lib_Catelog_Service_Currency();
        $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
        $objCountryService = new Base_Model_Lib_Catelog_Service_Country();
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objClient->setId($result['id']);
                $objClient->setFirstname($result['firstname']);
                $objClient->setLastname($result['lastname']);
                $objClient->setCompanyname($result['companyname']);
                $objClient->setEmail($result['email']);
                $objClient->setAddress1($result['address1']);
                $objClient->setAddress2($result['address2']);
                $objClient->setCity($result['city']);
                $objClient->setState($result['state']);
                $objClient->setPostcode($result['postcode']);
                $objClient->setCountry($objCountryService->getItem($result['country']));
                $objClient->setPhonenumber($result['phonenumber']);
                $objClient->setPassword($result['password']);
                $objClient->setCurrency($objCurrencyService->getItem($result['currency']));
                $objClient->setDefaultgateway($objPaymentMethodService->getItem($result['defaultgateway']));
                $objClient->setCredit($result['credit']);
                $objClient->setTaxexempt($result['taxexempt']);
                $objClient->setLatefeeoveride($result['latefeeoveride']);
                $objClient->setOverideduenotices($result['overideduenotices']);
                $objClient->setSeparateinvoices($result['separateinvoices']);
                $objClient->setDisableautocc($result['disableautocc']);
                $objClient->setDatecreated($result['datecreated']);
                $objClient->setNotes($result['notes']);
                $objClient->setBillingcid($result['billingcid']);
                $objClient->setSecurityqid($result['securityqid']);
                $objClient->setSecurityqans($result['securityqans']);
                $objClient->setGroupid($result['groupid']);
                $objClient->setCardtype($result['cardtype']);
                $objClient->setCardlastfour($result['cardlastfour']);
                $objClient->setCardnum($result['cardnum']);
                $objClient->setStartdate($result['startdate']);
                $objClient->setExpdate($result['expdate']);
                $objClient->setIssuenumber($result['issuenumber']);
                $objClient->setBankname($result['bankname']);
                $objClient->setBanktype($result['banktype']);
                $objClient->setBankcode($result['bankcode']);
                $objClient->setBankacct($result['bankacct']);
                $objClient->setGatewayid($result['gatewayid']);
                $objClient->setLastlogin($result['lastlogin']);
                $objClient->setIp($result['ip']);
                $objClient->setHost($result['host']);
                $objClient->setStatus($result['status']);
                $objClient->setLanguage($result['language']);
                $objClient->setPwresetkey($result['pwresetkey']);
                $objClient->setPwresetexpiry($result['pwresetexpiry']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>getClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objClient;
    }

    /*
     * @name        : addClient
     * @Description : The function is to add a client information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addClient() {
        $last_inserted_id = 0;

        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            $data = array(
                'firstname' => $this->client->getFirstname(),
                'lastname' => $this->client->getLastname(),
                'companyname' => $this->client->getCompanyname(),
                'email' => $this->client->getEmail(),
                'address1' => $this->client->getAddress1(),
                'address2' => $this->client->getAddress2(),
                'city' => $this->client->getCity(),
                'state' => $this->client->getState(),
                'postcode' => $this->client->getPostcode(),
                'country' => $this->client->getCountry(),
                'phonenumber' => $this->client->getPhonenumber(),
                'password' => $this->client->getPassword(),
                'currency' => $this->client->getCurrency(),
                'defaultgateway' => $this->client->getDefaultgateway(),
                'credit' => $this->client->getCredit(),
                'taxexempt' => $this->client->getTaxexempt(),
                'latefeeoveride' => $this->client->getLatefeeoveride(),
                'overideduenotices' => $this->client->getOverideduenotices(),
                'separateinvoices' => $this->client->getSeparateinvoices(),
                'disableautocc' => $this->client->getDisableautocc(),
                'datecreated' => $this->client->getDatecreated(),
                'notes' => $this->client->getNotes(),
                'billingcid' => $this->client->getBillingcid(),
                'securityqid' => $this->client->getSecurityqid(),
                'securityqans' => $this->client->getSecurityqans(),
                'groupid' => $this->client->getGroupid(),
                'cardtype' => $this->client->getCardtype(),
                'cardlastfour' => $this->client->getCardlastfour(),
                'cardnum' => $this->client->getCardnum(),
                'startdate' => $this->client->getStartdate(),
                'expdate' => $this->client->getExpdate(),
                'issuenumber' => $this->client->getIssuenumber(),
                'bankname' => $this->client->getBankname(),   
                'banktype' => $this->client->getBanktype(),
                'bankcode' => $this->client->getBankcode(),
                'bankacct' => $this->client->getBankacct(),
                'gatewayid' => $this->client->getGatewayid(),
                'lastlogin' => $this->client->getLastlogin(),
                'ip' => $this->client->getIp(),
                'host' => $this->client->getHost(),
                'status' => $this->client->getStatus(),
                'language' => $this->client->getLanguage(),
                'pwresetkey' => $this->client->getPwresetkey(),
                'pwresetexpiry' => $this->client->getPwresetexpiry()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateClient
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateClient() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            if ($this->client->getPassword() != "") {

                $data = array(
                    'firstname' => $this->client->getFirstname(),
                    'lastname' => $this->client->getLastname(),
                    'companyname' => $this->client->getCompanyname(),
                    'email' => $this->client->getEmail(),
                    'address1' => $this->client->getAddress1(),
                    'address2' => $this->client->getAddress2(),
                    'city' => $this->client->getCity(),
                    'state' => $this->client->getState(),
                    'postcode' => $this->client->getPostcode(),
                    'country' => $this->client->getCountry(),
                    'phonenumber' => $this->client->getPhonenumber(),
                    'password' => $this->client->getPassword(),
                    'currency' => $this->client->getCurrency(),
                    'defaultgateway' => $this->client->getDefaultgateway(),
                    'credit' => $this->client->getCredit(),
                    'taxexempt' => $this->client->getTaxexempt(),
                    'latefeeoveride' => $this->client->getLatefeeoveride(),
                    'overideduenotices' => $this->client->getOverideduenotices(),
                    'separateinvoices' => $this->client->getSeparateinvoices(),
                    'disableautocc' => $this->client->getDisableautocc(),
                    'datecreated' => $this->client->getDatecreated(),
                    'notes' => $this->client->getNotes(),
                    'billingcid' => $this->client->getBillingcid(),
                    'securityqid' => $this->client->getSecurityqid(),
                    'securityqans' => $this->client->getSecurityqans(),
                    'groupid' => $this->client->getGroupid(),
                    'cardtype' => $this->client->getCardtype(),
                    'cardlastfour' => $this->client->getCardlastfour(),
                    'cardnum' => $this->client->getCardnum(),
                    'startdate' => $this->client->getStartdate(),
                    'expdate' => $this->client->getExpdate(),
                    'issuenumber' => $this->client->getIssuenumber(),
                    'bankname' => $this->client->getBankname(),   
                    'banktype' => $this->client->getBanktype(),
                    'bankcode' => $this->client->getBankcode(),
                    'bankacct' => $this->client->getBankacct(),
                    'gatewayid' => $this->client->getGatewayid(),
                    'lastlogin' => $this->client->getLastlogin(),
                    'ip' => $this->client->getIp(),
                    'host' => $this->client->getHost(),
                    'status' => $this->client->getStatus(),
                    'language' => $this->client->getLanguage(),
                    'pwresetkey' => $this->client->getPwresetkey(),
                    'pwresetexpiry' => $this->client->getPwresetexpiry()
                );
                
            } else {


                $data = array(
                    'firstname' => $this->client->getFirstname(),
                    'lastname' => $this->client->getLastname(),
                    'companyname' => $this->client->getCompanyname(),
                    'email' => $this->client->getEmail(),
                    'address1' => $this->client->getAddress1(),
                    'address2' => $this->client->getAddress2(),
                    'city' => $this->client->getCity(),
                    'state' => $this->client->getState(),
                    'postcode' => $this->client->getPostcode(),
                    'country' => $this->client->getCountry(),
                    'phonenumber' => $this->client->getPhonenumber(),
                    'currency' => $this->client->getCurrency(),
                    'defaultgateway' => $this->client->getDefaultgateway(),
                    'credit' => $this->client->getCredit(),
                    'taxexempt' => $this->client->getTaxexempt(),
                    'latefeeoveride' => $this->client->getLatefeeoveride(),
                    'overideduenotices' => $this->client->getOverideduenotices(),
                    'separateinvoices' => $this->client->getSeparateinvoices(),
                    'disableautocc' => $this->client->getDisableautocc(),
                    'datecreated' => $this->client->getDatecreated(),
                    'notes' => $this->client->getNotes(),
                    'billingcid' => $this->client->getBillingcid(),
                    'securityqid' => $this->client->getSecurityqid(),
                    'securityqans' => $this->client->getSecurityqans(),
                    'groupid' => $this->client->getGroupid(),
                    'cardtype' => $this->client->getCardtype(),
                    'cardlastfour' => $this->client->getCardlastfour(),
                    'cardnum' => $this->client->getCardnum(),
                    'startdate' => $this->client->getStartdate(),
                    'expdate' => $this->client->getExpdate(),
                    'issuenumber' => $this->client->getIssuenumber(),
                    'bankname' => $this->client->getBankname(),   
                    'banktype' => $this->client->getBanktype(),
                    'bankcode' => $this->client->getBankcode(),
                    'bankacct' => $this->client->getBankacct(),
                    'gatewayid' => $this->client->getGatewayid(),
                    'lastlogin' => $this->client->getLastlogin(),
                    'ip' => $this->client->getIp(),
                    'host' => $this->client->getHost(),
                    'status' => $this->client->getStatus(),
                    'language' => $this->client->getLanguage(),
                    'pwresetkey' => $this->client->getPwresetkey(),
                    'pwresetexpiry' => $this->client->getPwresetexpiry()
                );
                
            }
            $this->update($data, 'id = ' . (int) $this->client->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteClient
     * @Description : The function is to delete a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteClient() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            if ($this->delete('id =' . (int) $this->client->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    

    /*
     * @name        : updateClientPassword
     * @Description : The function is to updateClientPassword a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateClientPassword() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            $data = array(
               'password' => $this->client->getPassword()
            );

            $this->update($data, 'id = ' . (int) $this->client->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>updateClientPassword()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : loginClient
     * @Description : The function is to auth clients information
     * 				  in the database.
     * @param       : Clientname, Password
     * @return      : Boolean true/false, If the login is success, returns true, else false
     */

    public function loginClient($clientEmail, $password) {
        $clientObject = "";
        try {

            $select = $this->select()
                    ->from('tbl_clients', array('id'))
                    ->where('email = ?', $clientEmail)
                    ->where('password = ?', $password)
                    ->where('status = ?', 'Active');

            //$sql = $select->__toString();
            //echo "$sql\n";
            //exit;
            $result = $this->fetchRow($select);
            if ($result->id != "" || $result->id != null) {
                $clientObject = $this->getClient($result->id);
            }


        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $clientObject;
    }
    
    
   /*
	 * @name        : search
	 * @Description : The function is to search Student information
	 * 				  from the database.
	 * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
	 */

    public function search($limit){
        // declare an array variable
	$arrClients = array();
	$arrWhere    = array();
	$sql		 = "";
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");
            
                 $firstName         = $this->client->getFirstname();
                 $lastName          = $this->client->getLastname();
                 $emailAddress      = $this->client->getEmail();
                 $status            = $this->client->getStatus();
                 $clientStartDate    = $this->client->getClientStartDate();
                 $clientEndDate      = $this->client->getClientEndDate();
                 
                 $sql = "SELECT id FROM tbl_clients ";
                 
                 if($firstName !='')
			array_push($arrWhere,"firstname = '".$firstName."'");
                 
                 if($lastName !='')
			array_push($arrWhere,"lastname = '".$lastName."'");
                 
                 if($emailAddress !='')
			array_push($arrWhere,"email = '".$emailAddress."'");
                 
                 if($status !='')
			array_push($arrWhere,"status = '".$status."'");
                 
                 
                  if($clientStartDate !='' && $clientEndDate != "")
			array_push($arrWhere,"datecreated BETWEEN '".$clientStartDate."' AND '".$clientEndDate."'");
            
                 if( count($arrWhere)> 0)
				$sql.=	"WHERE ".implode(' AND ',$arrWhere);

                 
                
				// $limit
			$sql.= 	$limit;
			$db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
			$result = $db->fetchCol($sql);
			
			foreach ($result as $cid) {
				$objClient  = $this->getClient($cid);
				array_push($arrClients, $objClient);
			}
           

        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrClients;
    }

    
    
    
    /*
	 * @name        : search
	 * @Description : The function is to search Student information
	 * 				  from the database.
	 * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
	 */

    public function searchCount(){
        // declare an array variable
	$totalClient = 0;
	$arrWhere    = array();
	$sql		 = "";
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");
            
                 $firstName         = $this->client->getFirstname();
                 $lastName          = $this->client->getLastname();
                 $emailAddress      = $this->client->getEmail();
                 $clientStartDate    = $this->client->getClientStartDate();
                 $clientEndDate      = $this->client->getClientEndDate();
                 
                 $sql = "SELECT count(id) as tot FROM tbl_clients ";
                 
                 if($firstName !='')
			array_push($arrWhere,"firstname = '".$firstName."'");
                 
                 if($lastName !='')
			array_push($arrWhere,"lastname = '".$lastName."'");
                 
                 if($emailAddress !='')
			array_push($arrWhere,"email = '".$emailAddress."'");
                 
                 
                 if($clientStartDate !='' && $clientEndDate != "")
			array_push($arrWhere,"datecreated BETWEEN '".$clientStartDate."' AND '".$clientEndDate."'");
            
                 if( count($arrWhere)> 0)
				$sql.=	"WHERE ".implode(' AND ',$arrWhere);

			
                 //print($sql);exit;
                 $db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
		 $totalClient 	= $db->fetchOne($sql);
			
           

        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>searchCount()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalClient;
    }
    
    
    
    
    
     /*
     * @name        : updateGatewayId
     * @Description : The function is to update the gateway id in to the database
     * 	
     * @return      : $success true/false
     */

    public function updateGatewayId() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            $data = array(
               'gatewayid' => $this->client->getGatewayid()
            );

            $this->update($data, 'id = ' . (int) $this->client->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>updateClientPassword()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }
    
    
    /*
     * @name        : updateClientInfo()
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateClientInfo() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

   
		
                $data = array(
                    'firstname' => $this->client->getFirstname(),
                    'lastname' => $this->client->getLastname(),
                    'companyname' => $this->client->getCompanyname(),
                    'email' => $this->client->getEmail(),
                    'address1' => $this->client->getAddress1(),
                    'address2' => $this->client->getAddress2(),
                    'city' => $this->client->getCity(),
                    'state' => $this->client->getState(),
                    'postcode' => $this->client->getPostcode(),
                    'country' => $this->client->getCountry(),
                    'phonenumber' => $this->client->getPhonenumber(),
                    'defaultgateway' => $this->client->getDefaultgateway()
                );

            $this->update($data, 'id = ' . (int) $this->client->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    
    
    /*
     * @name        : updateClientInfo()
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateCreditCardDetails() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

   
		
                $data = array(
                    'cardtype' => $this->client->getCardtype(),
                    'cardlastfour' => $this->client->getCardlastfour(),
                    'startdate' => $this->client->getStartdate(),
                    'expdate' => $this->client->getExpdate(),
                    'issuenumber' => $this->client->getIssuenumber(),
                    'gatewayid' => $this->client->getGatewayid()
                );

            $this->update($data, 'id = ' . (int) $this->client->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }
    
    
    
    /*
     * @name        : getClientByEmail
     * @Description : The function is to auth clients information
     * 				  in the database.
     * @param       : Clientname, Password
     * @return      : Boolean true/false, If the login is success, returns true, else false
     */

    public function getClientByEmail($clientEmail) {
        $clientObject = false;
        try {

            $select = $this->select()
                    ->from('tbl_clients', array('id'))
                    ->where('email = ?', $clientEmail);

            //$sql = $select->__toString();
            //echo "$sql\n";
            //exit;
            $result = $this->fetchRow($select);
            if ($result->id != "" || $result->id != null) {
                $clientObject = $this->getClient($result->id);
            }


        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $clientObject;
    }
    
    
    
      /*
     * @name        : updateClientInfo()
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updatePassword() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

   
		
                $data = array(
                    'password' => $this->client->getPassword()
                );

            $this->update($data, 'id = ' . (int) $this->client->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Dao_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }
}
?>