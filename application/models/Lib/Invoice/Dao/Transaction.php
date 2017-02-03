<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Invoice.Dao
 * @name 			: Invoice
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
class Base_Model_Lib_Invoice_Dao_Transaction extends Zend_Db_Table {

    protected $_name = 'tbl_transaction'; // the table name
    protected $_primary = 'id'; // the primary key
    public $transaction;

    /*
     * @name        : getItem
     * @Description : The function is to get a Invoice information
     * 				  from the database.
     * @param       : $id (Invoice Id)
     * @return      : Entity Invoice Object (Base_Model_Lib_Invoice_Entity_Invoice)
     */

    public function getItem($transactionId) {
        $objTransaction = new Base_Model_Lib_Invoice_Entity_Transaction();
        $objClientService = new Base_Model_Lib_Client_Service_Client();
        $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
        try {
            if ($transactionId) {
                $id = (int) $transactionId;
                $row = $this->fetchRow('id = ' . $id);

                if ($row != "") {
                    $result = $row->toArray();
                    $objTransaction->setId($row['id']);
                    $objTransaction->setAmountIn($row['amountin']);
                    $objTransaction->setAmountOut($row['amountout']);
                    $objTransaction->setCurrency($row['currency']);
                    $objTransaction->setDate($row['date']);
                    $objTransaction->setDescription($row['description']);
                    $objTransaction->setFees($row['amountin']);
                    $objTransaction->setGateway($objPaymentMethodService->getItem($row['gateway']));
                    $objTransaction->setInvoiceId($row['tbl_invoice_id']);
                    $objTransaction->setRate($row['rate']);
                    $objTransaction->setRefundId($row['refundid']);
                    $objTransaction->setTransId($row['transid']);
                    $objTransaction->setClient($objClientService->getClient($row['tbl_client_id']));
                }
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_Invoice</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objTransaction;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $invoice = array();

        try {
            $objInvoice = new Base_Model_Lib_Invoice_Entity_Invoice ( );

            $select = $this->select()->from('tbl_transaction', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objInvoice = $this->getItem($row->id);
                array_push($invoice, $objInvoice);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoice;
    }

    /*
     * @name        : addInvoice
     * @Description : The function is to add a invoice information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addTransaction() {
        $last_inserted_id = 0;

        try {

            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

            $data = array(
                'tbl_client_id' => $this->transaction->getClient(),
                'currency' => $this->transaction->getCurrency(),
                'gateway' => $this->transaction->getGateway(),
                'date' => $this->transaction->getDate(),
                'description' => $this->transaction->getDescription(),
                'amountin' => $this->transaction->getAmountIn(),
                'fees' => $this->transaction->getFees(),
                'amountout' => $this->transaction->getAmountOut(),
                'rate' => $this->transaction->getRate(),
                'transid' => $this->transaction->getTransId(),
                'tbl_invoice_id' => $this->transaction->getInvoiceId(),
                'refundid' => $this->transaction->getRefundId()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_Invoice</em>, <strong>Function -</strong> <em>addInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateInvoice
     * @Description : The function is to add a invoice information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateTransaction() {
        $success = false;

        try {

            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

            $data = array(
                'tbl_client_id' => $this->transaction->getClient(),
                'gateway' => $this->transaction->getGateway(),
                'date' => $this->transaction->getDate(),
                'description' => $this->transaction->getDescription(),
                'amountin' => $this->transaction->getAmountIn(),
                'fees' => $this->transaction->getFees(),
                'amountout' => $this->transaction->getAmountOut(),
                'transid' => $this->transaction->getTransId(),
                'tbl_invoice_id' => $this->transaction->getInvoiceId()
            );
            $this->update($data, 'id = ' . (int) $this->transaction->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_Invoice</em>, <strong>Function -</strong> <em>addInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : updateInvoice
     * @Description : The function is to add a transaction information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function deleteTransaction() {
        $success = false;

        try {

            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

            if ($this->delete('id =' . (int) $this->transaction->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_Invoice</em>, <strong>Function -</strong> <em>addInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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
        $arrTransactions = array();
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");


            $invoiceNum = $this->transaction->getInvoiceId();
            $clientId   = $this->transaction->getClient();
            $transactionStartDate    = $this->transaction->getStartDate();
            $transactionEndDate      = $this->transaction->getEndDate();
            
            
            $sql = "SELECT id FROM tbl_transaction ";

            if($invoiceNum !='')
			array_push($arrWhere,"tbl_invoice_id = '".$invoiceNum."'");
            
            if($clientId !='')
			array_push($arrWhere,"tbl_client_id = '".$clientId."'");
            
            
            if($transactionStartDate !='' && $transactionEndDate != "")
			array_push($arrWhere,"date BETWEEN '".$transactionStartDate."' AND '".$transactionEndDate."'");
                  


            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);


            $sql.= ' ORDER BY date Desc';

            // $limit
            $sql.= $limit;
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $result = $db->fetchCol($sql);

            foreach ($result as $transactionId) {
                $objTransaction = $this->getItem($transactionId);
                array_push($arrTransactions, $objTransaction);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Domain</em>, <strong>Function -</strong> <em>loginDomain()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrTransactions;
    }

    /*
     * @name        : searchCount()
     * @Description : The function is to search invoice information
     * 				  from the database.
     * @return      : Aray Of Entity Invoice Object (Base_Model_Lib_Invoice_Entity_Invoice)
     */

    public function searchCount() {
        // declare an array variable
        $totalTransaction = 0;
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

                        $invoiceNum = $this->transaction->getInvoiceId();
                        
                        
                        
            $sql = "SELECT count(id) as tot FROM tbl_transaction ";
            
            if($invoiceNum !='')
			array_push($arrWhere,"tbl_invoice_id = '".$invoiceNum."'");
            
            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            // $limit
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $totalTransaction = $db->fetchOne($sql);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Domain</em>, <strong>Function -</strong> <em>loginDomain()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalTransaction;
    }

}

?>