<?php
class Zend_View_Helper_FormatDate
{
	public function formatDate($value)
	{
		return date("D F j, Y, g:i a",strtotime($value));
	}
}