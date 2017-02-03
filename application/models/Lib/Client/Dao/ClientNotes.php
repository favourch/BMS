<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Client.Dao
 * @name 			: Client
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The object-oriented interface to bcas database table tbl_client
 *
 */
class Base_Model_Lib_Client_Dao_ClientNotes extends Zend_Db_Table {

    protected $_name = 'tbl_client_notes'; // the table name
    protected $_primary = 'id'; // the primary key
    // the client object
    public $clientNotes;

    // the methods goes from here......
    /*
     * @name        : ClientNotes
     * @Description : The function is to get a client note information
     * 				  from the database.
     * @param       : $id (Client Id)
     * @return      : Entity ClientNotes Object (Base_Model_Lib_Client_Entity_ClientNotes)
     */

    public function getClientNotes($id) {
        $objClientNotes = new Base_Model_Lib_Client_Entity_ClientNotes();
        $objClientService = new Base_Model_Lib_Client_Service_Client();
        $objUserService = new Base_Model_Lib_User_Service_User();
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objClientNotes->setId($result['id']);
                $objClientNotes->setClient($objClientService->getClient($result['userid']));
                $objClientNotes->setAdmin($objUserService->getUser($result['adminid']));
                $objClientNotes->setCreated($result['created']);
                $objClientNotes->setModified($result['modified']);
                $objClientNotes->setNotes($result['note']);
                $objClientNotes->setSticky($result['sticky']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $objClientNotes;
    }

    /*
     * @name        : addClient
     * @Description : The function is to add a client information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addClientNote() {
        $last_inserted_id = 0;
        try {
            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            $data = array(
                'userid' => $this->clientNotes->getClient(),
                'adminid' => $this->clientNotes->getAdmin(),
                'created' => $this->clientNotes->getCreated(),
                'modified' => $this->clientNotes->getModified(),
                'note' => $this->clientNotes->getNotes(),
                'sticky' => $this->clientNotes->getSticky()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error </strong>" . $e->getMessage());
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

            $data = array(
                'userid' => $this->clientNotes->getClient(),
                'adminid' => $this->clientNotes->getAdmin(),
                'created' => $this->clientNotes->getCreated(),
                'modified' => $this->clientNotes->getModified(),
                'note' => $this->clientNotes->getNotes(),
                'sticky' => $this->clientNotes->getSticky()
            );

            $this->update($data, 'id = ' . (int) $this->clientNotes->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $success;
    }

    /*
     * @name        : deleteClient
     * @Description : The function is to delete a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteClient() {
        $success = false;
        try {

            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            if ($this->delete('id =' . (int) $this->clientNotes->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $success;
    }

    /*
     * @name        : search
     * @Description : The function is to search clientNotes information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */

    public function search($limit) {
        // declare an array variable
        $arrClientNotes = array();
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            $clientId = $this->clientNotes->getClient();
            $adminId = $this->clientNotes->getAdmin();


            $sql = "SELECT id FROM tbl_client_notes ";

            if ($clientId != '')
                array_push($arrWhere, "userid = '" . $clientId . "'");


            if ($adminId != '')
                array_push($arrWhere, "adminid = '" . $adminId . "'");

            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            // $limit
            $sql.= $limit;
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $result = $db->fetchCol($sql);

            foreach ($result as $cid) {
                $objClientNote = $this->getClientNotes($cid);
                array_push($arrClientNotes, $objClientNote);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $arrClientNotes;
    }

    /*
     * @name        : search
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */

    public function searchCount() {
        // declare an array variable
        $totalClientNote = 0;
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            if (!($this->clientNotes instanceof Base_Model_Lib_Client_Entity_ClientNotes))
                throw new Base_Model_Lib_Client_Exception(" ClientNotes Entity not intialized");

            $clientId = $this->clientNotes->getClient();
            $adminId = $this->clientNotes->getAdmin();


            $sql = "SELECT count(id) as tot FROM tbl_client_notes ";

            if ($clientId != '')
                array_push($arrWhere, "userid = '" . $clientId . "'");


            if ($adminId != '')
                array_push($arrWhere, "adminid = '" . $adminId . "'");

            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);



            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $totalClientNote = $db->fetchOne($sql);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $totalClientNote;
    }
}
?>