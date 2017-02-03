<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Service
 * @name 			: Gocardless
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Gocardless Object
 *
 */
class Base_Model_Lib_System_Service_Gocardless extends Base_Model_Lib_Eav_Model_Service {

    private $environment = null;
    private $accountDetails = null;

    public function Base_Model_Lib_System_Service_Gocardless() {

        try {

            $objSettingService = new Base_Model_Lib_System_Service_Settings();
            $isSandBoxMode = $objSettingService->getItem(9)->getSettingValue();

            if ($isSandBoxMode == 'Yes') {
                $this->environment = 'sandbox';
                $appId = $objSettingService->getItem(11)->getSettingValue();
                $app_secret = $objSettingService->getItem(12)->getSettingValue();
                $merchant_id = $objSettingService->getItem(10)->getSettingValue();
                $access_token = $objSettingService->getItem(13)->getSettingValue();
            } else {
                $this->environment = 'production';
                $appId = $objSettingService->getItem(6)->getSettingValue();
                $app_secret = $objSettingService->getItem(7)->getSettingValue();
                $merchant_id = $objSettingService->getItem(5)->getSettingValue();
                $access_token = $objSettingService->getItem(8)->getSettingValue();
            }
            $this->environment = 'sandbox';
            $this->accountDetails = array(
                'app_id' => '3GVXY8PJ78WCEX4K8TA31YRB8ADWQA558YC46AJPFSKDZ3BPBZEEHP5052SN5A8W',
                'app_secret' => 'A6PF1SAK1GZVF63KEBN6ZZXF2N9A5ZQ96FPAERB43ZT1FEYWGQQW6AVG6T1QYYF0',
                'merchant_id' => '07FSZSE75F',
                'access_token' => '9BA5YTMYBXM2J0SKWC08628GB88VNA8GJFCSJFPQW1EK5Z26CVMGJXSHWX49K8B5'
            );
        } catch (Exception $ex) {
            print("Error : " . $ex->getMessage());
        }
    }

    public function getAccountDetails() {
        return $this->accountDetails;
    }

    public function doGocardlessPost($params) {

        GoCardless::$environment = $this->environment;
        // Config vars
        $account_details = $this->accountDetails;

        $invoiceId = $params['invoiceid'];
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
        $company_name = 'Here company name';
        GoCardless::set_account_details($account_details);

        $payment_details = array(
            'amount' => $amount,
            'interval_length' => 1,
            'interval_unit' => 'month',
            'state' => 'id_' . $invoiceId,
            'name' => "Invoice #" . $invoiceId,
            'user' => array(
                'first_name' => $client_firstname,
                'last_name' => $client_lastname,
                'company_name' => $company_name,
                'email' => $client_email,
                'billing_address1' => $client_address1,
                'billing_address2' => $client_address2,
                'billing_town' => $client_city,
                'billing_postcode' => $client_postcode
            ), 'redirect_uri' => 'https://portal.pluspro.com/modules/gateways/gocardless/redirect.php'
        );

        $authorization_url = GoCardless::new_pre_authorization_url($payment_details);

        return $authorization_url;
    }

    public function doGocardlessRebillPost($params) {
        
    }

    public static function doGocardlessRefundPost($params) {
        
    }

}

?>