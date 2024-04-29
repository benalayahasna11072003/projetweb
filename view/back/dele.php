<?php
require_once('../../controller/service.php');

$rsvC = new servicec();
$i=null;
$i=$_GET['ids'];
$rsvC->deleteservice($i);
header('Location: data.php');
?>