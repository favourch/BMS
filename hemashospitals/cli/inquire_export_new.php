<?php
require_once 'cron_functions.php';

$objInquireService = new Base_Model_Lib_Inquire_Service_Inquire ( );


// Echo done
echo date('H:i:s') . " Done writing file.\r\n";
?>
