<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Transaction.Service
 * @name 			: Transaction
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Transaction Object
 *
 */
class Base_Model_Lib_Invoice_Service_Transaction extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $transaction;

    /*
     * @name        : getTransaction
     * @Description : The function is to get a transaction information
     * 				  from the database.
     * @param       : $id (Transaction Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Transaction
     */

    public function getItem($id) {
        $transaction = "";
        try {
            $objTransaction = new Base_Model_Lib_Invoice_Dao_Transaction();
            $transaction = $objTransaction->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Transaction</em>, <strong>Function -</strong> <em>getTransaction()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $transaction;
    }

    /*
     * @name        : addTransaction
     * @Description : The function is to add a transaction information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addTransaction() {
        $last_inserted_id = 0;
        try {

            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

            $objTransactionDao = new Base_Model_Lib_Invoice_Dao_Transaction();
            $objTransactionDao->transaction = $this->transaction;
            $last_inserted_id = $objTransactionDao->addTransaction();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Transaction</em>, <strong>Function -</strong> <em>addTransaction()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateTransaction
     * @Description : The function is to update/edit a transaction information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateTransaction() {
        $success = false;
        try {

            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

            $objTransactionDao = new Base_Model_Lib_Invoice_Dao_Transaction();
            $objTransactionDao->transaction = $this->transaction;
            $success = $objTransactionDao->updateTransaction();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Transaction</em>, <strong>Function -</strong> <em>updateTransaction()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteTransaction()
     * @Description : The function is to delete a transaction information
      from the database.
     * @return      : $success true/false
     */

    public function deleteTransaction() {
        $success = false;
        try {

            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

            $objTransactionDao = new Base_Model_Lib_Invoice_Dao_Transaction();
            $objTransactionDao->transaction = $this->transaction;
            $success = $objTransactionDao->deleteTransaction();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Transaction</em>, <strong>Function -</strong> <em>deleteTransaction()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : getAll()
     * @Description : The function is to get a transaction information
     * 				  from the database.
     * @param       : $id (Transaction Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Transaction
     */

    public function search($limit) {
        $transaction = array();
        try {
            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

            $objTransactionDao = new Base_Model_Lib_Invoice_Dao_Transaction();
            $objTransactionDao->transaction = $this->transaction;
            $transaction = $objTransactionDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Transaction</em>, <strong>Function -</strong> <em>getTransaction()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $transaction;
    }

    /*
     * @name        : searchCount()
     * @Description : The function is to get a transaction information
     * 				  from the database.
     * @param       : $id (Transaction Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Transaction
     */

    public function searchCount() {
        $totalTransaction = 0;
        try {
            if (!($this->transaction instanceof Base_Model_Lib_Invoice_Entity_Transaction))
                throw new Base_Model_Lib_Invoice_Exception(" Transaction Entity not intialized");

            $objTransactionDao = new Base_Model_Lib_Invoice_Dao_Transaction();
            $objTransactionDao->transaction = $this->transaction;
            $totalTransaction = $objTransactionDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Transaction</em>, <strong>Function -</strong> <em>getTransaction()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalTransaction;
    }

}

?>