<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["sueldo"])){
		if($_POST["nombre"]!=""){
			
			
			$sql = "insert into cargo_empleado (NOMBRE_CARGO, SALARIO) value (\"$_POST[nombre]\", \"$_POST[sueldo]\")";
			$query = $con->query($sql);
			if($query!=null){
				
			}else{
				

			}
		}
	}
}



?>