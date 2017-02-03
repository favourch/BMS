<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Service
 * @name 			: Securetrading
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Securetrading Object
 *
 */
class Base_Model_Lib_System_Service_Securetrading extends Base_Model_Lib_Eav_Model_Service {

    private $accountDetails = null;

    public function Base_Model_Lib_System_Service_Securetrading() {

        try {
            
            $objSettingService = new Base_Model_Lib_System_Service_Settings();

            $securetradingUsername = $objSettingService->getItem(1)->getSettingValue();
            $securetradingPassword = $objSettingService->getItem(2)->getSettingValue();
            $securetradingSiteReference = $objSettingService->getItem(3)->getSettingValue();

            $this->accountDetails = array(
                'Username' => $securetradingUsername,
                'Password' => $securetradingPassword,
                'SiteReference' => $securetradingSiteReference
            );
        } catch (Exception $ex) {
            print("Error : " . $ex->getMessage());
        }
    }

    public function doSecuretradingPost($params) {

        $objSettingService = new Base_Model_Lib_System_Service_Settings();

            $securetradingUsername = $objSettingService->getItem(1)->getSettingValue();
            $securetradingPassword = $objSettingService->getItem(2)->getSettingValue();
            $securetradingSiteReference = $objSettingService->getItem(3)->getSettingValue();

            $this->accountDetails = array(
                'Username' => $securetradingUsername,
                'Password' => $securetradingPassword,
                'SiteReference' => $securetradingSiteReference
            );

        $gatewayusername = $this->accountDetails['Username'];
        $gatewaypassword = $this->accountDetails['Password'];
        $gatewaysiteref = $this->accountDetails['SiteReference'];

        
        $invoiceId = $params['invoiceid'];
        $cardnum = $params['cardnum'];
        $client_firstname = $params['client_firstname'];
        $client_lastname = $params['client_lastname'];
        $client_email = $params['client_email'];
        $remote_addr = $params['remote_addr'];
        $currency = $params['currency'];
        $amount = $params['amount'];
        $client_address1 = $params['client_address1'];
        $client_address2 = $params['client_address2'];
        $client_city = $params['client_city'];
        $client_state = $params['client_state'];
        $client_country = $params['client_country'];
        $client_postcode = $params['client_postcode'];
        $client_email = $params['client_email'];
        $cardtype = $params['cardtype'];
        $cardexp = $params['cardexp'];
        $cardnum = $params['cardnum'];
        $cccvv = $params['cccvv'];

        $xml = '<?xml version="1.0" encoding="utf-8"?>
                            <requestblock version="3.67">
                            <alias>' . $gatewayusername . '</alias>
                            <request type="AUTH">
                            <operation>
                            <sitereference>' . $gatewaysiteref . '</sitereference>
                            <accounttypedescription>ECOM</accounttypedescription>
                            </operation>
                            <merchant>
                            <orderreference>' . $invoiceId . '</orderreference>
                            </merchant>
                            <customer>
                            <delivery/>
                            <name>' . $client_firstname . ' ' . $client_lastname . '</name>
                            <email>' . $client_email . '</email>
                            <ip>' . $remote_addr . '</ip>
                            </customer>
                            <billing>
                            <amount currencycode="' . $currency . '">' . ($amount * 100) . '</amount>
                            <premise>' . $client_address1 . '</premise>
                            <street>' . $client_address2 . '</street>
                            <town>' . $client_city . '</town>
                            <county>' . $client_state . '</county>
                            <country>' . $client_country . '</country>
                            <postcode>' . $client_postcode . '</postcode>
                            <email>' . $client_email . '</email>
                            <payment type="' . strtoupper($cardtype) . '">
                            <expirydate>' . substr($cardexp, 0, 2) . '/20' . substr($cardexp, 2, 2) . '</expirydate>
                            <pan>' . $cardnum . '</pan>
                            <securitycode>' . $cccvv . '</securitycode>
                            </payment>
                            <name>
                            <middle> </middle>
                            <last>' . $client_lastname . '</last>
                            <first>' . $client_firstname . '</first>
                            </name>
                            </billing>
                            <settlement/>
                            </request>
                            </requestblock>';



        $authstr = "Basic " . base64_encode($gatewayusername . ":" . $gatewaypassword);
        $headers = array(
            "HTTP/1.1",
            "Host: webservices.securetrading.net",
            "Accept: text/xml",
            "Authorization: $authstr",
            "User-Agent: WHMCS Gateway Module",
            "Content-type: text/xml;charset=\"utf-8\"",
            "Content-length: " . strlen($xml),
            "Connection: close",
        );


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://webservices.securetrading.net:443/xml/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_USERPWD, "$gatewayusername:$gatewaypassword");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);
        $xmlObj = new Base_Model_Lib_System_Commen_XmlToArray($data);
        $xmldata = $xmlObj->createArray();

        $transactionReference = $xmldata['responseblock']['response'][0]['transactionreference'];
        $message = $xmldata['responseblock']['response'][0]['error'][0]['message'];
        $message_code = $xmldata['responseblock']['response'][0]['error'][0]['code'];

        $arrResponse['transactionreference'] = $transactionReference;
        $arrResponse['error_message'] = $message;
        $arrResponse['error_code'] = $message_code;
        
        $strLog = print_r($xmldata, true);
        //$objGatewayLog = new Base_Model_Lib_Ext_Logger();
        //$objGatewayLog->write($logStrToWrite);
        $objSystemLogService = new Base_Model_Lib_System_Service_SystemLog();
        $objSystemLogEntity = new Base_Model_Lib_System_Entity_SystemLog();
        $objSystemLogEntity->setDate(date('Y-m-d H:i:s'));
        $objSystemLogEntity->setLogType('gateway');
        $objSystemLogEntity->setMessage($strLog);
        $objSystemLogEntity->setSubject('Credit/Debit Card');
        $objSystemLogService->systemLog = $objSystemLogEntity;
        $objSystemLogService->addItem();
        return $arrResponse;
    }

