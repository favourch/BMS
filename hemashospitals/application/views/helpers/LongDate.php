<?php
class Zend_View_Helper_LongDate
{
	public function longDate($value)
	{
		return date("M j Y G:i:s",strtotime($value));
	}
}