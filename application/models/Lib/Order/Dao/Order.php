<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Order.Dao
 * @name 			: Order
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT Pvt Ltd. (http://www.pluspro.com/)
 *
 * @Created on     	: 28-11-2010
 * @Modified on     : 28-11-2010
 *
 */
class Base_Model_Lib_Order_Dao_Order extends Zend_Db_Table {
	protected $_name = 'tbl_orders'; // the table name
	protected $_primary = 'id'; // the primary key
	

	public $order;
	
	/*
	 * @name        : getItem
	 * @Description : The function is to get a Order information
	 * 				  from the database.
	 * @param       : $id (Order Id)
	 * @return      : Entity Order Object (Base_Model_Lib_Order_Entity_Order)
	 */
	public function getOrder($orderId) {
		$objOrder = new Base_Model_Lib_Order_Entity_Order ( );
                $objOrderProductService = new Base_Model_Lib_Order_Service_Product();
                 $objOrderDomainService = new Base_Model_Lib_Order_Service_Domain();
                 $objSalesPersonService = new Base_Model_Lib_User_Service_SalesPerson();
                 $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
                 $objInvoiceService    = new Base_Model_Lib_Invoice_Service_Invoice();
                 $objPromotionCodeService    = new Base_Model_Lib_Catelog_Service_PromotionCode();
		try {
			if($orderId){
				$id = ( int ) $orderId;
				$row = $this->fetchRow ( 'id = ' . $id );
				
				if ($row != "") {
					$result = $row->toArray ();
					$objOrder->setId ( $row ['id'] );
					$objOrder->setOrdernum($row ['ordernum']);
                                        $objOrder->setUserId($row ['tbl_user_id']);
                                        $objOrder->setContactId($row ['tbl_contact_id']);
                                        $objOrder->setDate($row ['date']);
                                        $objOrder->setNameservers($row ['nameservers']);
                                        $objOrder->setTransfersecret($row ['transfersecret']);
                                        $objOrder->setRenewals($row ['renewals']);
                                        $objOrder->setPromocode($objPromotionCodeService->getItem($row ['promocode']));
                                        $objOrder->setPromotype($row ['promotype']);
                                        $objOrder->setPromovalue($row ['promovalue']);
                                        $objOrder->setOrderdata($row ['orderdata']);
                                        $objOrder->setAmount($row ['amount']);
                                        $objOrder->setPaymentmethod($objPaymentMethodService->getItem($row ['paymentmethod']));
                                        $objOrder->setInvoiceid($objInvoiceService->getItem($row ['invoiceid']));
                                        $objOrder->setStatus($row ['status']);
                                        $objOrder->setIpaddress($row ['ipaddress']);
                                        $objOrder->setFraudmodule($row ['fraudmodule']);
                                        $objOrder->setFraudoutput($row ['fraudoutput']);
                                        $objOrder->setNotes($row ['notes']);
                                        $objOrder->setOrderProducts($objOrderProductService->getAllOrderProducts($row ['id']));
                                        $objOrder->setOrderdomain($objOrderDomainService->getAllOrderDomains($row ['id']));
                                        $objOrder->setSalesperson($objSalesPersonService->getSalesPerson($row['salesperson']));
                                        $objOrder->setCanvasser($objSalesPersonService->getSalesPerson($row['canvasser']));
				}
			}
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Order</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objOrder;
	}
	
	/*
	 * @name        : addItem
	 * @Description : The function is to add a Order information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	
	public function addItem() {
		$last_inserted_id = 0;
		
		try {
			
			if (! ($this->order instanceof Base_Model_Lib_Order_Entity_Order))
				throw new Base_Model_Lib_Order_Exception ( " Order Entity not intialized" );
			
			$data = array ('ordernum'  => $this->order->getOrdernum(),
                                       'tbl_user_id'  => $this->order->getUserId(),
                                       'tbl_contact_id'  => $this->order->getContactId(),
                                       'date'  => $this->order->getDate(),
                                       'nameservers'  => $this->order->getNameservers(),
                                       'transfersecret'  => $this->order->getTransfersecret(),
                                       'renewals'  => $this->order->getRenewals(),
                                       'promocode'  => $this->order->getPromocode(),
                                       'promotype'  => $this->order->getPromotype(),
                                       'promovalue'  => $this->order->getPromovalue(),
                                       'orderdata'  => $this->order->getOrderdata(),
                                       'amount'  => $this->order->getAmount(),
                                       'paymentmethod'  => $this->order->getPaymentmethod(),
                                       'invoiceid'  => $this->order->getInvoiceid(),
                                       'status'  => $this->order->getStatus(),
                                       'ipaddress'  => $this->order->getIpaddress(),
                                       'fraudmodule'  => $this->order->getFraudmodule(),
                                       'fraudoutput'  => $this->order->getFraudoutput(),
                                       'notes' 	=> $this->order->getNotes(),
                                       'canvasser'  => $this->order->getCanvasser(),
                                       'salesperson' 	=> $this->order->getSalesperson());
			
			$last_inserted_id = $this->insert ( $data );
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Order</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $last_inserted_id;
	}
	
	/*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Order information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateItem() {
		$success = false;
		try {
			
			if (! ($this->order instanceof Base_Model_Lib_Order_Entity_Order))
				throw new Base_Model_Lib_Order_Exception ( " Order Entity not intialized" );
			
			$data = array ('ordernum'  => $this->order->getOrdernum(),
                                       'tbl_user_id'  => $this->order->getUserId(),
                                       'tbl_contact_id'  => $this->order->getContactId(),
                                       'date'  => $this->order->getDate(),
                                       'nameservers'  => $this->order->getNameservers(),
                                       'transfersecret'  => $this->order->getTransfersecret(),
                                       'renewals'  => $this->order->getRenewals(),
                                       'promocode'  => $this->order->getPromocode(),
                                       'promotype'  => $this->order->getPromotype(),
                                       'promovalue'  => $this->order->getPromovalue(),
                                       'orderdata'  => $this->order->getOrderdata(),
                                       'amount'  => $this->order->getAmount(),
                                       'paymentmethod'  => $this->order->getPaymentmethod(),
                                       'invoiceid'  => $this->order->getInvoiceid(),
                                       'status'  => $this->order->getStatus(),
                                       'ipaddress'  => $this->order->getIpaddress(),
                                       'fraudmodule'  => $this->order->getFraudmodule(),
                                       'fraudoutput'  => $this->order->getFraudoutput(),
                                       'notes' 	=> $this->order->getNotes());
			
			$this->update ( $data, 'id = ' . ( int ) $this->order->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Order</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : deleteItem
	 * @Description : The function is to delete a Order information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function deleteItem() {
		$success = false;
		try {
			
			if (! ($this->order instanceof Base_Model_Lib_Order_Entity_Order))
				throw new Base_Model_Lib_Order_Exception ( " Order Entity not intialized" );
			
			if ($this->delete ( 'id =' . ( int ) $this->order->getId () ) == '1') {
				$success = true;
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Order</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
	
	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAll() {
		$order = array ();
		
		try {
			$objOrder = new Base_Model_Lib_Order_Entity_Order ( );
			
			$select = $this->select ()
						->from ('tbl_orders', array ('id' ));
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objOrder = $this->getOrder( $row->id );
				array_push ( $order, $objOrder );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $order;
	}
        
        
       /*
	 * @name        : search
	 * @Description : The function is to search Student information
	 * 				  from the database.
	 * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
	 */

    public function search($limit){
        // declare an array variable
	$arrOrders = array();
	$arrWhere    = array();
	$sql		 = "";
        try {

            if (!($this->order instanceof Base_Model_Lib_Order_Entity_Order))
                throw new Base_Model_Lib_Order_Exception(" Order Entity not intialized");
            
                 $clientId        = $this->order->getUserId();
                 $ipAddress       = $this->order->getIpaddress();
                 $orderStatus     = $this->order->getStatus();
                 $orderStartDate  = $this->order->getStartDate();
                 $orderEndDate    = $this->order->getEndDate();
                 
                 $sql = "SELECT id FROM tbl_orders ";
                 
                 if($clientId !='')
			array_push($arrWhere,"tbl_user_id = '".$clientId."'");
                 
                 if($ipAddress !='')
			array_push($arrWhere,"ipaddress = '".$ipAddress."'");
                 
                 if($orderStatus !='')
			array_push($arrWhere,"status = '".$orderStatus."'");
                 
                 if($orderStartDate !='' && $orderEndDate != "")
			array_push($arrWhere,"date BETWEEN '".$orderStartDate."' AND '".$orderEndDate."'");
                 
                 
            
                 if( count($arrWhere)> 0)
				$sql.=	"WHERE ".implode(' AND ',$arrWhere);

				// $limit
			$sql.= 	$limit;
			$db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
			$result = $db->fetchCol($sql);
			
			foreach ($result as $cid) {
				$objOrder  = $this->getOrder($cid);
				array_push($arrOrders, $objOrder);
			}
           

        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Order</em>, <strong>Function -</strong> <em>loginOrder()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrOrders;
    } 
    
    
    
    /*
	 * @name        : searchCount()
	 * @Description : The function is to search Student information
	 * 				  from the database.
	 * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
	 */

    public function searchCount(){
        // declare an array variable
	$totalOrders = 0;
	$arrWhere    = array();
	$sql		 = "";
        try {

            if (!($this->order instanceof Base_Model_Lib_Order_Entity_Order))
                throw new Base_Model_Lib_Order_Exception(" Order Entity not intialized");
            
                 $clientId        = $this->order->getUserId();
                 $ipAddress       = $this->order->getIpaddress();
                 $orderStatus     = $this->order->getStatus();
                 $orderStartDate  = $this->order->getStartDate();
                 $orderEndDate    = $this->order->getEndDate();
                 
                 $sql = "SELECT count(id) as tot FROM tbl_orders ";
                 
                 if($clientId !='')
			array_push($arrWhere,"tbl_user_id = '".$clientId."'");
                 
                 if($ipAddress !='')
			array_push($arrWhere,"ipaddress = '".$ipAddress."'");
                 
                 if($orderStatus !='')
			array_push($arrWhere,"status = '".$orderStatus."'");
                 
                 if($orderStartDate !='' && $orderEndDate != "")
			array_push($arrWhere,"date BETWEEN '".$orderStartDate."' AND '".$orderEndDate."'");
                 
                 
            
                 if( count($arrWhere)> 0)
				$sql.=	"WHERE ".implode(' AND ',$arrWhere);

                // print($sql);exit;
				// $limit
			$db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
		 $totalOrders 	= $db->fetchOne($sql);
           

        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Order</em>, <strong>Function -</strong> <em>loginOrder()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalOrders;
    } 

    
    
    /*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Order information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateItemInvoiceInfo() {
		$success = false;
		try {
			
			if (! ($this->order instanceof Base_Model_Lib_Order_Entity_Order))
				throw new Base_Model_Lib_Order_Exception ( " Order Entity not intialized" );
			
			$data = array ('amount'  => $this->order->getAmount(),
                                       'invoiceid'  => $this->order->getInvoiceid());
			
			$this->update ( $data, 'id = ' . ( int ) $this->order->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Order</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
        
        
        
        /*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function getAllByInvoiceId($invoiceId) {
		$objOrder = new Base_Model_Lib_Order_Entity_Order();
		try {
			$select = $this->select ()
				  ->from ('tbl_orders', array ('id' ))
                                  ->where('invoiceid = ?', $invoiceId);
			
			$result = $this->fetchAll ( $select );
			
			foreach ( $result as $row ) {
				$objOrder = $this->getOrder( $row->id );
			}
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objOrder;
	}
        
        /*
	 * @name        : updateOrderStatus()
	 * @Description : The function is to update/edit a Order Status
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	
	public function updateOrderStatus() {
		$success = false;
		try {
			
			if (! ($this->order instanceof Base_Model_Lib_Order_Entity_Order))
				throw new Base_Model_Lib_Order_Exception ( " Order Entity not intialized" );
			
			$data = array ('status'  => $this->order->getStatus());
			
			$this->update ( $data, 'id = ' . ( int ) $this->order->getId () );
			$success = true;
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Order</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $success;
	
	}
}
?>