    public function doSecuretradingRebillPost($params) {

        $gatewayusername = $this->accountDetails['Username'];
        $gatewaypassword = $this->accountDetails['Password'];
        $gatewaysiteref = $this->accountDetails['SiteReference'];

        $invoiceId = $params['invoiceid'];
        $gatewayId = $params['gatewayid'];
        $currency = $params['currency'];
        $amount = $params['amount'];



        $xml = '<?xml version="1.0" encoding="utf-8"?>
                <requestblock version="3.67">
               <alias>' . $gatewayusername . '</alias>
                <request type="AUTH">
                <operation>
                        <sitereference>' . $gatewaysiteref . '</sitereference>
                        <accounttypedescription>RECUR</accounttypedescription>
                        <parenttransactionreference>' . $gatewayId . '</parenttransactionreference>
                </operation>
                <merchant>
                        <orderreference>' . $invoiceId . '</orderreference>
                </merchant>
                <customer>
                </customer>
                <billing>
                        <amount currencycode="' . $currency . '">' . ($amount * 100) . '</amount>
                        <subscription type="RECURRING">
                        <number>1</number>
                        </subscription>
                </billing>
                <settlement></settlement>
                </request>
                </requestblock>';


        $authstr = "Basic " . base64_encode($gatewayusername . ":" . $gatewaypassword);
        $headers = array(
            "HTTP/1.1",
            "Host: webservices.securetrading.net",
            "Accept: text/xml",
            "Authorization: $authstr",
            "User-Agent: WHMCS Gateway Module",
            "Content-type: text/xml;charset=\"utf-8\"",
            "Content-length: " . strlen($xml),
            "Connection: close",
        );


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://webservices.securetrading.net:443/xml/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_USERPWD, "$gatewayusername:$gatewaypassword");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);

        $xmlObj = new Base_Model_Lib_System_Commen_XmlToArray($data);
        $xmldata = $xmlObj->createArray();

        $transactionReference = $xmldata['responseblock']['response'][0]['transactionreference'];
        $message = $xmldata['responseblock']['response'][0]['error'][0]['message'];
        $message_code = $xmldata['responseblock']['response'][0]['error'][0]['code'];

        $arrResponse['transactionreference'] = $transactionReference;
        $arrResponse['error_message'] = $message;
        $arrResponse['error_code'] = $message_code;
        
        $objGatewayLog = new Base_Model_Lib_Ext_Logger();
        $objGatewayLog->write($xmldata);

        return $arrResponse;
    }

