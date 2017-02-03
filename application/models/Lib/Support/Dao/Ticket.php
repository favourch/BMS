<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Ticket.Dao
 * @name 			: Ticket
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The object-oriented interface to bcas database table tbl_client
 *
 */
class Base_Model_Lib_Support_Dao_Ticket extends Zend_Db_Table {

    protected $_name = 'tbl_support_ticket'; // the table name
    protected $_primary = 'id'; // the primary key
    // the client object
    public $ticket;

    // the methods goes from here......
    /*
     * @name        : getTicket
     * @Description : The function is to get a client information
     * 				  from the database.
     * @param       : $id (Ticket Id)
     * @return      : Entity Ticket Object (Base_Model_Lib_Ticket_Entity_Ticket)
     */

    public function getTicket($id) {
        $objTicket = new Base_Model_Lib_Support_Entity_Ticket();
        $objClientService = new Base_Model_Lib_Client_Service_Client();
        $objDepartmentService = new Base_Model_Lib_Catelog_Service_Department();
        $objStatusService = new Base_Model_Lib_Status_Service_Status();
        $objUserService = new Base_Model_Lib_User_Service_User();
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objTicket->setId($result['id']);
                $objTicket->setCcRecipients($result['cc_recipients']);
                $objTicket->setDepartment($objDepartmentService->getItem($result['department']));
                $objTicket->setDoSendEmail($result['do_send_email']);
                $objTicket->setPriority($result['priority']);
                $objTicket->setSubject($result['subject']);
                $objTicket->setTicketDescription($result['ticket_description']);
                $objTicket->setToEmail($result['to_email']);
                $objTicket->setToName($result['to_name']);
                $objTicket->setClient($objClientService->getClient($result['tbl_client_id']));
                $objTicket->setStatus($objStatusService->getStatus($result['status_is']));
                $objTicket->setAddedByObject($result['added_by_object']);
                if($result['added_by_object'] == 'Admin'){
                    $objTicket->setAddedBy($objUserService->getUser($result['added_by']));
                } elseif($result['added_by_object'] == 'Client'){
                    $objTicket->setAddedBy($objClientService->getClient($result['tbl_client_id']));
                }
                
                $objTicket->setAddedOn($result['added_on']);
                $objTicket->setLastReplyOn($result['last_reply_on']);
                
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Ticket_Dao_Ticket</em>, <strong>Function -</strong> <em>getTicket()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objTicket;
    }

    /*
     * @name        : addTicket
     * @Description : The function is to add a ticket information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addTicket() {
        $last_inserted_id = 0;
        try {

            if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

            $data = array(
                'to_name' => $this->ticket->getToName(),
                'to_email' => $this->ticket->getToEmail(),
                'do_send_email' => $this->ticket->getDoSendEmail(),
                'cc_recipients' => $this->ticket->getCcRecipients(),
                'department' => $this->ticket->getDepartment(),
                'subject' => $this->ticket->getSubject(),
                'priority' => $this->ticket->getPriority(),
                'ticket_description' => $this->ticket->getTicketDescription(),
                'added_by' => $this->ticket->getAddedBy(),
                'tbl_client_id' => $this->ticket->getClient(),
                'status_is' => $this->ticket->getStatus(),
                'added_by_object' => $this->ticket->getAddedByObject(),
                'added_on' => $this->ticket->getAddedOn(),
                'last_reply_on' => $this->ticket->getLastReplyOn()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Ticket_Dao_Ticket</em>, <strong>Function -</strong> <em>addTicket()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateTicket
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateTicket() {
        $success = false;
        try {

            if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

            $data = array(
                'to_name' => $this->ticket->getToName(),
                'to_email' => $this->ticket->getToEmail(),
                'do_send_email' => $this->ticket->getDoSendEmail(),
                'cc_recipients' => $this->ticket->getCcRecipients(),
                'department' => $this->ticket->getDepartment(),
                'subject' => $this->ticket->getSubject(),
                'priority' => $this->ticket->getPriority(),
                'ticket_description' => $this->ticket->getTicketDescription(),
                'added_by' => $this->ticket->getAddedBy(),
                'tbl_client_id' => $this->ticket->getClient(),
                'status_is' => $this->ticket->getStatus()
            );
            $this->update($data, 'id = ' . (int) $this->ticket->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Ticket_Dao_Ticket</em>, <strong>Function -</strong> <em>updateTicket()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteTicket
     * @Description : The function is to delete a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteTicket() {
        $success = false;
        try {

            if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

            if ($this->delete('id =' . (int) $this->ticket->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Ticket_Dao_Ticket</em>, <strong>Function -</strong> <em>deleteTicket()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    
    /*
     * @name        : search
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */
    public function search($limit) {
        // declare an array variable
        $arrTickets = array();
        $arrWhere = array();
        $sql = "";
        try {

           if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

                $status = $this->ticket->getStatus();
                $currentUserId = $this->ticket->getClient();

                $sql = "SELECT id FROM tbl_support_ticket ";



            if ($status != '')
                array_push($arrWhere, "status_is = '" . $status . "'");
            
            if ($currentUserId != '')
                array_push($arrWhere, "tbl_client_id = '" . $currentUserId . "'");
            

            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

                // $limit
                $sql.= $limit;
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($sql);

                foreach ($result as $cid) {
                    $objSupportTicket = $this->getTicket($cid);
                    array_push($arrTickets, $objSupportTicket);
                }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrTickets;
    }
    
    
    
    /*
     * @name        : searchCount()
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */
    public function searchCount() {
        // declare an array variable
        $totalTickets = 0;
        $arrWhere = array();
        $sql = "";
        try {

           if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

                $status = $this->ticket->getStatus();
                 $currentUserId = $this->ticket->getClient();

                $sql = "SELECT count(id) as tot FROM tbl_support_ticket ";



            if ($status != '')
                array_push($arrWhere, "status_is = '" . $status . "'");
            
            if ($currentUserId != '')
                array_push($arrWhere, "tbl_client_id = '" . $currentUserId . "'");

             if( count($arrWhere)> 0)
		$sql.=	"WHERE ".implode(' AND ',$arrWhere);

			
                 
                 $db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
		 $totalTickets 	= $db->fetchOne($sql);
                 
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalTickets;
    }

}
?>