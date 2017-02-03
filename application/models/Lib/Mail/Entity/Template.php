<?php

/**
 * Mail_Entity_Template
 * 
 * @date 2009-05-25
 * 
 *
 */
class Base_Model_Lib_Mail_Entity_Template
{
	
	private $templateId		=	0;
	private $templateName	=	'';
	private $mailBody		=	null;
	private $mailHtmlBody	=	null;		
	private $mailFrom		=	'';
	private $mailFromName	=	'';
	private $mailSubject	=	'';
	private $storeId = 	'';
        private $isEnabled = 	'';
        private $mailType;
        private $mailCc;
        
	
	public function getTemplateId() {
            return $this->templateId;
        }

        public function setTemplateId($templateId) {
            $this->templateId = $templateId;
        }

        public function getTemplateName() {
            return $this->templateName;
        }

        public function setTemplateName($templateName) {
            $this->templateName = $templateName;
        }

        public function getMailBody() {
            return $this->mailBody;
        }

        public function setMailBody($mailBody) {
            $this->mailBody = $mailBody;
        }

        public function getMailHtmlBody() {
            return $this->mailHtmlBody;
        }

        public function setMailHtmlBody($mailHtmlBody) {
            $this->mailHtmlBody = $mailHtmlBody;
        }

        public function getMailFrom() {
            return $this->mailFrom;
        }

        public function setMailFrom($mailFrom) {
            $this->mailFrom = $mailFrom;
        }

        public function getMailFromName() {
            return $this->mailFromName;
        }

        public function setMailFromName($mailFromName) {
            $this->mailFromName = $mailFromName;
        }

        public function getMailSubject() {
            return $this->mailSubject;
        }

        public function setMailSubject($mailSubject) {
            $this->mailSubject = $mailSubject;
        }

        public function getStoreId() {
            return $this->storeId;
        }

        public function setStoreId($storeId) {
            $this->storeId = $storeId;
        }
        public function getIsEnabled() {
            return $this->isEnabled;
        }

        public function setIsEnabled($isEnabled) {
            $this->isEnabled = $isEnabled;
        }

        public function getMailType() {
            return $this->mailType;
        }

        public function setMailType($mailType) {
            $this->mailType = $mailType;
        }

        public function getMailCc() {
            return $this->mailCc;
        }

        public function setMailCc($mailCc) {
            $this->mailCc = $mailCc;
        }



}