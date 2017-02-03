<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Service
 * @name 			: Pricing
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com)
 *
 * Description : The Service class for the Pricing Object
 *
 */
class Base_Model_Lib_Product_Service_Pricing extends Base_Model_Lib_Eav_Model_Service {

	public $pricing;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a Pricing information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Product_Entity_Pricing
	 */

	public function getItem($id) {
		$pricing = "";
		try {
			$objPricing 		= new Base_Model_Lib_Product_Dao_Pricing ( );
			$pricing 			= $objPricing->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $pricing;
	}

	/*
	 * @name        : addItem
	 * @Description : The function is to add a Pricing information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	public function addItem() {
		$last_inserted_id = 0;
		try {

			if (! ($this->pricing instanceof Base_Model_Lib_Product_Entity_Pricing))
			throw new Base_Model_Lib_Product_Exception ( " Pricing Entity not intialized" );

			$objPricingDao 				= new Base_Model_Lib_Product_Dao_Pricing( );
			$objPricingDao->pricing 	= $this->pricing;
			$last_inserted_id			= $objPricingDao->addItem();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Pricing</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $last_inserted_id;
	}

	/*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a Pricing information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateItem() {
		$success = false;
		try {

			if (! ($this->pricing instanceof Base_Model_Lib_Product_Entity_Pricing))
			throw new Base_Model_Lib_Product_Exception ( " Pricing Entity not intialized" );

			$objPricingDao 				= new Base_Model_Lib_Product_Dao_Pricing( );
			$objPricingDao->pricing 	= $this->pricing;
			$success 					= $objPricingDao->updateItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Pricing</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : deleteItem()
	 * @Description : The function is to update/edit a Pricing information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function deleteItem() {
		$success = false;
		try {

			if (! ($this->pricing instanceof Base_Model_Lib_Product_Entity_Pricing))
			throw new Base_Model_Lib_Product_Exception ( " Pricing Entity not intialized" );

			$objPricingDao 				= new Base_Model_Lib_Product_Dao_Pricing( );
			$objPricingDao->pricing 	= $this->pricing;
			$success 				= $objPricingDao->deleteItem ();

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Catelog</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}

		return $success;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All Pricing information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Pricing
	 */

	public function getAll($productId) {
		$pricing = "";
		try {
			$objPricing 	= new Base_Model_Lib_Product_Dao_Pricing();
			$pricing 		= $objPricing->getAll($productId);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Pricing</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $pricing;
	}
	

        /*
	 * @name        : getAll()
	 * @Description : The function is to get All Pricing information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_Pricing
	 */

	public function getProductPriceByCurrency($productId,$currencyId,$productType) {
		$pricing = "";
		try {
			$objPricing 	= new Base_Model_Lib_Product_Dao_Pricing();
			$pricing 		= $objPricing->getProductPriceByCurrency($productId,$currencyId,$productType);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Product_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Service_Pricing</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $pricing;
	}

}
?>