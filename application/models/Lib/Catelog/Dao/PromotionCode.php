<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: PromotionCode
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
class Base_Model_Lib_Catelog_Dao_PromotionCode extends Zend_Db_Table {
	protected $_name = 'tbl_promotion_code'; // the table name
	protected $_primary = 'id'; // the primary key


	public $promotionCode;

	/*
	 * @name        : getItem
	 * @Description : The function is to get a PromotionCode information
	 * 				  from the database.
	 * @param       : $id (PromotionCode Id)
	 * @return      : Entity PromotionCode Object (Base_Model_Lib_Catelog_Entity_PromotionCode)
	 */
	public function getItem($promotionCodeId) {
		$objPromotionCode = new Base_Model_Lib_Catelog_Entity_PromotionCode ( );

		try {
			if($promotionCodeId){
				$id = ( int ) $promotionCodeId;
				$row = $this->fetchRow ( 'id = ' . $id );
	
				if ($row != "") {
					$result = $row->toArray ();
					$objPromotionCode->setId ($row ['id']);
					$objPromotionCode->setName($row ['name']);
                                        $objPromotionCode->setValueType($row ['value_type']);
                                        $objPromotionCode->setValue($row ['value']);
                                        $objPromotionCode->setActiveFrom($row ['active_from']);
                                        $objPromotionCode->setActiveTo($row ['active_to']);
                                        $objPromotionCode->setStatus($row ['status']);
				}
			}

		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_PromotionCode</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objPromotionCode;
	}


	/*
	 * @name        : getAll
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */

	public function getAll() {
		$promotionCode = array ();

		try {
			$objPromotionCode = new Base_Model_Lib_Catelog_Entity_PromotionCode ( );
				
			$select = $this->select ()->from ( 'tbl_promotion_code', array ('id' ) );
				
			$result = $this->fetchAll ( $select );
				
			foreach ( $result as $row ) {
				$objPromotionCode = $this->getItem ( $row->id );
				array_push ( $promotionCode, $objPromotionCode);
			}
			
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $promotionCode;
	}

}
?>
