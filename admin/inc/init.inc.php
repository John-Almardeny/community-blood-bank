<?php
require_once 'header.inc.php';
require_once 'db.inc.php';
require_once 'donor.inc.php';
require_once 'healthCheck.inc.php';
require_once 'bloodUnit.inc.php';
require_once 'bloodBank.inc.php';

$donor 		= new Donor($dbh);
$BloodUnit = new BloodUnit($dbh);
$healthCheck  = new HealthCheck($dbh);
?>