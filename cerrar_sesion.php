<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['usuario'];
if($varsession == null||$varsession=''){
echo 'Usted no tiene autorización';
die();
}
session_destroy();
header("Location:login.php");
?>