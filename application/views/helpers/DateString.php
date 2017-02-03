<?php
class Zend_View_Helper_DateString
{
	public function dateString($value)
	{
		return date("F j, Y",strtotime($value));
	}
}