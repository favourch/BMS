<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Mail.Service
 * @name 			: Template
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The Service class for the Template Object 
 * 	
 */
class Base_Model_Lib_Mail_Service_Template extends Base_Model_Lib_Eav_Model_Service {

    public $template;

    /**
     * @name - read
     */
    public function read($templateId) {

        $template = array();

        try {
            $templateDao = new Base_Model_Lib_Mail_Dao_Template();
            $template = $templateDao->read($templateId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception(" Error in Album create " . $e->getMessage());
        }
        return $template;
    }

    /**
     * @name 			- getAll
     */
    public function getAll() {
        $arrTemplates = array();

        try {
            $templateDao = new Base_Model_Lib_Mail_Dao_Template();
            $arrTemplates = $templateDao->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception(" Error in Album create " . $e->getMessage());
        }
        return $arrTemplates;
    }

    /**
     * getTemplateByName
     *
     * @param String $tmpName
     * @return $templateLangDao
     */
    public function getMailTemplateByName($name, $storeId = null) {
        $templateDao = new Base_Model_Lib_Mail_Dao_Template();

        return $templateDao->getMailTemplateByName($name, $storeId);
    }

    /*
     * @name        : addTemplate()
     * @Description : The function is to add a addTemplate() information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addTemplate() {
        $last_inserted_id = 0;
        try {

            if (!($this->template instanceof Base_Model_Lib_Mail_Entity_Template))
                throw new Base_Model_Lib_Mail_Exception(" Template Entity not intialized");

            $objTemplateDao = new Base_Model_Lib_Mail_Dao_Template();
            $objTemplateDao->template = $this->template;
            $last_inserted_id = $objTemplateDao->addTemplate();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>addStatus()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateStatus
     * @Description : The function is to update/edit a status information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateTemplate() {
        $success = false;
        try {

            if (!($this->template instanceof Base_Model_Lib_Mail_Entity_Template))
                throw new Base_Model_Lib_Mail_Exception(" Template Entity not intialized");

            $objTemplateDao = new Base_Model_Lib_Mail_Dao_Template();
            $objTemplateDao->template = $this->template;
            $success = $objTemplateDao->updateTemplate();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>updateProgram()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    
    
    /*
     * @name        : updateStatus
     * @Description : The function is to update/edit a status information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteTemplate() {
        $success = false;
        try {

            if (!($this->template instanceof Base_Model_Lib_Mail_Entity_Template))
                throw new Base_Model_Lib_Mail_Exception(" Template Entity not intialized");

            $objTemplateDao = new Base_Model_Lib_Mail_Dao_Template();
            $objTemplateDao->template = $this->template;
            $success = $objTemplateDao->deleteTemplate();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Status_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Status_Service_Status</em>, <strong>Function -</strong> <em>updateProgram()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
}