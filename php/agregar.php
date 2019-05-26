<?php

if(!empty($_POST)){
	if(isset($_POST["Nombres"]) &&isset($_POST["Apellidos"]) &&isset($_POST["tipoEmp"]) &&isset($_POST["cargoEmp"]) &&isset($_POST["Salario"]) &&isset($_POST["Direccion"]) &&isset($_POST["Municipio"]) &&isset($_POST["Estado"])){
		
			include("conexion.php");
 
			
			$sql = "INSERT INTO tbl_empleados (NOMBRE_EMPLEADO, APELLIDO_EMPLEADO, TIPO_EMPLEADO, CARGO_EMPLEADO, SALARIO, DIRECCION_EMPLEADO, MUNICIPIO, ESTADO_EMPLEADO) values (\"$_POST['Nombres']\",\"$_POST['Apellidos']\",\"$_POST['tipoEmp']\",\"$_POST['cargoEmp']\",\"$_POST['salario']\",\"$_POST['Direccion']\",\"$_POST['Municipio']\",\"$_POST['Estado']\")";
			$query = $con->query($sql);
			if($query!=null){
				//print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				//print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
?>