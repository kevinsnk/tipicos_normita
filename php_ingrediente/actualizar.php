<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["presentacion"]) &&isset($_POST["vencimiento"]) &&isset($_POST["marca"]) &&isset($_POST["cantidad"]) &&isset($_POST["unidad"])){
		if($_POST["nombre"]!=""&& $_POST["presentacion"]!=""&& $_POST["vencimiento"]!=""&& $_POST["marca"]!=""&& $_POST["cantidad"]!=""&& $_POST["unidad"]!=""){
			
			$sql = "update ingrediente set INGREDIENTE=\"$_POST[nombre]\",PRESENTACION=\"$_POST[presentacion]\",VENCIMIENTO=\"$_POST[vencimiento]\",MARCA=\"$_POST[marca]\", CANTIDAD=\"$_POST[cantidad]\", TIPO_UNIDAD=\"$_POST[unidad]\" where ID_INGREDIENTES=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>