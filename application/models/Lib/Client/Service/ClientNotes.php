<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Client.Service
 * @name 			: Client
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Client Object
 *
 */
class Base_Model_Lib_Client_Service_ClientNotes extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $clientNotes;

    /*
     * @name        : getClient
     * @Description : The function is to get a client information
     * 				  from the database.
     * @param       : $id (Client Id)
     * @return      : Base_Model_Lib_Client_Entity_Client
     */

    public function getClientNotes($id) {
        $client = "";
        try {
            $objClientNote = new Base_Model_Lib_Client_Dao_ClientNotes();
            $client = $objClientNote->getClientNotes($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $client;
    }

    /*
     * @name        : addClientNote
     * @Description : The function is to add a client information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addClientNote() {
        $last_inserted_id = 0;
        try {

            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            $objClientNotesDao = new Base_Model_Lib_Client_Dao_ClientNotes();
            $objClientNotesDao->clientNotes = $this->clientNotes;
            $last_inserted_id = $objClientNotesDao->addClientNote();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error </strong>" . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateClientNote
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateClientNote() {
        $success = false;
        try {

            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            $objClientNotesDao = new Base_Model_Lib_Client_Dao_ClientNotes();
            $objClientNotesDao->clientNotes = $this->clientNotes;
            $success = $objClientNotesDao->updateClientNote();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error </strong>" . $e->getMessage());
        }

        return $success;
    }

    /*
     * @name        : deleteClient()
     * @Description : The function is to delete a client information
      from the database.
     * @return      : $success true/false
     */

    public function deleteClientNote() {
        $success = false;
        try {

            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            $objClientNotesDao = new Base_Model_Lib_Client_Dao_ClientNotes();
            $objClientNotesDao->clientNotes = $this->clientNotes;
            $success = $objClientNotesDao->deleteClient();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error </strong>" . $e->getMessage());
        }

        return $success;
    }

    /*
     * @name        : search
     * @Description : The function is to search clients information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Client_Entity_Client
     */

    public function search($limit) {
        $clientNotes = "";
        try {


            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            $objClientNoteDao = new Base_Model_Lib_Client_Dao_ClientNotes();
            $objClientNoteDao->clientNotes = $this->clientNotes;
            $clientNotes = $objClientNoteDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $clientNotes;
    }

    /*
     * @name        : searchCount
     * @Description : The function is to search students information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Student_Entity_Student
     */

    public function searchCount() {
        $totalClientNote = 0;
        try {

            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNote Entity not intialized");

            $objClientNoteDao = new Base_Model_Lib_Client_Dao_ClientNotes();
            $objClientNoteDao->clientNotes = $this->clientNotes;
            $totalClientNote = $objClientNoteDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $totalClientNote;
    }

}
?>