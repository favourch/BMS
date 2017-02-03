<?php

class Zend_View_Helper_GetClient {

	function getClient($clientId)
	{
		$objClientService   			= new Base_Model_Lib_Client_Service_Client();
		$clientInfo                     	= $objClientService->getClient($clientId);
                return $clientInfo;
	}

}

?>