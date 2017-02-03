<?php

class Base_Model_Lib_Api_Service_Cpanel extends Base_Model_Lib_Eav_Model_Service {

    public $objCpanel = '';
    
    public function __construct() {

        try {

            $objServerService = new Base_Model_Lib_System_Service_Server();
            $cPanelServerInformation =  $objServerService->getAllByType('cpanel');
            $defaultServer           = $cPanelServerInformation[0];
            
            if($defaultServer){
            $this->objCpanel = new whm();
            $hashKey = $defaultServer->getAccesshash();
            $serverName = $defaultServer->getName();
            $serverUserName = $defaultServer->getUsername();
            $this->objCpanel->init($serverName, $serverUserName, $hashKey);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error  -</strong>" . $e->getMessage() . "</em>");
        }
    }

    public function getAllPackages() {
        return false;
        return $this->objCpanel->listPkgs();
        
    }
    
    
    public function createAccount($domainName,$userName,$password,$package){
        try{
            return false;
            $result=$this->objCpanel->createAccount($domainName,$userName,$password,$package);
            return $result;
        }catch(Exception $ex) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error  -</strong>" . $e->getMessage() . "</em>");
        }
        
    }
    
    
    public function suspendAccount($acctUser,$reason){
        try{
            return false;
            $result=$this->objCpanel->suspend($acctUser,$reason);
            return $result;
        }catch(Exception $ex) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error  -</strong>" . $e->getMessage() . "</em>");
        }
        
    }
    
    
      public function unSuspendAccount($acctUser){
        try{
            return false;
            $result=$this->objCpanel->unsuspend($acctUser);
            return $result;
        }catch(Exception $ex) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error  -</strong>" . $e->getMessage() . "</em>");
        }
        
    }
    
    
    public function terminateAccount($acctUser){
        try{
            return false;
            $result=$this->objCpanel->terminate($acctUser);
            return $result;
        }catch(Exception $ex) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error  -</strong>" . $e->getMessage() . "</em>");
        }
        
    }
    
    
    public function changePackage($accUser,$pkg){
        try{
            return false;
            $result=$this->objCpanel->changepackage($accUser,$pkg);
            return $result;
        }catch(Exception $ex) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error  -</strong>" . $e->getMessage() . "</em>");
        }
        
    }
    
    public function updateAccountPassword($userName,$password){
        
        try{
            return false;
            $result=$this->objCpanel->passwd($userName,$password);
            return $result;
        }catch(Exception $ex) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error  -</strong>" . $e->getMessage() . "</em>");
        }
        
    }

}

?>