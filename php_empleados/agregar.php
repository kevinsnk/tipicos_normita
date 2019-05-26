<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["dui"]) &&isset($_POST["nit"]) &&isset($_POST["tel1"]) &&isset($_POST["tel2"]) &&isset($_POST["fechanac"]) &&isset($_POST["direccion"]) &&isset($_POST["estado"]) &&isset($_POST["cargo"]) &&isset($_POST["user"]) &&isset($_POST["contra"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&& $_POST["dui"]!=""&& $_POST["estado"]!=""&& $_POST["cargo"]!=""){
			
			
			$sql = "insert into empleados (NOMBRE, APELLIDO, DUI, NIT, TEL1, TEL2, FECHANAC, DIRECCION, ESTADO_EMPLEADO, CARGO, USUARIO, CONTRA) value (\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[dui]\",\"$_POST[nit]\",\"$_POST[tel1]\",\"$_POST[tel2]\",\"$_POST[fechanac]\",\"$_POST[direccion]\",\"$_POST[estado]\",\"$_POST[cargo]\",\"$_POST[user]\",\"$_POST[contra]\")";
			$query = $con->query($sql);
			if($query!=null){
				
			}else{
				

			}
		}
	}
}



?>