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
class Base_Model_Lib_Invoice_Dao_Invoice extends Zend_Db_Table {

    protected $_name = 'tbl_invoices'; // the table name
    protected $_primary = 'id'; // the primary key
    public $invoice;

    /*
     * @name        : getItem
     * @Description : The function is to get a Invoice information
     * 				  from the database.
     * @param       : $id (Invoice Id)
     * @return      : Entity Invoice Object (Base_Model_Lib_Invoice_Entity_Invoice)
     */

    public function getItem($invoiceId) {
        $objInvoice = new Base_Model_Lib_Invoice_Entity_Invoice ( );
        $objCustomerService  = new Base_Model_Lib_Client_Service_Client();
        $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();

        try {
            if ($invoiceId) {
                $id = (int) $invoiceId;
                $row = $this->fetchRow('id = ' . $id);

                if ($row != "") {
                    $result = $row->toArray();
                    $objInvoice->setId($row['id']);
                    $objInvoice->setClient($objCustomerService->getClient($row['tbl_client_id']));
                    $objInvoice->setInvoiceNum($row['invoicenum']);
                    $objInvoice->setDate($row['date']);
                    $objInvoice->setDueDate($row['duedate']);
                    $objInvoice->setDatePaid($row['datepaid']);
                    $objInvoice->setSubTotal($row['subtotal']);
                    $objInvoice->setCredit($row['credit']);
                    $objInvoice->setTax($row['tax']);
                    $objInvoice->setTax2($row['tax2']);
                    $objInvoice->setTotal($row['total']);
                    $objInvoice->setTaxrate($row['taxrate']);
                    $objInvoice->setTaxrate2($row['taxrate2']);
                    $objInvoice->setStatus($row['status']);
                    $objInvoice->setPaymentmethod($objPaymentMethodService->getItem($row['paymentmethod']));
                    $objInvoice->setNotes($row['notes']);
                }
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_Invoice</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objInvoice;
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

            $select = $this->select()->from('tbl_invoices', array('id'));

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

    public function addInvoice() {
        $last_inserted_id = 0;

        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $data = array(
                'tbl_client_id' => $this->invoice->getClient(),
                'invoicenum' => $this->invoice->getInvoiceNum(),
                'date' => $this->invoice->getDate(),
                'duedate' => $this->invoice->getDueDate(),
                'datepaid' => $this->invoice->getDatePaid(),
                'subtotal' => $this->invoice->getSubTotal(),
                'credit' => $this->invoice->getCredit(),
                'tax' => $this->invoice->getTax(),
                'tax2' => $this->invoice->getTax2(),
                'total' => $this->invoice->getTotal(),
                'taxrate' => $this->invoice->getTaxrate(),
                'taxrate2' => $this->invoice->getTaxrate2(),
                'status' => $this->invoice->getStatus(),
                'paymentmethod' => $this->invoice->getPaymentmethod(),
                'notes' => $this->invoice->getNotes()
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

    public function updateInvoice() {
        $success = false;

        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $data = array(
                'tbl_client_id' => $this->invoice->getClient(),
                'invoicenum' => $this->invoice->getInvoiceNum(),
                'date' => $this->invoice->getDate(),
                'duedate' => $this->invoice->getDueDate(),
                'datepaid' => $this->invoice->getDatePaid(),
                'subtotal' => $this->invoice->getSubTotal(),
                'credit' => $this->invoice->getCredit(),
                'tax' => $this->invoice->getTax(),
                'tax2' => $this->invoice->getTax2(),
                'total' => $this->invoice->getTotal(),
                'taxrate' => $this->invoice->getTaxrate(),
                'taxrate2' => $this->invoice->getTaxrate2(),
                'status' => $this->invoice->getStatus(),
                'paymentmethod' => $this->invoice->getPaymentmethod(),
                'notes' => $this->invoice->getNotes()
            );

            $this->update($data, 'id = ' . (int) $this->invoice->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_Invoice</em>, <strong>Function -</strong> <em>addInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    /*
     * @name        : updateInvoice
     * @Description : The function is to add a invoice information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function deleteInvoice() {
        $success = false;

        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            if ($this->delete('id =' . (int) $this->invoice->getId()) == '1') {
                $success = true;
            }
            
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_Invoice</em>, <strong>Function -</strong> <em>addInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    /*
     * @name        : getAllByStatus($invoiceStatus)
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllByStatus($invoiceStatus) {
        $invoice = array();

        try {
            $objInvoice = new Base_Model_Lib_Invoice_Entity_Invoice ( );

            $select = $this->select()
                    ->from('tbl_invoices', array('id'))
                    ->where('status = ?',$invoiceStatus);

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
     * @name        : getAllByStatus($invoiceStatus)
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllPendingInvoicesToPay($dudate) {
        $invoice = array();

        try {
            $objInvoice = new Base_Model_Lib_Invoice_Entity_Invoice ( );

            $select = $this->select()
                    ->from('tbl_invoices', array('id'))
                    ->where('status = ?','Pending')
                    ->where('duedate <= ?',$dudate);

            //$sql = $select->__toString();
            //echo "$sql\n";
            //exit;
            
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
     * @name        : getAllByStatus($invoiceStatus)
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllMyPendingInvoices($clientId) {
        $invoice = array();

        try {
            $objInvoice = new Base_Model_Lib_Invoice_Entity_Invoice ( );

            $select = $this->select()
                    ->from('tbl_invoices', array('id'))
                    ->where('status = ?','Pending')
                    ->where('tbl_client_id = ?',$clientId);

            //$sql = $select->__toString();
            //echo "$sql\n";
            //exit;
            
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
     * @name        : updateInvoice
     * @Description : The function is to add a invoice information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateInvoiceStatus() {
        $success = false;

        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $data = array('status' => $this->invoice->getStatus(),
                'paymentmethod' => $this->invoice->getPaymentmethod(),
                'datepaid' => $this->invoice->getDatePaid());

            $this->update($data, 'id = ' . (int) $this->invoice->getId());
            $success = true;
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

    public function search($limit,$orderBy = null){
        // declare an array variable
	$arrInvoices = array();
	$arrWhere    = array();
	$sql		 = "";
        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Order_Exception(" Invoice Entity not intialized");
            
                 $invoiceNum        = $this->invoice->getInvoiceNum();
                 $clientId          = $this->invoice->getClient();
                 $invoiceStatus     = $this->invoice->getStatus();
                 $orderStartDate    = $this->invoice->getStartDate();
                 $orderEndDate      = $this->invoice->getEndDate();
                 
                 
                 $sql = "SELECT id FROM tbl_invoices ";
                 
                 if($invoiceNum !='')
			array_push($arrWhere,"id = '".$invoiceNum."'");
                 
                 if($clientId !='')
			array_push($arrWhere,"tbl_client_id = '".$clientId."'");
                 
                 if($invoiceStatus !='')
			array_push($arrWhere,"status = '".$invoiceStatus."'");
                 
                 
                  if($orderStartDate !='' && $orderEndDate != "")
			array_push($arrWhere,"duedate BETWEEN '".$orderStartDate."' AND '".$orderEndDate."'");
                  
            
                 if( count($arrWhere)> 0)
				$sql.=	"WHERE ".implode(' AND ',$arrWhere);
                 
                 
                 if($orderBy){
                   $sql.= 	' ORDER BY '.$orderBy;  
                 }

				// $limit
			$sql.= 	$limit;
			$db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
			$result = $db->fetchCol($sql);
			
			foreach ($result as $invoiceId) {
				$objInvoice  = $this->getItem($invoiceId);
				array_push($arrInvoices, $objInvoice);
			}
           

        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Domain</em>, <strong>Function -</strong> <em>loginDomain()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrInvoices;
    } 
    
    
    
      /*
	 * @name        : searchCount()
	 * @Description : The function is to search invoice information
	 * 				  from the database.
	 * @return      : Aray Of Entity Invoice Object (Base_Model_Lib_Invoice_Entity_Invoice)
	 */
    public function searchCount(){
        // declare an array variable
	$totalInvoices  = 0;
	$arrWhere    = array();
	$sql		 = "";
        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Order_Exception(" Invoice Entity not intialized");
            
                 $invoiceNum        = $this->invoice->getInvoiceNum();
                 $clientId          = $this->invoice->getClient();
                 $invoiceStatus     = $this->invoice->getStatus();
                 $orderStartDate    = $this->invoice->getStartDate();
                 $orderEndDate      = $this->invoice->getEndDate();
                 
                 
                 $sql = "SELECT count(id) as tot FROM tbl_invoices ";
                 
                 if($invoiceNum !='')
			array_push($arrWhere,"id = '".$invoiceNum."'");
                 
                 if($clientId !='')
			array_push($arrWhere,"tbl_client_id = '".$clientId."'");
                 
                 if($invoiceStatus !='')
			array_push($arrWhere,"status = '".$invoiceStatus."'");
                 
                 
                 if($orderStartDate !='' && $orderEndDate != "")
			array_push($arrWhere,"duedate BETWEEN '".$orderStartDate."' AND '".$orderEndDate."'");
                 
            
                 if( count($arrWhere)> 0)
				$sql.=	"WHERE ".implode(' AND ',$arrWhere);

				// $limit
			$db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
			$totalInvoices 	= $db->fetchOne($sql);
           

        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Domain</em>, <strong>Function -</strong> <em>loginDomain()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalInvoices;
    } 
    
    
    
    
    
    
}
?>