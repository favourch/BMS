<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Service
 * @name 			: Server
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Server Object
 *
 */
class Base_Model_Lib_System_Service_Server extends Base_Model_Lib_Eav_Model_Service {

    public $server;

    /*
     * @name        : getItem
     * @Description : The function is to get a Server information
     * 				  from the database.
     * @param       : $id (Member Id)
     * @return      : Base_Model_Lib_System_Entity_Server
     */

    public function getItem($id) {
        $server = "";
        try {
            $objServer = new Base_Model_Lib_System_Dao_Server ( );
            $server = $objServer->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $server;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Server information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItem() {
        $success = false;
        try {

            if (!($this->server instanceof Base_Model_Lib_System_Entity_Server))
                throw new Base_Model_Lib_System_Exception(" Server Entity not intialized");

            $objServerDao = new Base_Model_Lib_System_Dao_Server ( );
            $objServerDao->server = $this->server;
            $success = $objServerDao->updateItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $success;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Server information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function getAllByType($type) {
        $serverValues = "";
        try {
            $objServerDao = new Base_Model_Lib_System_Dao_Server ( );
            $serverValues = $objServerDao->getAllByType($type);
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $serverValues;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Server information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function addItem() {
        $last_inserted_id = '';
        try {

            if (!($this->server instanceof Base_Model_Lib_System_Entity_Server))
                throw new Base_Model_Lib_System_Exception(" Server Entity not intialized");

            $objServerDao = new Base_Model_Lib_System_Dao_Server ( );
            $objServerDao->server = $this->server;
            $last_inserted_id = $objServerDao->addItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Server information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function getAll() {
        $serverValues = "";
        try {
            $objServerDao = new Base_Model_Lib_System_Dao_Server ( );
            $serverValues = $objServerDao->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $serverValues;
    }
    
    
    
    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Server information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->server instanceof Base_Model_Lib_System_Entity_Server))
                throw new Base_Model_Lib_System_Exception(" Server Entity not intialized");

            $objServerDao = new Base_Model_Lib_System_Dao_Server ( );
            $objServerDao->server = $this->server;
            $success = $objServerDao->deleteItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $success;
    }


}

?>