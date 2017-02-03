<?php

class Zend_View_Helper_Day {

	function day($date)
	{
		$myDate = $date;
		$day =  date('l', strtotime($myDate));
		return $day;
	}

}

?>