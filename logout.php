<?php 
require('autoloader.php');
use App\Lib\Session;
$session = new Session;
$session->logout();
header("Location: index.php");
?>