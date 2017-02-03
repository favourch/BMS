<?php

class Zend_View_Helper_Month {

	function Month($date)
	{
		$myDate = $date;
		$day =  date('l', strtotime($myDate));
		return $day;
	}

}

?>