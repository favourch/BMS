<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Service
 * @name 			: Registrars
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Registrars Object
 *
 */
class Base_Model_Lib_System_Service_Registrars extends Base_Model_Lib_Eav_Model_Service {

    public $registrars;

    /*
     * @name        : getItem
     * @Description : The function is to get a Registrars information
     * 				  from the database.
     * @param       : $id (Member Id)
     * @return      : Base_Model_Lib_System_Entity_Registrars
     */

    public function getItem($id) {
        $registrars = "";
        try {
            $objRegistrars = new Base_Model_Lib_System_Dao_Registrars ( );
            $registrars = $objRegistrars->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $registrars;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Registrars information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItem() {
        $success = false;
        try {

            if (!($this->registrars instanceof Base_Model_Lib_System_Entity_Registrars))
                throw new Base_Model_Lib_System_Exception(" Registrars Entity not intialized");

            $objRegistrarsDao = new Base_Model_Lib_System_Dao_Registrars ( );
            $objRegistrarsDao->registrars = $this->registrars;
            $success = $objRegistrarsDao->updateItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $success;
    }

    
    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Registrars information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function addItem() {
        $last_inserted_id = '';
        try {

            if (!($this->registrars instanceof Base_Model_Lib_System_Entity_Registrars))
                throw new Base_Model_Lib_System_Exception(" Registrars Entity not intialized");

            $objRegistrarsDao = new Base_Model_Lib_System_Dao_Registrars ( );
            $objRegistrarsDao->registrars = $this->registrars;
            $last_inserted_id = $objRegistrarsDao->addItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Registrars information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function getAll() {
        $registrarsValues = "";
        try {
            $objRegistrarsDao = new Base_Model_Lib_System_Dao_Registrars ( );
            $registrarsValues = $objRegistrarsDao->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $registrarsValues;
    }
    
    
    
    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Registrars information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->registrars instanceof Base_Model_Lib_System_Entity_Registrars))
                throw new Base_Model_Lib_System_Exception(" Registrars Entity not intialized");

            $objRegistrarsDao = new Base_Model_Lib_System_Dao_Registrars ( );
            $objRegistrarsDao->registrars = $this->registrars;
            $success = $objRegistrarsDao->deleteItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $success;
    }
    
    
    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Registrars information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function getAllByStatus($status) {
        $registrarsValues = "";
        try {
            $objRegistrarsDao = new Base_Model_Lib_System_Dao_Registrars ( );
            $registrarsValues = $objRegistrarsDao->getAllByStatus($status);
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $registrarsValues;
    }


}

?>