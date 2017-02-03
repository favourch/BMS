<?php
class Zend_View_Helper_FormatToDecimal
{
	public function formatToDecimal($value)
	{
		$output = $value;
		$value = trim($value);
		 
		if(is_numeric($value)) {

			if($value >= 0) {
				$output = number_format($value,2);
			}else{
				$output = '- '." ".number_format(abs($value),2);
			}
		}
		return $output;
	}
}