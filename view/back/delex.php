<?php
require_once('../../controller/excursionc.php');

$rsvC = new excursionc();
$i=null;
$i=$_GET['ide'];
$rsvC->deleteexcursion($i);
header('Location: dataex.php');
?>
