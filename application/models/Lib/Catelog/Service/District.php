<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: District
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the District Object
 *
 */
class Base_Model_Lib_Catelog_Service_District extends Base_Model_Lib_Eav_Model_Service {
	
	public $district;
	
	/*
	 * @name        : getItem
	 * @Description : The function is to get a District information
	 * 				  from the database.
	 * @param       : $id (Member Id)
	 * @return      : Base_Model_Lib_Catelog_Entity_District
	 */
	
	public function getItem($id) {
		$district = "";
		try {
			$objDistrict = new Base_Model_Lib_Catelog_Dao_District ( );
			$district = $objDistrict->getItem ( $id );
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_District</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $district;
	}
	
	/*
	 * @name        : addItem
	 * @Description : The function is to add a District information
	 * 				  to the database.
	 * @return      : Integer $last_inserted_id
	 */
	public function addItem() {
		$last_inserted_id = 0;
		try {
			
			if (! ($this->district instanceof Base_Model_Lib_Catelog_Entity_District))
				throw new Base_Model_Lib_Catelog_Exception ( " District Entity not intialized" );
			
			$objDistrictDao = new Base_Model_Lib_Catelog_Dao_District ( );
			$objDistrictDao->district = $this->district;
			$last_inserted_id = $objDistrictDao->addItem ();
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_District</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $last_inserted_id;
	}
	
	/*
	 * @name        : updateItem
	 * @Description : The function is to update/edit a District information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function updateItem() {
		$success = false;
		try {
			
			if (! ($this->district instanceof Base_Model_Lib_Catelog_Entity_District))
				throw new Base_Model_Lib_Catelog_Exception ( " District Entity not intialized" );
			
			$objDistrictDao = new Base_Model_Lib_Catelog_Dao_District ( );
			$objDistrictDao->district = $this->district;
			$success = $objDistrictDao->updateItem ();
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_District</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $success;
	}
	
	/*
	 * @name        : deleteItem()
	 * @Description : The function is to update/edit a District information
	 * 				  in the database.
	 * @return      : $success true/false
	 */
	public function deleteItem() {
		$success = false;
		try {
			
			if (! ($this->district instanceof Base_Model_Lib_Catelog_Entity_District))
				throw new Base_Model_Lib_Catelog_Exception ( " District Entity not intialized" );
			
			$objDistrictDao = new Base_Model_Lib_Catelog_Dao_District ( );
			$objDistrictDao->district = $this->district;
			$success = $objDistrictDao->deleteItem ();
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Catelog</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		
		return $success;
	}
	
	/*
	 * @name        : getAll()
	 * @Description : The function is to get All District information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_District
	 */
	
	public function getAll() {
		$district = "";
		try {
			$objDistrict = new Base_Model_Lib_Catelog_Dao_District ( );
			$district = $objDistrict->getAll ();
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_District</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $district;
	}
	
	
	/*
	 * @name        : getAllByCountry($countryId)
	 * @Description : The function is to get All District information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_District
	 */
	
	public function getAllByCountry($countryId) {
		$district = "";
		try {
			$objDistrict = new Base_Model_Lib_Catelog_Dao_District ( );
			$district = $objDistrict->getAllByCountry($countryId);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_District</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $district;
	}
	
	
	
/*
	 * @name        : getAllByCountry($countryId)
	 * @Description : The function is to get All District information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_District
	 */
	
	public function readAllByCountry($countryId) {
		$district = "";
		try {
			$objDistrict = new Base_Model_Lib_Catelog_Dao_District ( );
			$district = $objDistrict->readAllByCountry($countryId);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_District</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $district;
	}
	
	
/*
	 * @name        : getDistrictInquireSummary($fromData = null, $toDate = null)
	 * @Description : The function is to get All District information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_District
	 */
	
	public function getDistrictInquireSummary($fromData = null, $toDate = null,$inquireMedia = null,$inquireLocation = null) {
		$district = "";
		try {
			$objDistrict = new Base_Model_Lib_Catelog_Dao_District ( );
			$district = $objDistrict->getDistrictInquireSummary($fromData, $toDate,$inquireMedia,$inquireLocation);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_District</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $district;
	}
	
	
/*
	 * @name        : ajexReadAllByCountry
	 * @Description : The function is to get All District information
	 * 				  from the database.
	 * @return      : Array Of Base_Model_Lib_Member_Entity_District
	 */
	
	public function ajexReadAllByCountry($countryId) {
		$district = "";
		try {
			$objDistrict = new Base_Model_Lib_Catelog_Dao_District ( );
			$district = $objDistrict->ajexReadAllByCountry($countryId);
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Catelog_Exception ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_District</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $district;
	}

}
?>