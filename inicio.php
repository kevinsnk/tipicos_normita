<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['usuario'];
if($varsession == null||$varsession=''){
echo 'Usted no tiene autorización';
die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tipicos Normita</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
</head>
 <header>
    <?php include "header.php"; ?>
  </header>
<body>
	


</body>
</html>