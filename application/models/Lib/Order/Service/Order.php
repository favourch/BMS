<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Order.Service
 * @name 			: Order
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com)
 *
 * Description : The Service class for the Order Object
 *
 */
class Base_Model_Lib_Order_Service_Order extends Base_Model_Lib_Eav_Model_Service {

	public $order;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a Order information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Order_Entity_Order
	 */

	public function getOrder($id) {
		$order = "";
		try {
			$objOrder 		= new Base_Model_Lib_Order_Dao_Order ( );
			$order 			= $objOrder->getOrder( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $order;
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

			$objOrderDao 				= new Base_Model_Lib_Order_Dao_Order( );
			$objOrderDao->order 	= $this->order;
			$last_inserted_id			= $objOrderDao->addItem();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
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

			$objOrderDao 				= new Base_Model_Lib_Order_Dao_Order( );
			$objOrderDao->order 	= $this->order;
			$success 					= $objOrderDao->updateItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : deleteItem()
	 * @Description : The function is to update/edit a Order information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function deleteItem() {
		$success = false;
		try {

			if (! ($this->order instanceof Base_Model_Lib_Order_Entity_Order))
			throw new Base_Model_Lib_Order_Exception ( " Order Entity not intialized" );

			$objOrderDao 				= new Base_Model_Lib_Order_Dao_Order( );
			$objOrderDao->order 	= $this->order;
			$success 				= $objOrderDao->deleteItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Catelog</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All Order information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Order
	 */

	public function getAll($objectname) {
		$order = "";
		try {
			$objOrder 	= new Base_Model_Lib_Order_Dao_Order();
			$order 		= $objOrder->getAll($objectname);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $order;
	}
        
        
        /*
	 * @name        : search
	 * @Description : The function is to search orders information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Order_Entity_Order
	 */
	
	public function search($limit)
	{
		$orders = "";
		try {
			
						
			if(!($this->order instanceof Base_Model_Lib_Order_Entity_Order))
			throw new Base_Model_Lib_Order_Exception(" Order Entity not intialized");

			$objOrderDao = new Base_Model_Lib_Order_Dao_Order();
			$objOrderDao->order = $this->order;
			$orders = $objOrderDao->search($limit);
			
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $orders;
	}
        
        
        /*
	 * @name        : searchCount
	 * @Description : The function is to search students information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Student_Entity_Student
	 */
	
	public function searchCount()
	{
		$totalOrder = 0;
		try {
				
			if(!($this->order instanceof Base_Model_Lib_Order_Entity_Order))
			throw new Base_Model_Lib_Order_Exception(" Order Entity not intialized");

			$objOrderDao = new Base_Model_Lib_Order_Dao_Order();
			$objOrderDao->order = $this->order;
			$totalOrder = $objOrderDao->searchCount();
			
		} catch( Exception $e) {
			throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Student_Service_Student</em>, <strong>Function -</strong> <em>searchCount()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $totalOrder;
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

			$objOrderDao 				= new Base_Model_Lib_Order_Dao_Order( );
			$objOrderDao->order 	= $this->order;
			$success 					= $objOrderDao->updateItemInvoiceInfo();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}
        
        
        /*
	 * @name        : getAllByInvoiceId($invoiceId)
	 * @Description : The function is to get All Order information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Order
	 */

	public function getAllByInvoiceId($invoiceId) {
		$order = "";
		try {
			$objOrder 	= new Base_Model_Lib_Order_Dao_Order();
			$order 		= $objOrder->getAllByInvoiceId($invoiceId);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $order;
	}
        
        /*
	 * @name        : updateOrderStatus()
	 * @Description : The function is to update/edit a Order information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateOrderStatus() {
		$success = false;
		try {

			if (! ($this->order instanceof Base_Model_Lib_Order_Entity_Order))
			throw new Base_Model_Lib_Order_Exception ( " Order Entity not intialized" );

			$objOrderDao 		= new Base_Model_Lib_Order_Dao_Order( );
			$objOrderDao->order 	= $this->order;
			$success 		= $objOrderDao->updateOrderStatus();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Order_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

}
?>