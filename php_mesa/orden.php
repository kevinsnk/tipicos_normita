<?php
include "../conexion/conexion.php";

if(!empty($_POST)){
	if(isset($_POST["item_id"])){
			
			
			$sql = "insert into ingrediente (MESA, PRODUCTO, COMBO, DESCRIPCION, TIPO_ORDEN, ESTADO_ORDEN, USUARIO) 
                                       value('1',\"$_POST[item_id]\", NULL, NULL, '1', '1','1')";
			$query = $con->query($sql);
			if($query!=null){
				
			}else{
				

			}
		}
	}
}



?>