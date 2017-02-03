<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: PromotionCode
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the PromotionCode Object
 *
 */
class Base_Model_Lib_Catelog_Service_PromotionCode extends Base_Model_Lib_Eav_Model_Service {

	public $promotionCode;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a PromotionCode information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Catelog_Entity_PromotionCode
	 */

	public function getItem($id) {
		$promotionCode = "";
		try {
			$objPromotionCode 		= new Base_Model_Lib_Catelog_Dao_PromotionCode ( );
			$promotionCode 			= $objPromotionCode->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_PromotionCode</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $promotionCode;
	}

	/*
	 * @name        : getAll()
	 * @Description : The function is to get All PromotionCode information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_PromotionCode
	 */

	public function getAll() {
		$promotionCode = "";
		try {
			$objPromotionCode 	= new Base_Model_Lib_Catelog_Dao_PromotionCode();
			$promotionCode 		= $objPromotionCode->getAll();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_PromotionCode</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $promotionCode;
	}
	
}
?>