<?php

/**
 * Description of Lead
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Dao_Lead extends Zend_Db_Table_Abstract {

    //put your code here
    public $lead;
    protected $_name = 'tbl_leads';

    /*
     * Get a lead using id
     * @return      : Entity Lead Object (Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)
     */

    public function getLead($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $leadRow = $row->toArray();
                $leadEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Lead();
                $leadEntity->setId($leadRow['id']);
                $leadEntity->setLeadNo($leadRow['lead_no']);
                $leadEntity->setEmail($leadRow['email']);
                $leadEntity->setIntrest($leadRow['intrest']);
                $leadEntity->setFirstName($leadRow['firstname']);
                $leadEntity->setSalutation($leadRow['salutation']);
                $leadEntity->setLastName($leadRow['lastname']);
                $leadEntity->setCompany($leadRow['company']);
                $leadEntity->setAnualRevenue($leadRow['anualrevenue']);
                $leadEntity->setIndustry($leadRow['industry']);
                $leadEntity->setCampaign($leadRow['campaign']);
                $leadEntity->setRating($leadRow['rating']);
                $leadEntity->setLeadstatus($leadRow['leadstatus']);
                $leadEntity->setLeadsource($leadRow['leadsource']);
                $leadEntity->setConverted($leadRow['converted']);
                $leadEntity->setDesignation($leadRow['designation']);
                $leadEntity->setLicencekeystatus($leadRow['licencekeystatus']);
                $leadEntity->setSpace($leadRow['space']);
                $leadEntity->setComments($leadRow['comments']);
                $leadEntity->setPriority($leadRow['priority']);
                $leadEntity->setDemoRequest($leadRow['demorequest']);
                $leadEntity->setPartnerContact($leadRow['partnercontact']);
                $leadEntity->setProductVersion($leadRow['productversion']);
                $leadEntity->setProduct($leadRow['product']);
                $leadEntity->setMaildate($leadRow['maildate']);
                $leadEntity->setNextStepDate($leadRow['nextstepdate']);
                $leadEntity->setFundingSituation($leadRow['fundingsituation']);
                $leadEntity->setPurpose($leadRow['purpose']);
                $leadEntity->setEvaluationStatus($leadRow['evaluationstatus']);
                $leadEntity->setTransferdate($leadRow['transferdate']);
                $leadEntity->setRevenueType($leadRow['revenuetype']);
                $leadEntity->setNoofEmployees($leadRow['noofemployees']);
                $leadEntity->setYahooId($leadRow['yahooid']);
                $leadEntity->setAssignLeadchk($leadRow['assignleadchk']);
                $leadEntity->setAssignedTo($leadRow['assigned_to']);
                return $leadEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addLead() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Lead Entity not intialized");
            } else {
               
                $data = array(
                    'lead_no' => $this->lead->getLeadNo(),
                    'email' => $this->lead->getEmail(),
                    'intrest' => $this->lead->getIntrest(),
                    'firstname' => $this->lead->getFirstName(),
                    'salutation' => $this->lead->getSalutation(),
                    'lastname' => $this->lead->getLastName(),
                    'company' => $this->lead->getCompany(),
                    'anualrevenue' => $this->lead->getAnualRevenue(),
                    'industry' => $this->lead->getIndustry(),
                    'campaign' => $this->lead->getCampaign(),
                    'rating' => $this->lead->getRating(),
                    'leadstatus' => $this->lead->getLeadstatus(),
                    'leadsource' => $this->lead->getLeadsource(),
                    'converted' => $this->lead->getConverted(),
                    'designation' => $this->lead->getDesignation(),
                    'licencekeystatus' => $this->lead->getLicencekeystatus(),
                    'space' => $this->lead->getSpace(),
                    'comments' => $this->lead->getComments(),
                    'priority' => $this->lead->getPriority(),
                    'demorequest' => $this->lead->getDemoRequest(),
                    'partnercontact' => $this->lead->getPartnerContact(),
                    'productversion' => $this->lead->getProductVersion(),
                    'product' => $this->lead->getProduct(),
                    'maildate' => $this->lead->getMaildate(),
                    'nextstepdate' => $this->lead->getNextStepDate(),
                    'fundingsituation' => $this->lead->getFundingSituation(),
                    'purpose' => $this->lead->getPurpose(),
                    'evaluationstatus' => $this->lead->getEvaluationStatus(),
                    'transferdate' => $this->lead->getTransferdate(),
                    'revenuetype' => $this->lead->getRevenueType(),
                    'noofemployees' => $this->lead->getNoofEmployees(),
                    'yahooid' => $this->lead->getYahooId(),
                    'assignleadchk' => $this->lead->getAssignLeadchk(),
                    'assigned_to' => $this->lead->getAssignedTo());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update lead
     * @return      : Boolean true/false
     */

    public function updateLead() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Lead Entity not intialized");
            } else {
                $data = array(
                    'lead_no' => $this->lead->getLeadNo(),
                    'email' => $this->lead->getEmail(),
                    'intrest' => $this->lead->getIntrest(),
                    'firstname' => $this->lead->getFirstName(),
                    'salutation' => $this->lead->getSalutation(),
                    'lastname' => $this->lead->getLastName(),
                    'company' => $this->lead->getCompany(),
                    'anualrevenue' => $this->lead->getAnualRevenue(),
                    'industry' => $this->lead->getIndustry(),
                    'campaign' => $this->lead->getCampaign(),
                    'rating' => $this->lead->getRating(),
                    'leadstatus' => $this->lead->getLeadstatus(),
                    'leadsource' => $this->lead->getLeadsource(),
                    'converted' => $this->lead->getConverted(),
                    'designation' => $this->lead->getDesignation(),
                    'licencekeystatus' => $this->lead->getLicencekeystatus(),
                    'space' => $this->lead->getSpace(),
                    'comments' => $this->lead->getComments(),
                    'priority' => $this->lead->getPriority(),
                    'demorequest' => $this->lead->getDemoRequest(),
                    'partnercontact' => $this->lead->getPartnerContact(),
                    'productversion' => $this->lead->getProductVersion(),
                    'product' => $this->lead->getProduct(),
                    'maildate' => $this->lead->getMaildate(),
                    'nextstepdate' => $this->lead->getNextStepDate(),
                    'fundingsituation' => $this->lead->getFundingSituation(),
                    'purpose' => $this->lead->getPurpose(),
                    'evaluationstatus' => $this->lead->getEvaluationStatus(),
                    'transferdate' => $this->lead->getTransferdate(),
                    'revenuetype' => $this->lead->getRevenueType(),
                    'noofemployees' => $this->lead->getNoofEmployees(),
                    'yahooid' => $this->lead->getYahooId(),
                    'assignleadchk' => $this->lead->getAssignLeadchk(),
                    'assigned_to' => $this->lead->getAssignedTo());
                return $this->update($data, 'id = ' . (int) $this->lead->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete lead
     * @return      : Integer ID / Null
     */

    public function deleteLead() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Lead Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->lead->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user leads....
     * @return : Array of Leads Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("Lead Entity not intialized");
            } else {
                $arrWhere = array();
                $arrLeads = array();
                $leadEmail = $this->lead->getEmail();
                $leadSql = "SELECT id FROM tbl_leads ";
                
                if ($leadEmail) {
                    array_push($arrWhere, "email = '" . $leadEmail . "'");
                }

                if (count($arrWhere) > 0) {
                    $leadSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $leadSql = $leadSql." ORDER BY id DESC";
                
                if(!is_null($limit)){
                    $leadSql = $leadSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($leadSql);
                foreach ($result as $leadId) {
                    $leadInfo = $this->getLead($leadId);
                    array_push($arrLeads, $leadInfo);
                }
                return $arrLeads;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
    
    /*
     * count leads....
     * @return : Array of Leads Entities...
     */

    public function searchCount() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("Lead Entity not intialized");
            } else {
                $arrWhere = array();
                $total_number = 0;
                $leadEmail = $this->lead->getEmail();
                $leadSql = "SELECT count(id) as tot FROM tbl_leads ";
                
                if ($leadEmail) {
                    array_push($arrWhere, "email = '" . $leadEmail . "'");
                }


                if (count($arrWhere) > 0) {
                    $leadSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($leadSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
}
