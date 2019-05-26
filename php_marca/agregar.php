<?php
include "../conexion/conexion.php";
if(!empty($_POST)){
	if(isset($_POST["nombre"])){
		if($_POST["nombre"]!=""){
			
			
			$sql = "insert into marca (MARCA) value (\"$_POST[nombre]\")";
			$query = $con->query($sql);
			if($query!=null){
				
			}else{
				

			}
		}
	}
}



?>