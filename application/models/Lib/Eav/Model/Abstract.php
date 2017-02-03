<?php
/**
 * Abstract Entity class
 *
 * @package Bcas.Model.Lib
 * @access public
 * @author Iyngaran Iyathurai
 * 			Iyngaran55@yahoo.com
 * @date 2009-05-05
 */

class Base_Model_Lib_Eav_Model_Abstract
{

	/**
	 * Read connection
	 *
	 * @var Zend_Db_Adapter_Abstract
	 */
	protected $_read;

	/**
	 * Write connection
	 *
	 * @var Zend_Db_Adapter_Abstract
	 */
	protected $_write;



	/**
	 * Resource initialization
	 */
	protected function _construct()
	{

	}

	/**
	 * Set connections for entity operations
	 *
	 * @param Zend_Db_Adapter_Abstract $read
	 * @param Zend_Db_Adapter_Abstract $write
	 * @return Mage_Eav_Model_Entity_Abstract
	 */
	public function setConnection(Zend_Db_Adapter_Abstract $read, Zend_Db_Adapter_Abstract $write=null)
	{
		$this->_read = $read;
		$this->_write = $write ? $write : $read;
		return $this;
	}

	/**
	 * Retrieve connection for read data
	 *
	 * @return Zend_Db_Adapter_Abstract
	 */
	protected function _getReadAdapter()
	{
		$db 			= Zend_Registry::get('db');
		$this->_read 	= $db;
		return $this->_read;
	}

	/**
	 * Retrieve connection for write data
	 *
	 * @return Zend_Db_Adapter_Abstract
	 */
	protected function _getWriteAdapter()
	{
		$db 			= Zend_Registry::get('db');
		$this->_write 	= $db;
		return $this->_write;
	}

	/**
	 * Retrieve read DB connection
	 *
	 * @return Zend_Db_Adapter_Abstract
	 */
	public function getReadConnection()
	{
		return $this->_getReadAdapter();
	}

	/**
	 * Retrieve write DB connection
	 *
	 * @return Zend_Db_Adapter_Abstract
	 */
	public function getWriteConnection()
	{
		return $this->_getWriteAdapter();
	}
}
?>