<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Invoice.Dao
 * @name 			: Gocardless
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
class Base_Model_Lib_Invoice_Dao_Gocardless extends Zend_Db_Table {

    protected $_name = 'tbl_gocardless'; // the table name
    protected $_primary = 'id'; // the primary key
    public $gocardless;

    /*
     * @name        : getItem
     * @Description : The function is to get a Gocardless information
     * 				  from the database.
     * @param       : $id (Gocardless Id)
     * @return      : Entity Gocardless Object (Base_Model_Lib_Invoice_Entity_Gocardless)
     */

    public function getItem($gocardlessId) {
        $objGocardless = new Base_Model_Lib_Invoice_Entity_Gocardless ( );

        try {
            if ($gocardlessId) {
                $id = (int) $gocardlessId;
                $row = $this->fetchRow('id = ' . $id);

                if ($row != "") {
                    $result = $row->toArray();
                    $objGocardless->setId($row['id']);
                    $objGocardless->setInvoiceId($row['invoiceid']);
                    $objGocardless->setBillcreated($row['billcreated']);
                    $objGocardless->setResourceId($row['resource_id']);
                    $objGocardless->setSetupId($row['setup_id']);
                    $objGocardless->setPreauthId($row['preauth_id']);
                    $objGocardless->setPaymentFailed($row['payment_failed']);
                }
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_Gocardless</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objGocardless;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $gocardless = array();

        try {
            $objGocardless = new Base_Model_Lib_Invoice_Entity_Gocardless ( );

            $select = $this->select()->from('tbl_gocardless', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objGocardless = $this->getItem($row->id);
                array_push($gocardless, $objGocardless);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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

            if (!($this->gocardless instanceof Base_Model_Lib_Gocardless_Entity_Gocardless))
                throw new Base_Model_Lib_Gocardless_Exception(" Gocardless Entity not intialized");

            $data = array(
                'invoiceid' => $this->gocardless->getInvoiceId(),
                'billcreated' => $this->gocardless->getBillcreated(),
                'resource_id' => $this->gocardless->getResourceId(),
                'setup_id' => $this->gocardless->getSetupId(),
                'preauth_id' => $this->gocardless->getPreauthId(),
                'payment_failed' => $this->gocardless->getPaymentFailed()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Gocardless_Dao_Gocardless</em>, <strong>Function -</strong> <em>addGocardless()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateGocardless
     * @Description : The function is to add a gocardless information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateGocardless() {
        $success = false;

        try {

            if (!($this->gocardless instanceof Base_Model_Lib_Gocardless_Entity_Gocardless))
                throw new Base_Model_Lib_Gocardless_Exception(" Gocardless Entity not intialized");

            $data = array(
                'invoiceid' => $this->gocardless->getInvoiceId(),
                'billcreated' => $this->gocardless->getBillcreated(),
                'resource_id' => $this->gocardless->getResourceId(),
                'setup_id' => $this->gocardless->getSetupId(),
                'preauth_id' => $this->gocardless->getPreauthId(),
                'payment_failed' => $this->gocardless->getPaymentFailed()
            );

            $this->update($data, 'id = ' . (int) $this->gocardless->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Gocardless_Dao_Gocardless</em>, <strong>Function -</strong> <em>addGocardless()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : updateGocardless
     * @Description : The function is to add a gocardless information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function deleteGocardless() {
        $success = false;

        try {

            if (!($this->gocardless instanceof Base_Model_Lib_Gocardless_Entity_Gocardless))
                throw new Base_Model_Lib_Gocardless_Exception(" Gocardless Entity not intialized");

            if ($this->delete('id =' . (int) $this->gocardless->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Gocardless_Dao_Gocardless</em>, <strong>Function -</strong> <em>addGocardless()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

}

?>