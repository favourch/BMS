<?php

class Admin_ProductController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Transactions";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            $objProductAndServices = new Base_Model_Lib_Product_Service_Group();
            $productAndServices    = $objProductAndServices->getAllWithProducts();
            $this->view->productAndServices = $productAndServices;
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
       /**
     * The default action - show the home page
     */
    public function addAction() {
        try {
            $pageHeading = "Transactions";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            // get all product types...
            $objProductTypeService = new Base_Model_Lib_Product_Service_Types();
            $productTypes          = $objProductTypeService->getAll('Product_Services');
            $this->view->productTypes = $productTypes;
            
            
             // get all product groups...
            $objProductGroupService = new Base_Model_Lib_Product_Service_Group();
            $productGroups          = $objProductGroupService->getAll();
            $this->view->productGroups = $productGroups;

             // get all email templates...
            $objMailTemplateService = new Base_Model_Lib_Mail_Service_Template();
            $mailTemplates          = $objMailTemplateService->getAll();
            $this->view->mailTemplates = $mailTemplates;
            
            // get all the currencies....
            $objCurrencyService = new Base_Model_Lib_Catelog_Service_Currency();
            $currencies         = $objCurrencyService->getAll();
            $this->view->currencies = $currencies;
            
            $objProductEntity = new Base_Model_Lib_Product_Entity_Product();
            $objProductService = new Base_Model_Lib_Product_Service_Product();
            
            $objPricingEntity = new Base_Model_Lib_Product_Entity_Pricing();
            $objPricingService = new Base_Model_Lib_Product_Service_Pricing();
            
            
             if ($this->_request->isPost()) {
                 
                 
                $productId                  = null; 
                $productType                = $this->_request->getParam('cmbProductType'); 
                $productGid                 = $this->_request->getParam('cmbProductGroup'); 
                $productName                = $this->_request->getParam('txtProductName'); 
                $productDescription         = $this->_request->getParam('txtProductDescription'); 
                $productHidden              = $this->_request->getParam('chkHide'); 
                $productShowdomainoptions   = $this->_request->getParam('chkRequiredDomain'); 
                $productWelcomeemail        = $this->_request->getParam('cmbMailTemplate'); 
                $productStockcontrol        = $this->_request->getParam('chkEnableQty'); 
                $productQty                 = $this->_request->getParam('qtyInStock'); 
                $productPaytype             = $this->_request->getParam('rdPayType'); 
                $productAllowqty            = $this->_request->getParam('qtyInStock');
                $productRecurringcycles     = null;
                $productTax                 = $this->_request->getParam('chkApplyTax');
                $productDownloads           = null;
                $productSortOrder           = $this->_request->getParam('txtSortOrder');
                $productRetired             = $this->_request->getParam('chkHide'); 
                $productHasAdmin            = $this->_request->getParam('cmbHasAdmin'); 
                $productCpanelPackage       = $this->_request->getParam('cmbcPanelPackage'); 
                 
                
                $objProductEntity->setProductType($productType);
                $objProductEntity->setProductGroup($productGid);
                $objProductEntity->setProductName($productName);
                $objProductEntity->setProductDescription($productDescription);
                $objProductEntity->setIsHidden($productHidden);
                $objProductEntity->setShowdomainoptions($productShowdomainoptions);
                $objProductEntity->setWelcomeemail($productWelcomeemail);
                $objProductEntity->setStockcontrol($productStockcontrol);
                $objProductEntity->setProductQty($productQty);
                $objProductEntity->setPaytype($productPaytype);
                $objProductEntity->setAllowqty($productAllowqty);
                $objProductEntity->setRecurringcycles($productRecurringcycles);
                $objProductEntity->setTax($productTax);
                $objProductEntity->setDownloads($productDownloads);
                $objProductEntity->setSortOrder($productSortOrder);
                $objProductEntity->setIsRetired($productRetired);
                $objProductEntity->setHasAdmin($productHasAdmin);
                $objProductEntity->setCPanelPackage($productCpanelPackage);
                $objProductService->product = $objProductEntity;
                $productId = $objProductService->addItem();
                
                
                $currencyIds = $this->_request->getParam('txtCurrencyId'); 
                $monthlySetUpFee   = $this->_request->getParam('txtSetUpFeeMonthly');
                $quarterlySetUpFee   = $this->_request->getParam('txtSetUpFeeQuarterly');
                $semiAnnuallySetUpFee   = $this->_request->getParam('txtSetUpFeeSemiAnnually');
                $annuallySetUpFee   = $this->_request->getParam('txtSetUpFeeAnnually');
                $bienniallySetUpFee   = $this->_request->getParam('txtSetUpFeeBiennially');
                $trienniallySetUpFee   = $this->_request->getParam('txtSetUpFeeTriennially');
                
                $monthlyFee   = $this->_request->getParam('txtFeeMonthly');
                $quarterlyFee   = $this->_request->getParam('txtFeeQuarterly');
                $semiAnnuallyFee   = $this->_request->getParam('txtFeeSemiAnnually');
                $annuallyFee   = $this->_request->getParam('txtFeeAnnually');
                $bienniallyFee   = $this->_request->getParam('txtFeeBiennially');
                $trienniallyFee   = $this->_request->getParam('txtFeeTriennially');
                
                foreach($currencyIds As $cId=>$currencyId){
                    
                    $objPricingEntity = new Base_Model_Lib_Product_Entity_Pricing();
                    $objPricingEntity->setType('product');
                    $objPricingEntity->setCurrency($currencyId);
                    $objPricingEntity->setMonthlySetupfee($monthlySetUpFee[$cId]);
                    $objPricingEntity->setMonthlyFee($monthlyFee[$cId]);
                    $objPricingEntity->setQuarterlySetupfee($quarterlySetUpFee[$cId]);
                    $objPricingEntity->setQuarterlyFee($quarterlyFee[$cId]);
                    $objPricingEntity->setSemiAnnuallySetupfee($semiAnnuallySetUpFee[$cId]);
                    $objPricingEntity->setSemiAnnuallyFee($semiAnnuallyFee[$cId]);
                    $objPricingEntity->setAnnuallySetupfee($annuallySetUpFee[$cId]);
                    $objPricingEntity->setAnnuallyFee($annuallyFee[$cId]);
                    $objPricingEntity->setBienniallySetupfee($bienniallySetUpFee[$cId]);
                    $objPricingEntity->setBienniallyFee($bienniallyFee[$cId]);
                    $objPricingEntity->setTrienniallySetupfee($trienniallySetUpFee[$cId]);
                    $objPricingEntity->setTrienniallyFee($trienniallyFee[$cId]);
                    $objPricingEntity->setProductId($productId);
                    $objPricingService->pricing = $objPricingEntity;
                    $objPricingService->addItem();
                }
                
                
                
                if($productId){
                            $this->_redirect('/admin/product/');
                        } else {
                            $this->_redirect('/admin/product/add/?error=1');
                        }
                
                 
             } else {
                 
                 $objCpanelPackages = new Base_Model_Lib_Catelog_Service_CpanelPackage();
                 $cpanelPackages  = $objCpanelPackages->getAll();
                 $this->view->cpanelPackages = $cpanelPackages;
             }
            
            
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
    
    
     /**
     * The default action - show the home page
     */
    public function editAction() {
        try {
            $pageHeading = "Transactions";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            // get all product types...
            $objProductTypeService = new Base_Model_Lib_Product_Service_Types();
            $productTypes          = $objProductTypeService->getAll('Product_Services');
            $this->view->productTypes = $productTypes;
            
            
             // get all product groups...
            $objProductGroupService = new Base_Model_Lib_Product_Service_Group();
            $productGroups          = $objProductGroupService->getAll();
            $this->view->productGroups = $productGroups;

             // get all email templates...
            $objMailTemplateService = new Base_Model_Lib_Mail_Service_Template();
            $mailTemplates          = $objMailTemplateService->getAll();
            $this->view->mailTemplates = $mailTemplates;
            
            // get all the currencies....
            $objCurrencyService = new Base_Model_Lib_Catelog_Service_Currency();
            $currencies         = $objCurrencyService->getAll();
            $this->view->currencies = $currencies;
            
            $objProductEntity = new Base_Model_Lib_Product_Entity_Product();
            $objProductService = new Base_Model_Lib_Product_Service_Product();
            
            $objPricingEntity = new Base_Model_Lib_Product_Entity_Pricing();
            $objPricingService = new Base_Model_Lib_Product_Service_Pricing();
            
            
             if ($this->_request->isPost()) {
                 
                 
                $productId                  = $this->_request->getParam('txtProductId'); 
                $productType                = $this->_request->getParam('cmbProductType'); 
                $productGid                 = $this->_request->getParam('cmbProductGroup'); 
                $productName                = $this->_request->getParam('txtProductName'); 
                $productDescription         = $this->_request->getParam('txtProductDescription'); 
                $productHidden              = $this->_request->getParam('chkHide'); 
                $productShowdomainoptions   = $this->_request->getParam('chkRequiredDomain'); 
                $productWelcomeemail        = $this->_request->getParam('cmbMailTemplate'); 
                $productStockcontrol        = $this->_request->getParam('chkEnableQty'); 
                $productQty                 = $this->_request->getParam('qtyInStock'); 
                $productPaytype             = $this->_request->getParam('rdPayType'); 
                $productAllowqty            = $this->_request->getParam('qtyInStock');
                $productRecurringcycles     = null;
                $productTax                 = $this->_request->getParam('chkApplyTax');
                $productDownloads           = null;
                $productSortOrder           = $this->_request->getParam('txtSortOrder');
                $productRetired             = $this->_request->getParam('chkHide');
                $productHasAdmin            = $this->_request->getParam('cmbHasAdmin'); 
                $productCpanelPackage       = $this->_request->getParam('cmbcPanelPackage'); 
                 
                
                $objProductEntity->setId($productId);
                $objProductEntity->setProductType($productType);
                $objProductEntity->setProductGroup($productGid);
                $objProductEntity->setProductName($productName);
                $objProductEntity->setProductDescription($productDescription);
                $objProductEntity->setIsHidden($productHidden);
                $objProductEntity->setShowdomainoptions($productShowdomainoptions);
                $objProductEntity->setWelcomeemail($productWelcomeemail);
                $objProductEntity->setStockcontrol($productStockcontrol);
                $objProductEntity->setProductQty($productQty);
                $objProductEntity->setPaytype($productPaytype);
                $objProductEntity->setAllowqty($productAllowqty);
                $objProductEntity->setRecurringcycles($productRecurringcycles);
                $objProductEntity->setTax($productTax);
                $objProductEntity->setDownloads($productDownloads);
                $objProductEntity->setSortOrder($productSortOrder);
                $objProductEntity->setIsRetired($productRetired);
                $objProductEntity->setHasAdmin($productHasAdmin);
                $objProductEntity->setCPanelPackage($productCpanelPackage);
                $objProductService->product = $objProductEntity;
                $IsUpdated = $objProductService->updateItem();
                
                
                $pricingIds = $this->_request->getParam('txtPriceId'); 
                $currencyIds = $this->_request->getParam('txtCurrencyId'); 
                $monthlySetUpFee   = $this->_request->getParam('txtSetUpFeeMonthly');
                $quarterlySetUpFee   = $this->_request->getParam('txtSetUpFeeQuarterly');
                $semiAnnuallySetUpFee   = $this->_request->getParam('txtSetUpFeeSemiAnnually');
                $annuallySetUpFee   = $this->_request->getParam('txtSetUpFeeAnnually');
                $bienniallySetUpFee   = $this->_request->getParam('txtSetUpFeeBiennially');
                $trienniallySetUpFee   = $this->_request->getParam('txtSetUpFeeTriennially');
                
                $monthlyFee   = $this->_request->getParam('txtFeeMonthly');
                $quarterlyFee   = $this->_request->getParam('txtFeeQuarterly');
                $semiAnnuallyFee   = $this->_request->getParam('txtFeeSemiAnnually');
                $annuallyFee   = $this->_request->getParam('txtFeeAnnually');
                $bienniallyFee   = $this->_request->getParam('txtFeeBiennially');
                $trienniallyFee   = $this->_request->getParam('txtFeeTriennially');
                
                foreach($currencyIds As $cId=>$currencyId){
                    
                    $objPricingEntity = new Base_Model_Lib_Product_Entity_Pricing();
                    $objPricingEntity->setType('product');
                    $objPricingEntity->setId($pricingIds[$cId]);
                    $objPricingEntity->setCurrency($currencyId);
                    $objPricingEntity->setMonthlySetupfee($monthlySetUpFee[$cId]);
                    $objPricingEntity->setMonthlyFee($monthlyFee[$cId]);
                    $objPricingEntity->setQuarterlySetupfee($quarterlySetUpFee[$cId]);
                    $objPricingEntity->setQuarterlyFee($quarterlyFee[$cId]);
                    $objPricingEntity->setSemiAnnuallySetupfee($semiAnnuallySetUpFee[$cId]);
                    $objPricingEntity->setSemiAnnuallyFee($semiAnnuallyFee[$cId]);
                    $objPricingEntity->setAnnuallySetupfee($annuallySetUpFee[$cId]);
                    $objPricingEntity->setAnnuallyFee($annuallyFee[$cId]);
                    $objPricingEntity->setBienniallySetupfee($bienniallySetUpFee[$cId]);
                    $objPricingEntity->setBienniallyFee($bienniallyFee[$cId]);
                    $objPricingEntity->setTrienniallySetupfee($trienniallySetUpFee[$cId]);
                    $objPricingEntity->setTrienniallyFee($trienniallyFee[$cId]);
                    $objPricingEntity->setProductId($productId);
                    $objPricingService->pricing = $objPricingEntity;
                    $objPricingService->updateItem();
                }
                
                
                
                if($productId){
                            $this->_redirect('/admin/product/');
                        } else {
                            $this->_redirect('/admin/product/add/?error=1');
                        }
                
                 
             } else {
                 
                 $productId     = $this->_request->getParam('id'); 
                 $productInfo   = $objProductService->getItem($productId);
                 $this->view->productInfo = $productInfo;
                 
                   $objCpanelPackages = new Base_Model_Lib_Catelog_Service_CpanelPackage();
                 $cpanelPackages  = $objCpanelPackages->getAll();
                 $this->view->cpanelPackages = $cpanelPackages;
                 
             }
            
            
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
        /**
     * The default action - show the home page
     */
    public function deleteAction() {
        try {
            $pageHeading = "Transactions";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            $productId     = $this->_request->getParam('id'); 
     
            $objProductEntity = new Base_Model_Lib_Product_Entity_Product();
            $objProductService = new Base_Model_Lib_Product_Service_Product();
            $objProductEntity->setId($productId);
            $objProductService->product = $objProductEntity;
            $objProductService->deleteItem();
            $this->_redirect('/admin/product/');
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}