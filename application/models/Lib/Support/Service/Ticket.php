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
class Base_Model_Lib_Support_Service_Ticket extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $ticket;

    /*
     * @name        : getClient
     * @Description : The function is to get a ticket information
     * 				  from the database.
     * @param       : $id (Client Id)
     * @return      : Base_Model_Lib_Client_Entity_Client
     */

    public function getTicket($id) {
        $ticket = "";
        try {
            $objTicket = new Base_Model_Lib_Support_Dao_Ticket();
            $ticket = $objTicket->getTicket($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>getClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $ticket;
    }

    /*
     * @name        : addTicket()
     * @Description : The function is to add a ticket information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addTicket() {
        $last_inserted_id = 0;
        try {

            if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

            $objTicketDao = new Base_Model_Lib_Support_Dao_Ticket();
            $objTicketDao->ticket = $this->ticket;
            $last_inserted_id = $objTicketDao->addTicket();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateTicket()
     * @Description : The function is to add a ticket information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateTicket() {
        $success = false;
        try {

            if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

            $objTicketDao = new Base_Model_Lib_Support_Dao_Ticket();
            $objTicketDao->ticket = $this->ticket;
            $success = $objTicketDao->updateTicket();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteTicket()
     * @Description : The function is to delete a ticket information
      from the database.
     * @return      : $success true/false
     */

    public function deleteTicket() {
        $success = false;
        try {

            if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

            $objTicketDao = new Base_Model_Lib_Support_Dao_Ticket();
            $objTicketDao->ticket = $this->ticket;
            $success = $objTicketDao->deleteTicket();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : search($limit)
     * @Description : The function is to delete a ticket information
      from the database.
     * @return      : $success true/false
     */

    public function search($limit) {
        $tickets = '';
        try {

            if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

            $objTicketDao = new Base_Model_Lib_Support_Dao_Ticket();
            $objTicketDao->ticket = $this->ticket;
            $tickets = $objTicketDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $tickets;
    }

    /*
     * @name        : search($limit)
     * @Description : The function is to delete a ticket information
      from the database.
     * @return      : $success true/false
     */

    public function searchCount() {
        $totalTickets = '';
        try {

            if (!($this->ticket instanceof Base_Model_Lib_Support_Entity_Ticket))
                throw new Base_Model_Lib_Ticket_Exception(" Ticket Entity not intialized");

            $objTicketDao = new Base_Model_Lib_Support_Dao_Ticket();
            $objTicketDao->ticket = $this->ticket;
            $totalTickets = $objTicketDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $totalTickets;
    }

}

?>