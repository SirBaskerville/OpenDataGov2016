<?php



		//---------------------------------------------------------------------------------------------------------------------------------------------
		echo "<br/><div class='alert alert-info'>";
		echo "<h4> Alumnos del Curso ".$curso." de la escuela ".$escuela." <br/>departamento de ".$departamento." localidad: ".$localidad."</h4></div>";
		//---------------------------------------------------------------------------------------------------------------------------------------------
		
		foreach($total->result_array() as $row)
	            {         
	                //echo $row['contador'];
	                $total_alumnos = $row['contador'];
	            }//fin de foreach de total alumnos
	    foreach($femeninos->result_array() as $row)
	            {         
	                //echo $row['contador'];
	                $total_femeninos = $row['contador'];
	            }//fin de foreach de total alumnos        
	    foreach($masculinos->result_array() as $row)
	            {         
	                //echo $row['contador'];
	                $total_masculinos = $row['contador'];
	            }//fin de foreach de total alumnos 
	    //-----------------------------------------------------------------------------------------------------               
	    echo "<div class='table_responsive'>";				
		echo "<table class='table table-condensed table-striped'><tbody>";
		echo "<tr><td>Total de alumnos</td><td>Femeninos</td><td>Masculinos</td></tr>";        
	    echo "<tr><td>".$total_alumnos."</td><td>".$total_femeninos."</td><td>".$total_masculinos."</td></tr>";
	    echo "</tbody></table></div>";
	    //-----------------------------------------------------------------------------------------------------
	    echo "<br/><div class='alert alert-info'>";
		echo "<h4> Listado de alumnos </h4></div>";
		//-----------------------------------------------------------------------------------------------------
	    echo "<div class='table_responsive'>";				
		echo "<table class='table table-condensed table-striped'><tbody>";
		echo "<tr><td>Registro</td><td>Division</td><td>Curso</td><td>Genero</td><td>Fecha Nacimiento</td></tr>";
		foreach($listado->result_array() as $row)
	        {      
	         echo "<tr><td>".$row['id']."</td><td>".$row['Division']."</td><td>".$row['codigo']
	         ."</td><td>".$row['Sexo']."</td><td>".$row['Fechanac']."</td></tr>";        
	         }//fin de foreach de total alumnos
	    echo "</tbody></table></div>";
	   
?>