    public function doSecuretradingRefundPost($params) {

        # Gateway Specific Variables
        $gatewayusername = $this->accountDetails['Username'];
        $gatewaypassword = $this->accountDetails['Password'];
        $gatewaysiteref = $this->accountDetails['SiteReference'];

        $invoiceId = $params['invoiceid'];
        $transId = $params['transid'];
        $currency = $params['currency'];
        $amount = $params['amount'];

        $xml = '<?xml version="1.0" encoding="utf-8"?>
            <requestblock version="3.67">
            <alias>' . $gatewayusername . '</alias>
                <request type="REFUND"> 
                <merchant> <orderreference>' . $invoiceId . '</orderreference> </merchant> 
                <operation> 
                    <sitereference>' . $gatewaysiteref . '</sitereference> 
                    <parenttransactionreference>' . $transId . '</parenttransactionreference> 
               </operation> 
               <billing> 
               <amount currencycode="' . $currency . '">' . ($amount * 100) . '</amount> 
               </billing> 
           </request> 
           </requestblock>';

        $authstr = "Basic " . base64_encode($gatewayusername . ":" . $gatewaypassword);
        $headers = array(
            "HTTP/1.1",
            "Host: webservices.securetrading.net",
            "Accept: text/xml",
            "Authorization: $authstr",
            "User-Agent: WHMCS Gateway Module",
            "Content-type: text/xml;charset=\"utf-8\"",
            "Content-length: " . strlen($xml),
            "Connection: close",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://webservices.securetrading.net:443/xml/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_USERPWD, "$gatewayusername:$gatewaypassword");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);


        $xmlObj = new Base_Model_Lib_System_Commen_XmlToArray($data);
        $xmldata = $xmlObj->createArray();

        $transactionReference = $xmldata['responseblock']['response'][0]['transactionreference'];
        $message = $xmldata['responseblock']['response'][0]['error'][0]['message'];
        $message_code = $xmldata['responseblock']['response'][0]['error'][0]['code'];

        $arrResponse['transactionreference'] = $transactionReference;
        $arrResponse['error_message'] = $message;
        $arrResponse['error_code'] = $message_code;
        
        $objGatewayLog = new Base_Model_Lib_Ext_Logger();
        $objGatewayLog->write($xmldata);

        return $arrResponse;
    }

    public function doSecuretradingRemoteStorePost($params) {

        # Gateway Specific Variables
        $gatewayusername = $this->accountDetails['Username'];
        $gatewaypassword = $this->accountDetails['Password'];
        $gatewaysiteref = $this->accountDetails['SiteReference'];

        $invoiceId = $params['invoiceid'];
        $cardnum = $params['cardnum'];
        $client_firstname = $params['client_firstname'];
        $client_lastname = $params['client_lastname'];
        $client_email = $params['client_email'];
        $client_address1 = $params['client_address1'];
        $client_address2 = $params['client_address2'];
        $client_city = $params['client_city'];
        $client_state = $params['client_state'];
        $client_country = $params['client_country'];
        $client_postcode = $params['client_postcode'];
        $client_email = $params['client_email'];
        $cardtype = $params['cardtype'];
        $cardexp = $params['cardexp'];
        $cardnum = $params['cardnum'];

        // then store the card details in SecureTrading and get the Transcation reference 
        $cardstore_xml_data = '<?xml version="1.0" encoding="utf-8"?>
                                                <requestblock version="3.67">
                                                        <alias>' . $gatewayusername . '</alias>
                                                        <request type="STORE">
                                                                <merchant>
                                                                <orderreference>' . $invoiceId . '</orderreference>
                                                                </merchant>
                                                                <operation>
                                                                <sitereference>' . $gatewaysiteref . '</sitereference>
                                                                <accounttypedescription>CARDSTORE</accounttypedescription>
                                                                </operation>
                                                                <billing>
                                                                        <premise>' . $client_address1 . '</premise>
                                                                        <street>' . $client_address2 . '</street>
                                                                        <town>' . $client_city . '</town>
                                                                        <county>' . $client_state . '</county>
                                                                        <country>' . $client_country . '</country>
                                                                        <postcode>' . $client_postcode . '</postcode>
                                                                        <email>' . $client_email . '</email>
                                                                        <payment type="' . strtoupper($cardtype) . '">
                                                                                <expirydate>' . substr($cardexp, 0, 2) . '/20' . substr($cardexp, 2, 2) . '</expirydate>
                                                                                <pan>' . $cardnum . '</pan>
                                                                        </payment>
                                                                        <name>
                                                                                <first>' . $client_firstname . '</first>
                                                                                <middle></middle>
                                                                                <last>' . $client_lastname . '</last>
                                                                        </name>
                                                                </billing>
                                                </request>
                                                </requestblock>';

        $authstr = "Basic " . base64_encode($gatewayusername . ":" . $gatewaypassword);
        $headers = array(
            "HTTP/1.1",
            "Host: webservices.securetrading.net",
            "Accept: text/xml",
            "Authorization: $authstr",
            "User-Agent: WHMCS Gateway Module",
            "Content-type: text/xml;charset=\"utf-8\"",
            "Content-length: " . strlen($cardstore_xml_data),
            "Connection: close",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://webservices.securetrading.net:443/xml/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $cardstore_xml_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_USERPWD, "$gatewayusername:$gatewaypassword");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $dataStore = curl_exec($ch);
        curl_close($ch);

        $xmlObj = new Base_Model_Lib_System_Commen_XmlToArray($dataStore);
        $xmldata = $xmlObj->createArray();

        $transactionReference = $xmldata['responseblock']['response'][0]['transactionreference'];
        $message = $xmldata['responseblock']['response'][0]['error'][0]['message'];
        $message_code = $xmldata['responseblock']['response'][0]['error'][0]['code'];

        $arrResponse['transactionreference'] = $transactionReference;
        $arrResponse['error_message'] = $message;
        $arrResponse['error_code'] = $message_code;
        
        $objGatewayLog = new Base_Model_Lib_Ext_Logger();
        $objGatewayLog->write($xmldata);

        return $arrResponse;
    }

}
?>