<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Dao
 * @name 			: Server
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Jasmin Media . (http://www.jasmin-media.com/)
 *
 * @Created on     	: 11-04-2010
 * @Modified on     : 11-04-2010
 *
 */
class Base_Model_Lib_System_Dao_Server extends Zend_Db_Table {

    protected $_name = 'tbl_servers'; // the table name
    protected $_primary = 'id'; // the primary key
    public $server;

    /*
     * @name        : getItem
     * @Description : The function is to get a Server information
     * 				  from the database.
     * @param       : $id (Server Id)
     * @return      : Entity Server Object (Base_Model_Lib_System_Entity_Server)
     */

    public function getItem($serverId) {
        $objServer = new Base_Model_Lib_System_Entity_Server ( );
        try {

            $id = (int) $serverId;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objServer->setId($row ['id']);
                $objServer->setAccesshash($row ['accesshash']);
                $objServer->setActive($row ['active']);
                $objServer->setAssignedips($row ['ipaddress']);
                $objServer->setDisabled($row ['disabled']);
                $objServer->setHostname($row ['hostname']);
                $objServer->setIpaddress($row ['ipaddress']);
                $objServer->setMaxaccounts($row ['maxaccounts']);
                $objServer->setMonthlycost($row ['monthlycost']);
                $objServer->setName($row ['name']);
                $objServer->setNameserver1($row ['nameserver1']);
                $objServer->setNameserver1ip($row ['nameserver1ip']);
                $objServer->setNameserver2($row ['nameserver2']);
                $objServer->setNameserver2ip($row ['nameserver2ip']);
                $objServer->setNameserver3($row ['nameserver3']);
                $objServer->setNameserver3ip($row ['nameserver3ip']);
                $objServer->setNameserver4($row ['nameserver4']);
                $objServer->setNameserver4ip($row ['nameserver4ip']);
                $objServer->setNameserver5($row ['nameserver5']);
                $objServer->setNameserver5ip($row ['nameserver5ip']);
                $objServer->setNoc($row ['noc']);
                $objServer->setPassword($row ['password']);
                $objServer->setSecure($row ['secure']);
                $objServer->setStatusaddress($row ['statusaddress']);
                $objServer->setType($row ['type']);
                $objServer->setUsername($row ['username']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $objServer;
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

            $data = array(
                'name' => $this->server->getName(),
                'ipaddress' => $this->server->getIpaddress(),
                'assignedips' => $this->server->getAssignedips(),
                'hostname' => $this->server->getHostname(),
                'monthlycost' => $this->server->getMonthlycost(),
                'noc' => $this->server->getNoc(),
                'statusaddress' => $this->server->getStatusaddress(),
                'nameserver1' => $this->server->getNameserver1(),
                'nameserver1ip' => $this->server->getNameserver1ip(),
                'nameserver2' => $this->server->getNameserver2(),
                'nameserver2ip' => $this->server->getNameserver2ip(),
                'nameserver3' => $this->server->getNameserver3(),
                'nameserver3ip' => $this->server->getNameserver3ip(),
                'nameserver4' => $this->server->getNameserver4(),
                'nameserver4ip' => $this->server->getNameserver4ip(),
                'nameserver5' => $this->server->getNameserver5(),
                'nameserver5ip' => $this->server->getNameserver5ip(),
                'maxaccounts' => $this->server->getMaxaccounts(),
                'type' => $this->server->getType(),
                'username' => $this->server->getUsername(),
                'password' => $this->server->getPassword(),
                'accesshash' => $this->server->getAccesshash(),
                'secure' => $this->server->getSecure(),
                'active' => $this->server->getActive(),
                'disabled' => $this->server->getDisabled()
            );

            $this->update($data, 'id = ' . (int) $this->server->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $success;
    }

    /*
     * @name        : getAllByType
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllByType($type) {
        $serverValues = array();
        try {
            $objServer = new Base_Model_Lib_System_Entity_Server();

            $select = $this->select()
                    ->from('tbl_servers', array('id'))
                    ->where('type = ?', $type);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objServer = $this->getItem($row->id);
                array_push($serverValues, $objServer);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $serverValues;
    }

    /*
     * @name        : addItem
     * @Description : The function is to add a Server information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;
        try {

            if (!($this->server instanceof Base_Model_Lib_System_Entity_Server))
                throw new Base_Model_Lib_System_Exception(" Server Entity not intialized");

            $data = array(
                'name' => $this->server->getName(),
                'ipaddress' => $this->server->getIpaddress(),
                'assignedips' => $this->server->getAssignedips(),
                'hostname' => $this->server->getHostname(),
                'monthlycost' => $this->server->getMonthlycost(),
                'noc' => $this->server->getNoc(),
                'statusaddress' => $this->server->getStatusaddress(),
                'nameserver1' => $this->server->getNameserver1(),
                'nameserver1ip' => $this->server->getNameserver1ip(),
                'nameserver2' => $this->server->getNameserver2(),
                'nameserver2ip' => $this->server->getNameserver2ip(),
                'nameserver3' => $this->server->getNameserver3(),
                'nameserver3ip' => $this->server->getNameserver3ip(),
                'nameserver4' => $this->server->getNameserver4(),
                'nameserver4ip' => $this->server->getNameserver4ip(),
                'nameserver5' => $this->server->getNameserver5(),
                'nameserver5ip' => $this->server->getNameserver5ip(),
                'maxaccounts' => $this->server->getMaxaccounts(),
                'type' => $this->server->getType(),
                'username' => $this->server->getUsername(),
                'password' => $this->server->getPassword(),
                'accesshash' => $this->server->getAccesshash(),
                'secure' => $this->server->getSecure(),
                'active' => $this->server->getActive(),
                'disabled' => $this->server->getDisabled()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : getAllByType
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $serverValues = array();
        try {
            $objServer = new Base_Model_Lib_System_Entity_Server();

            $select = $this->select()
                    ->from('tbl_servers', array('id'));


            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objServer = $this->getItem($row->id);
                array_push($serverValues, $objServer);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $serverValues;
    }

    /*
     * @name        : deleteItem
     * @Description : The function is to add a Server information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->server instanceof Base_Model_Lib_System_Entity_Server))
                throw new Base_Model_Lib_System_Exception(" Server Entity not intialized");

            if ($this->delete('id =' . (int) $this->server->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $success;
    }

}

?>