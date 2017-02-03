<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Client.Service
 * @name 			: Client
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Client Object
 *
 */
class Base_Model_Lib_Client_Service_Client extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $client;

    /*
     * @name        : getClient
     * @Description : The function is to get a client information
     * 				  from the database.
     * @param       : $id (Client Id)
     * @return      : Base_Model_Lib_Client_Entity_Client
     */

    public function getClient($id) {
        $client = "";
        try {
            $objClient = new Base_Model_Lib_Client_Dao_Client();
            $client = $objClient->getClient($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>getClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $client;
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

            $objClientDao = new Base_Model_Lib_Client_Dao_Client();
            $objClientDao->client = $this->client;
            $last_inserted_id = $objClientDao->addClient();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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

            $objClientDao = new Base_Model_Lib_Client_Dao_Client();
            $objClientDao->client = $this->client;
            $success = $objClientDao->updateClient();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteClient()
     * @Description : The function is to delete a client information
      from the database.
     * @return      : $success true/false
     */

    public function deleteClient() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            $objClientDao = new Base_Model_Lib_Client_Dao_Client();
            $objClientDao->client = $this->client;
            $success = $objClientDao->deleteClient();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

   

    /*
     * @name        : updateClientPassword
     * @Description : The function is to update/edit a client password information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateClientPassword() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            $objClientDao = new Base_Model_Lib_Client_Dao_Client();
            $objClientDao->client = $this->client;
            $success = $objClientDao->updateClientPassword();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : loginClient
     * @Description : The function is to auth clients information
     * 				  in the database.
     * @param       : Clientname, Password
     * @return      : Entity Client Object (Base_Model_Lib_Client_Entity_Client)
     */

    public function loginClient($clientName, $password) {
        $clientObject = "";
        try {
            $objDaoClient = new Base_Model_Lib_Client_Dao_Client();
            $clientObject = $objDaoClient->loginClient($clientName, $password);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $clientObject;
    }
    
    /*
	 * @name        : search
	 * @Description : The function is to search clients information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Client_Entity_Client
	 */
	
	public function search($limit)
	{
		$clients = "";
		try {
			
						
			if(!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
			throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

			$objClientDao = new Base_Model_Lib_Client_Dao_Client();
			$objClientDao->client = $this->client;
			$clients = $objClientDao->search($limit);
			
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $clients;
	}
        
        
        /*
	 * @name        : searchCount
	 * @Description : The function is to search students information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Student_Entity_Student
	 */
	
	public function searchCount()
	{
		$totalClient = 0;
		try {
				
			if(!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
			throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

			$objClientDao = new Base_Model_Lib_Client_Dao_Client();
			$objClientDao->client = $this->client;
			$totalClient = $objClientDao->searchCount();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Student_Service_Student</em>, <strong>Function -</strong> <em>searchCount()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $totalClient;
	}
        
        
        
           /*
     * @name        : updateClient
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateGatewayId() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            $objClientDao = new Base_Model_Lib_Client_Dao_Client();
            $objClientDao->client = $this->client;
            $success = $objClientDao->updateGatewayId();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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

            $objClientDao = new Base_Model_Lib_Client_Dao_Client();
            $objClientDao->client = $this->client;
            $success = $objClientDao->updateClientInfo();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    /*
     * @name        : updateCreditCardDetails()
     * @Description : The function is to update/edit a client card information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateCreditCardDetails() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            $objClientDao = new Base_Model_Lib_Client_Dao_Client();
            $objClientDao->client = $this->client;
            $success = $objClientDao->updateCreditCardDetails();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    
        /*
     * @name        : getClientByEmail($clientEmail)
     * @Description : The function is to auth clients information
     * 				  in the database.
     * @param       : Clientname, Password
     * @return      : Entity Client Object (Base_Model_Lib_Client_Entity_Client)
     */

    public function getClientByEmail($clientEmail) {
        $clientObject = "";
        try {
            $objDaoClient = new Base_Model_Lib_Client_Dao_Client();
            $clientObject = $objDaoClient->getClientByEmail($clientEmail);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $clientObject;
    }
    
    
        /*
     * @name        : updateCreditCardDetails()
     * @Description : The function is to update/edit a client card information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updatePassword() {
        $success = false;
        try {

            if (!($this->client instanceof Base_Model_Lib_Client_Entity_Client))
                throw new Base_Model_Lib_Client_Exception(" Client Entity not intialized");

            $objClientDao = new Base_Model_Lib_Client_Dao_Client();
            $objClientDao->client = $this->client;
            $success = $objClientDao->updatePassword();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>updateClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

}
?>