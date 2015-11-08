<?php
require_once(__DIR__ . '/../config/cmhl.rc.php');
$env = new \SparkLib\Application\Environment\HTTP;
$cmhl = new CMHL($env);
