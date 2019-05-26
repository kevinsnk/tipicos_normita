<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["dui"]) &&isset($_POST["nit"]) &&isset($_POST["tel1"]) &&isset($_POST["tel2"]) &&isset($_POST["fechanac"]) &&isset($_POST["direccion"]) &&isset($_POST["estado"]) &&isset($_POST["cargo"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&& $_POST["dui"]!=""&& $_POST["estado"]!=""&& $_POST["cargo"]!=""){
			
			$sql = "update empleados set NOMBRE=\"$_POST[nombre]\",APELLIDO=\"$_POST[apellido]\",DUI=\"$_POST[dui]\",NIT=\"$_POST[nit]\",TEL1=\"$_POST[tel1]\", TEL2=\"$_POST[tel2]\", FECHANAC=\"$_POST[fechanac]\", DIRECCION=\"$_POST[direccion]\", ESTADO_EMPLEADO=\"$_POST[estado]\" , CARGO=\"$_POST[cargo]\" where ID_EMPLEADO=".$_POST["id"];
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