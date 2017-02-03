<?php

/**
 * Description of Potential
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Dao_Potential extends Zend_Db_Table_Abstract {

    //put your code here
    public $potential;
    protected $_name = 'tbl_potential';

    /*
     * Get a potential using id
     * @return      : Entity Potential Object (Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)
     */

    public function getPotential($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $potentialRow = $row->toArray();
                $potentialEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Potential();
                $potentialEntity->setId($potentialRow['id']);
                $potentialEntity->setPotentialNo($potentialRow['potential_no']);
                $potentialEntity->setRelatedTo($potentialRow['related_to']);
                $potentialEntity->setPotentialName($potentialRow['potentialname']);
                $potentialEntity->setAmount($potentialRow['amount']);
                $potentialEntity->setCurrency($potentialRow['currency']);
                $potentialEntity->setClosingdate($potentialRow['closingdate']);
                $potentialEntity->setTypeOfRevenue($potentialRow['typeofrevenue']);
                $potentialEntity->setNextStep($potentialRow['nextstep']);
                $potentialEntity->setIsPrivate($potentialRow['private']);
                $potentialEntity->setProbability($potentialRow['probability']);
                $potentialEntity->setCampaignId($potentialRow['campaignid']);
                $potentialEntity->setSalesStage($potentialRow['sales_stage']);
                $potentialEntity->setPotentialType($potentialRow['potentialtype']);
                $potentialEntity->setLeadSource($potentialRow['leadsource']);
                $potentialEntity->setProductId($potentialRow['productid']);
                $potentialEntity->setProductVersion($potentialRow['productversion']);
                $potentialEntity->setQuotationRef($potentialRow['quotationref']);
                $potentialEntity->setPartnerContact($potentialRow['partnercontact']);
                $potentialEntity->setRemarks($potentialRow['remarks']);
                $potentialEntity->setRuntimeFee($potentialRow['runtimefee']);
                $potentialEntity->setFollowupDate($potentialRow['followupdate']);
                $potentialEntity->setEvaluationStatus($potentialRow['evaluationstatus']);
                $potentialEntity->setDescription($potentialRow['description']);
                $potentialEntity->setForecastCategory($potentialRow['forecastcategory']);
                $potentialEntity->setOutComeanalysis($potentialRow['outcomeanalysis']);
                return $potentialEntity;
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

    public function addPotential() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Potential Entity not intialized");
            } else {
                $objPot = new Base_Model_ObtorLib_App_Core_Crm_Entity_Potential();
                $data = array(
                    'potential_no' => $objPot->getPotentialNo(),
                    'related_to' => $objPot->getRelatedTo(),
                    'potentialname' => $objPot->getPotentialName(),
                    'amount' => $objPot->getAmount(),
                    'closingdate' => $objPot->getClosingdate(),
                    'typeofrevenue' => $objPot->getTypeOfRevenue(),
                    'nextstep' => $objPot->getNextStep(),
                    'private' => $objPot->getIsPrivate(),
                    'probability' => $objPot->getProbability(),
                    'campaignid' => $objPot->getCampaignId(),
                    'sales_stage' => $objPot->getSalesStage(),
                    'potentialtype' => $objPot->getPotentialType(),
                    'leadsource' => $objPot->getLeadSource(),
                    'productid' => $objPot->getProductId(),
                    'productversion' => $objPot->getProductVersion(),
                    'quotationref' => $objPot->getQuotationRef(),
                    'partnercontact' => $objPot->getPartnerContact(),
                    'remarks' => $objPot->getRemarks(),
                    'runtimefee' => $objPot->getRuntimeFee(),
                    'followupdate' => $objPot->getFollowupDate(),
                    'evaluationstatus' => $objPot->getEvaluationStatus(),
                    'description' => $objPot->getDescription(),
                    'forecastcategory' => $objPot->getForecastCategory(),
                    'outcomeanalysis' => $objPot->getOutComeanalysis());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update potential
     * @return      : Boolean true/false
     */

    public function updatePotential() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Potential Entity not intialized");
            } else {
              $data = array(
                    'potential_no' => $objPot->getPotentialNo(),
                    'related_to' => $objPot->getRelatedTo(),
                    'potentialname' => $objPot->getPotentialName(),
                    'amount' => $objPot->getAmount(),
                    'closingdate' => $objPot->getClosingdate(),
                    'typeofrevenue' => $objPot->getTypeOfRevenue(),
                    'nextstep' => $objPot->getNextStep(),
                    'private' => $objPot->getIsPrivate(),
                    'probability' => $objPot->getProbability(),
                    'campaignid' => $objPot->getCampaignId(),
                    'sales_stage' => $objPot->getSalesStage(),
                    'potentialtype' => $objPot->getPotentialType(),
                    'leadsource' => $objPot->getLeadSource(),
                    'productid' => $objPot->getProductId(),
                    'productversion' => $objPot->getProductVersion(),
                    'quotationref' => $objPot->getQuotationRef(),
                    'partnercontact' => $objPot->getPartnerContact(),
                    'remarks' => $objPot->getRemarks(),
                    'runtimefee' => $objPot->getRuntimeFee(),
                    'followupdate' => $objPot->getFollowupDate(),
                    'evaluationstatus' => $objPot->getEvaluationStatus(),
                    'description' => $objPot->getDescription(),
                    'forecastcategory' => $objPot->getForecastCategory(),
                    'outcomeanalysis' => $objPot->getOutComeanalysis());
                return $this->update($data, 'id = ' . (int) $this->potential->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete potential
     * @return      : Integer ID / Null
     */

    public function deletePotential() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Potential Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->potential->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user potentials....
     * @return : Array of Potentials Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("Potential Entity not intialized");
            } else {
                $arrWhere = array();
                $arrPotentials = array();
                $potentialName = $this->potential->getPotentialName();
                $potentialSql = "SELECT id FROM tbl_potential ";
                
                if ($potentialName) {
                    array_push($arrWhere, "potentialname = '" . $potentialName . "'");
                }

                if (count($arrWhere) > 0) {
                    $potentialSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $potentialSql = $potentialSql." ORDER BY id DESC";
                
                if(!is_null($limit)){
                    $potentialSql = $potentialSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($potentialSql);
                foreach ($result as $potentialId) {
                    $potentialInfo = $this->getPotential($potentialId);
                    array_push($arrPotentials, $potentialInfo);
                }
                return $arrPotentials;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
    
    /*
     * count potentials....
     * @return : Array of Potentials Entities...
     */

    public function searchCount() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("Potential Entity not intialized");
            } else {
                $total_number = 0;
                $arrWhere = array();
                $potentialName = $this->potential->getPotentialName();
                $potentialSql = "SELECT id FROM tbl_potential ";
                
                if ($potentialName) {
                    array_push($arrWhere, "potentialname = '" . $potentialName . "'");
                }

                if (count($arrWhere) > 0) {
                    $potentialSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($potentialSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
}
