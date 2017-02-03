<?php
/**
 * @name 		 Pagging
 * Description : The pagging class for the application
 *
 * @author     	Iyngaran Iyathurai
 * 				BluePie Developer.
 * 			  	Hemnette Web Solutions (Pvt) Ltd.
 * 			   	iyngaran55@yahoo.com
 *
 * @copyright  	Copyright (c) 2009 Hemnette Web Solutions (Pvt) Ltd, Sri Lanka.
 * 				(http://hemnettewebsolutions.com.au/)
 *
 * @created     20-10-2009
 * @modified    20-10-2009
 *
 */
class Base_Model_Lib_System_Commen_Pagging {

	public $totalRows;
	public $rowsPerPage;
	public $pageNum;

	public function __construct() {
	}

	public function calculate_pages() {

		$arr = array ();
		// calculate last page
		$last_page = ceil ( $this->totalRows / $this->rowsPerPage );
		// make sure we are within limits
		$this->pageNum = ( int ) $this->pageNum;
		if ($this->pageNum < 1) {
			$this->pageNum = 1;
		} elseif ($this->pageNum > $last_page) {
			$this->pageNum = $last_page;
		}
		$upto = ($this->pageNum - 1) * $this->rowsPerPage;
		$arr ['limit'] = 'LIMIT ' . $upto . ',' . $this->rowsPerPage;
		$arr ['current'] = $this->pageNum;
		if ($this->pageNum == 1)
		$arr ['previous'] = $this->pageNum;
		else
		$arr ['previous'] = $this->pageNum - 1;
		if ($this->pageNum == $last_page)
		$arr ['next'] = $last_page;
		else
		$arr ['next'] = $this->pageNum + 1;
		$arr ['last'] = $last_page;
		$arr ['info'] = 'Page (' . $this->pageNum . ' of ' . $last_page . ')';
		$arr ['pages'] = $this->get_surrounding_pages ( $this->pageNum, $last_page, $arr ['next'] );
		return $arr;
	}



	function get_surrounding_pages($page_num, $last_page, $next) {
		$arr = array ();
		$show = 5; // how many boxes
		// at first
		if ($page_num == 1) {
			// case of 1 page only
			if ($next == $page_num)
			return array (1 );
			for($i = 0; $i < $show; $i ++) {
				if ($i == $last_page)
				break;
				array_push ( $arr, $i + 1 );
			}
			return $arr;
		}
		// at last
		if ($page_num == $last_page) {
			$start = $last_page - $show;
			if ($start < 1)
			$start = 0;
			for($i = $start; $i < $last_page; $i ++) {
				array_push ( $arr, $i + 1 );
			}
			return $arr;
		}
		// at middle
		$start = $page_num - $show;
		if ($start < 1)
		$start = 0;
		for($i = $start; $i < $page_num; $i ++) {
			array_push ( $arr, $i + 1 );
		}
		for($i = ($page_num + 1); $i < ($page_num + $show); $i ++) {
			if ($i == ($last_page + 1))
			break;
			array_push ( $arr, $i );
		}
		return $arr;
	}

}
?>