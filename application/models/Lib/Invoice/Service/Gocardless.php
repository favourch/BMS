<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Gocardless.Service
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
class Base_Model_Lib_Invoice_Service_Gocardless extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $gocardless;

    /*
     * @name        : getGocardless
     * @Description : The function is to get a gocardless information
     * 				  from the database.
     * @param       : $id (Gocardless Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Gocardless
     */

    public function getItem($id) {
        $gocardless = "";
        try {
            $objGocardless = new Base_Model_Lib_Invoice_Dao_Gocardless();
            $gocardless = $objGocardless->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Gocardless</em>, <strong>Function -</strong> <em>getGocardless()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $gocardless;
    }

    /*
     * @name        : addGocardless
     * @Description : The function is to add a gocardless information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addGocardless() {
        $last_inserted_id = 0;
        try {

            if (!($this->gocardless instanceof Base_Model_Lib_Invoice_Entity_Gocardless))
                throw new Base_Model_Lib_Invoice_Exception(" Gocardless Entity not intialized");

            $objGocardlessDao = new Base_Model_Lib_Invoice_Dao_Gocardless();
            $objGocardlessDao->gocardless = $this->gocardless;
            $last_inserted_id = $objGocardlessDao->addGocardless();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Gocardless</em>, <strong>Function -</strong> <em>addGocardless()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateGocardless
     * @Description : The function is to update/edit a gocardless information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateGocardless() {
        $success = false;
        try {

            if (!($this->gocardless instanceof Base_Model_Lib_Invoice_Entity_Gocardless))
                throw new Base_Model_Lib_Invoice_Exception(" Gocardless Entity not intialized");

            $objGocardlessDao = new Base_Model_Lib_Invoice_Dao_Gocardless();
            $objGocardlessDao->gocardless = $this->gocardless;
            $success = $objGocardlessDao->updateGocardless();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Gocardless</em>, <strong>Function -</strong> <em>updateGocardless()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteGocardless()
     * @Description : The function is to delete a gocardless information
      from the database.
     * @return      : $success true/false
     */

    public function deleteGocardless() {
        $success = false;
        try {

            if (!($this->gocardless instanceof Base_Model_Lib_Invoice_Entity_Gocardless))
                throw new Base_Model_Lib_Invoice_Exception(" Gocardless Entity not intialized");

            $objGocardlessDao = new Base_Model_Lib_Invoice_Dao_Gocardless();
            $objGocardlessDao->gocardless = $this->gocardless;
            $success = $objGocardlessDao->deleteGocardless();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Gocardless</em>, <strong>Function -</strong> <em>deleteGocardless()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : getAll()
     * @Description : The function is to get a gocardless information
     * 				  from the database.
     * @param       : $id (Gocardless Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Gocardless
     */

    public function getAll() {
        $gocardless = array();
        try {
            $objGocardless = new Base_Model_Lib_Invoice_Dao_Gocardless();
            $gocardless = $objGocardless->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Gocardless</em>, <strong>Function -</strong> <em>getGocardless()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $gocardless;
    }

}

?>