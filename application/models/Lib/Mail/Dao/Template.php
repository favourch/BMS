<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Mail.Dao
 * @name 			: Template
 * @author 			: Iyngaran Iyathurai
 * 			          E-Mail - Iyngaran55@yahoo.com
 * 
 * @copyright  	Copyright (c) 2009 Hemnette Web Solutions (Pvt) Ltd, Sri Lanka.
 * 				(http://hemnettewebsolutions.com.au/)
 * 
 * Description : The object-oriented interface to bcas database table tbl_department 
 * 	
 */
class Base_Model_Lib_Mail_Dao_Template extends Zend_Db_Table {

    protected $_name = 'tbl_mail_template'; // the table name 
    protected $_primary = 'mt_id'; // the primary key
    // the template object
    public $template;

    /**
     * read
     *
     * @param String $name
     * @return $templateLang
     */
    public function read($id) {
        $template = new Base_Model_Lib_Mail_Entity_Template();

        try {

            $id = (int) $id;
            $row = $this->fetchRow('mt_id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $template->setTemplateId($result ['mt_id']);
                $template->setTemplateName($result ['mt_name']);
                $template->setMailBody($result['mt_text']);
                $template->setMailHtmlBody($result['mt_body']);
                $template->setMailSubject($result['mt_subject']);
                $template->setMailFrom($result['mt_from_email']);
                $template->setMailFromName($result['mt_from_name']);
                $template->setStoreId($result['tbl_radio_station']);
                $template->setIsEnabled($result['mt_enabled']);
                $template->setMailType($result['type']);
                $template->setMailCc($result['mail_cc']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Announcements_Dao_Template</em>, <strong>Function -</strong> <em>getMailTemplateByName()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $template;
    }

    /**
     * @name 			- getAll
     * Description 		- read all email templates information from the email template table.
     * @return 			  array of Template Entity object
     * @param 			- $id
     */
    public function getAll() {
        // declare an array variable
        $arrEmailTemplates = array();

        try {
            $select = $this->select()
                    ->from('tbl_mail_template', array('mt_id'));
                   


            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $templateObj = $this->read($row->mt_id);
                array_push($arrEmailTemplates, $templateObj);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql(" Error in Template getAll " . $e->getMessage());
        }

        // return the result
        return $arrEmailTemplates;
    }

    /**
     * getMailTemplateByName
     *
     * @param String $name
     * @return $templateLang
     */
    public function getMailTemplateByName($name, $storeId = null) {
        $template = new Base_Model_Lib_Mail_Entity_Template();

        try {
            $select = $this->select()
                    ->from('tbl_mail_template', array('mt_id'))
                    ->where('mt_name = ?', $name)
                    ->limit(1, 0);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $template = $this->read($row->mt_id);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql(" Error in Template getAll " . $e->getMessage());
        }

        return $template;
    }

    /*
     * @name        : addTemplate
     * @Description : The function is to add a Template information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addTemplate() {
        $last_inserted_id = 0;

        try {

            if (!($this->template instanceof Base_Model_Lib_Mail_Entity_Template))
                throw new Base_Model_Lib_Mail_Exception(" Status Entity not intialized");

            $data = array(
                'mt_name' => $this->template->getTemplateName(),
                'mt_from_email' => $this->template->getMailFrom(),
                'mt_from_name' => $this->template->getMailFromName(),
                'mt_subject' => $this->template->getMailSubject(),
                'mt_text' => $this->template->getMailBody(),
                'mt_enabled' => $this->template->getIsEnabled(),
                'tbl_radio_station' => $this->template->getStoreId(),
                'mt_body' => $this->template->getMailHtmlBody(),
                'type' => $this->template->getMailType(),
                'mail_cc' => $this->template->getMailCc()
            );
            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql(" Error in Template getAll " . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : addTemplate
     * @Description : The function is to add a Template information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateTemplate() {
        $success = false;
        try {

            if (!($this->template instanceof Base_Model_Lib_Mail_Entity_Template))
                throw new Base_Model_Lib_Mail_Exception(" Status Entity not intialized");
                $data = array(
                'mt_name' => $this->template->getTemplateName(),
                'mt_from_email' => $this->template->getMailFrom(),
                'mt_from_name' => $this->template->getMailFromName(),
                'mt_subject' => $this->template->getMailSubject(),
                'mt_text' => $this->template->getMailBody(),
                'mt_enabled' => $this->template->getIsEnabled(),
                'tbl_radio_station' => $this->template->getStoreId(),
                'mt_body' => $this->template->getMailHtmlBody(),
                'type' => $this->template->getMailType(),
                'mail_cc' => $this->template->getMailCc()
            );
            $this->update($data, 'mt_id = ' . (int) $this->template->getTemplateId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql(" Error in Template getAll " . $e->getMessage());
        }
        return $success;
    }

    /*
     * @name        : deleteTemplate
     * @Description : The function is to add a Template information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function deleteTemplate() {
        $success = false;
        try {

            if (!($this->template instanceof Base_Model_Lib_Mail_Entity_Template))
                throw new Base_Model_Lib_Mail_Exception(" Status Entity not intialized");

            if ($this->delete('mt_id =' . (int) $this->template->getTemplateId()) == '1') {
                $success = true;
            }
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql(" Error in Template getAll " . $e->getMessage());
        }
        return $success;
    }

}