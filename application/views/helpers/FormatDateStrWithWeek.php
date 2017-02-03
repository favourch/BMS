<?php
class Zend_View_Helper_FormatDateStrWithWeek
{
	public function formatDateStrWithWeek($value)
	{
		return date("l F jS, Y",strtotime($value));
	}
}