<?php

/**
 * Description of Document
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Doc_Service_Document extends Base_Model_ObtorLib_Eav_Model_Service {

    public $document;

    /*
     * Get a user document using id
     * @return      : Entity Document Object (Base_Model_ObtorLib_App_Core_Doc_Entity_Document)
     */

    public function getDocument($id) {
        try {
            $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
            $document = $objDocument->getDocument($id);
            return $document;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($e);
        }
    }

    /*
     * Add new user document
     * @return      : Integer ID / Null
     */

    public function addDocument() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
                $objDocument->document = $this->document;
                return $objDocument->addDocument();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Update user document
     * @return      : Integer ID / Null
     */

    public function updateDocument() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
                $objDocument->document = $this->document;
                return $objDocument->updateDocument();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }
    
    
        /*
     * Update user document
     * @return      : Integer ID / Null
     */

    public function updateDocumentInfo() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
                $objDocument->document = $this->document;
                return $objDocument->updateDocumentInfo();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Delete user document
     * @return      : Integer ID / Null
     */

    public function deleteDocument() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
                $objDocument->document = $this->document;
                return $objDocument->deleteDocument();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Search user documents....
     * @return : Array of Documents Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
                $objDocument->document = $this->document;
                return $objDocument->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }
    
    /*
     * Search user documents....
     * @return : Array of Documents Entities...
     */

    public function searchCount() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
                $objDocument->document = $this->document;
                return $objDocument->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }
    
    
    
    /*
     * Search shared user documents....
     * @return : Array of documents Entities...
     */

    public function searchSharedDoc($limit = null) {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
                $objDocument->document = $this->document;
                return $objDocument->searchSharedDoc($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }
    
    
      /*
     * Search count shared user documents....
     * @return : Array of documents Entities...
     */

    public function searchCountSharedDoc() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $objDocument = new Base_Model_ObtorLib_App_Core_Doc_Dao_Document();
                $objDocument->document = $this->document;
                return $objDocument->searchCountSharedDoc();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

}
