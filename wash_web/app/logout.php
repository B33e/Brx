<?php
session_start();
require_once 'core/class.adm.php';
$logout =new adm();

if($logout->logged_in()!=""){
  $logout->logout();
  $logout->redirect('./');
  
}


?>