<?php

/**
 * Description of Document
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Doc_Dao_Document extends Zend_Db_Table_Abstract {

    //put your code here
    public $document;
    protected $_name = 'tbl_documents';

    /*
     * Get a document using id
     * @return      : Entity Document Object (Base_Model_ObtorLib_App_Core_Doc_Entity_Document)
     */

    public function getDocument($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $documentRow = $row->toArray();
                $documentEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Document();
                $documentEntity->setId($documentRow['id']);
                $documentEntity->setDocTitle($documentRow['doc_title']);
                $documentEntity->setDocDescription($documentRow['doc_description']);
                $documentEntity->setDocPermission($documentRow['doc_permission']);
                $documentEntity->setDocAttachment($documentRow['doc_attachment']);
                $documentEntity->setDocAddedBy($documentRow['doc_added_by']);
                $documentEntity->setDocAddedOn($documentRow['doc_added_on']);
                $documentEntity->setDocUpdatedBy($documentRow['doc_updated_by']);
                $documentEntity->setDocUpdatedOn($documentRow['doc_updated_on']);
                return $documentEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addDocument() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                $data = array(
                    'doc_title' => $this->document->getDocTitle(),
                    'doc_description' => $this->document->getDocDescription(),
                    'doc_permission' => $this->document->getDocPermission(),
                    'doc_attachment' => $this->document->getDocAttachment(),
                    'doc_added_by' => $this->document->getDocAddedBy(),
                    'doc_added_on' => $this->document->getDocAddedOn(),
                    'doc_updated_by' => $this->document->getDocUpdatedBy(),
                    'doc_updated_on' => $this->document->getDocUpdatedOn());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Update document
     * @return      : Boolean true/false
     */

    public function updateDocument() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                 $data = array(
                    'doc_title' => $this->document->getDocTitle(),
                    'doc_description' => $this->document->getDocDescription(),
                    'doc_permission' => $this->document->getDocPermission(),
                    'doc_attachment' => $this->document->getDocAttachment(),
                    'doc_updated_by' => $this->document->getDocUpdatedBy(),
                    'doc_updated_on' => $this->document->getDocUpdatedOn());
                return $this->update($data, 'id = ' . (int) $this->document->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }
    
    
    /*
     * Update document
     * @return      : Boolean true/false
     */

    public function updateDocumentInfo() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                 $data = array(
                    'doc_title' => $this->document->getDocTitle(),
                    'doc_description' => $this->document->getDocDescription(),
                    'doc_permission' => $this->document->getDocPermission(),
                    'doc_updated_by' => $this->document->getDocUpdatedBy(),
                    'doc_updated_on' => $this->document->getDocUpdatedOn());
                return $this->update($data, 'id = ' . (int) $this->document->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Delete document
     * @return      : Integer ID / Null
     */

    public function deleteDocument() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->document->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Search user documents....
     * @return : Array of documents Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not initialized");
            } else {
                $arrWhere = array();
                $arrdocuments = array();
                $docAddedBy = $this->document->getDocAddedBy();
                $documentSql = "SELECT id FROM tbl_documents d";
                if ($docAddedBy) {
                    array_push($arrWhere, "doc_added_by = '" . $docAddedBy . "'");
                }

                if (count($arrWhere) > 0) {
                    $documentSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $documentSql = $documentSql." ORDER BY id Asc";
                if(!is_null($limit)){
                    $documentSql = $documentSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($documentSql);
                foreach ($result as $documentId) {
                    $documentInfo = $this->getDocument($documentId);
                    array_push($arrdocuments, $documentInfo);
                }
                return $arrdocuments;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }
    
    
    
    /*
     * count documents....
     * @return : Array of documents Entities...
     */

    public function searchCount() {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not initialized");
            } else {
                $arrWhere = array();
                $arrdocuments = array();
                $docAddedBy = $this->document->getDocAddedBy();
                $documentSql = "SELECT count(id) as tot FROM tbl_documents ";
                if ($docAddedBy) {
                    array_push($arrWhere, "doc_added_by = '" . $docAddedBy . "'");
                }

                if (count($arrWhere) > 0) {
                    $documentSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($documentSql);
                $total_number = $result['tot']; 
                return $total_number;
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
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not initialized");
            } else {
                $arrWhere = array();
                $arrdocuments = array();
                $docAddedBy = $this->document->getDocAddedBy();
                $sharedUserId  = $this->document->getSharedUserId();
                
                $documentSql = "SELECT d.id as id FROM tbl_documents d,tbl_doc_permission dp";
                array_push($arrWhere, "d.id = dp.document_id");
                
                if($sharedUserId){
                    array_push($arrWhere, "dp.user_id = '" . $sharedUserId . "'");
                }
                
                if ($docAddedBy) {
                    array_push($arrWhere, "d.doc_added_by = '" . $docAddedBy . "'");
                }

                if (count($arrWhere) > 0) {
                    $documentSql.= " WHERE " . implode(' AND ',$arrWhere);
                }
                
                $documentSql = $documentSql." ORDER BY d.id Asc";
                if(!is_null($limit)){
                    $documentSql = $documentSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($documentSql);
                foreach ($result as $documentId) {
                    $documentInfo = $this->getDocument($documentId);
                    array_push($arrdocuments, $documentInfo);
                }
                return $arrdocuments;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }


    /*
     * Search count shared user documents....
     * @return : Array of documents Entities...
     */

    public function searchCountSharedDoc($limit = null) {
        try {
            if (!($this->document instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Document)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Document Entity not initialized");
            } else {
                $arrWhere = array();
                $arrdocuments = array();
                $docAddedBy = $this->document->getDocAddedBy();
                $sharedUserId  = $this->document->getSharedUserId();
                
                $documentSql = "SELECT count(d.id) as tot FROM tbl_documents d,tbl_doc_permission dp";
                array_push($arrWhere, "d.id = dp.document_id");
                
                if($sharedUserId){
                    array_push($arrWhere, "dp.user_id = '" . $sharedUserId . "'");
                }
                
                if ($docAddedBy) {
                    array_push($arrWhere, "d.doc_added_by = '" . $docAddedBy . "'");
                }

                if (count($arrWhere) > 0) {
                    $documentSql.= " WHERE " . implode(' AND ',$arrWhere);
                }
                
                $documentSql = $documentSql." ORDER BY d.id Asc";
               // print($documentSql);exit;
                if(!is_null($limit)){
                    $documentSql = $documentSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($documentSql);
                $total_number = $result['tot']; 
                return $total_number;
                
                
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }
    

}
