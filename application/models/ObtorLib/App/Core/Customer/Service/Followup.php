<?php

/**
 * Description of Followup
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Customer_Service_Followup extends Base_Model_ObtorLib_Eav_Model_Service {

    public $followup;

    /*
     * Get a user followup using id
     * @return      : Entity Followup Object (Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)
     */

    public function getFollowup($id) {
        try {
            $objFollowup = new Base_Model_ObtorLib_App_Core_Customer_Dao_Followup();
            $followup = $objFollowup->getFollowup($id);
            return $followup;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($e);
        }
    }

    /*
     * Add new user followup
     * @return      : Integer ID / Null
     */

    public function addFollowup() {
        try {
            if (!($this->followup instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Followup Entity not intialized");
            } else {
                $objFollowup = new Base_Model_ObtorLib_App_Core_Customer_Dao_Followup();
                $objFollowup->followup = $this->followup;
                return $objFollowup->addFollowup();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Update user followup
     * @return      : Integer ID / Null
     */

    public function updateFollowup() {
        try {
            if (!($this->followup instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Followup Entity not intialized");
            } else {
                $objFollowup = new Base_Model_ObtorLib_App_Core_Customer_Dao_Followup();
                $objFollowup->followup = $this->followup;
                return $objFollowup->updateFollowup();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Delete user followup
     * @return      : Integer ID / Null
     */

    public function deleteFollowup() {
        try {
            if (!($this->followup instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Followup Entity not intialized");
            } else {
                $objFollowup = new Base_Model_ObtorLib_App_Core_Customer_Dao_Followup();
                $objFollowup->followup = $this->followup;
                return $objFollowup->deleteFollowup();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Search user followups....
     * @return : Array of Followups Entities...
     */

    public function search() {
        try {
            if (!($this->followup instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Followup Entity not intialized");
            } else {
                $objFollowup = new Base_Model_ObtorLib_App_Core_Customer_Dao_Followup();
                $objFollowup->followup = $this->followup;
                return $objFollowup->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

}
