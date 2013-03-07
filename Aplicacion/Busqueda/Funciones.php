<?php 
include("Conexion.php");
function Grid($db, $tabla, $especifico, $datoEspecifico)
	{
		if ($especifico=='')
			{
				db('northcompas',$link);
					$SQL="Select * from ".$tabla." where ".$especifico." like  '%".$datoEspecifico."%'";
						mysql_query();
		
			}
	
	}
	?>