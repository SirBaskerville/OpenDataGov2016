
<?php	
	if(!isset($estado))
	{
		
		//---------------------------------------------------------------------------------------------------------------------
		echo "<br/><div class='alert alert-success'>";
		echo '<h4>Total de '.$leyenda.': ';
		 foreach($cantidad_est->result_array() as $row)
	            {         
	                //echo $row['contador'];
	                echo "<button class='btn btn-success'>".$row['contador']."</button>";
	            }//fin de foreach de cantidad escuelas
		echo "</h4></div>";
		//----------------------------------------------
		echo form_open('inicio/establecimientos2');
		echo form_hidden('estado', 100);
		echo 'Departamentos (seleccionar para ver datos): ';
		echo '<select name="id_departamento">';
		
		foreach($lista_deptos->result_array() as $row)
	            {         
	                echo "<option value=". $row['obs'].">".$row['departamento']."</option>";
	            }//fin de foreach de listado deptos
		echo "</select>";
		
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo '<button type="submit" class="btn btn-info" name="seleccion_departamento" >Visualizar datos</button>';
		
		
		echo form_close();
		//---------------------------------------------------------------------------------------------------------------------
	}elseif ($estado ==100){
		//echo $estado;
		echo form_open('inicio/establecimientos3');
		echo form_hidden('estado', 200);
		
		echo "<br/><div class='alert alert-success'>";
		echo '<h4>Total de '.$leyenda.': ';
		 foreach($cantidad_est->result_array() as $row)
	            {         
	                //echo $row['contador'];
	                echo "<button class='btn btn-success'>".$row['contador']."</button>";
	            }//fin de foreach de cantidad escuelas
		echo "</h4></div>";		
		//--------------------------------------------
		//listar localidades
		echo "<br/><div class='alert alert-info'>";
		foreach($nombre_departamento->result_array() as $row)
	            {         
	                $departamentos = $row['departamento'];
	                echo form_hidden('departamento', $row['departamento']);
	            }//fin de foreach nombre departamento
	    //--------------------------------------------	            
		echo "<h3>Localidades/parajes de ".$departamentos."</h3></div>";			// baner interior de localidades de departamento
		echo "<div class='table‐responsive'>";				
		echo "<table class='table table-striped'><tbody>";							// tabla de columnas localidades / botones /
		//--------------------------------------------
		$i	= 1;
		foreach($listar_localidades->result_array() as $row)
	            {         
	                echo "<tr><td>".$i."</td><td>". $row['localidad']."</td><td><button type='submit' class='btn btn-default' name='seleccion_localidad' value='"									    .$row['localidad']."'>ver</button></td></tr>";
	                $i++;
	            }//fin de foreach de listado deptos
		echo "</tobody></table></div>";
		echo form_close();
		//---------------------------------------------------------------------------------------------------------------------
	}elseif ($estado == 200){
		//echo $estado;
		echo form_open('inicio/establecimientos4');
		echo form_hidden('estado', 300);
		echo form_hidden('departamento', $departamento);
		echo form_hidden('localidad', $localidad);
		
		echo "<br/><div class='alert alert-info'>";
		echo "<h4>Escuelas de la localidad de ".$localidad.", departamento de ".$departamento.":&nbsp;&nbsp;";
		foreach($cantidad_est->result_array() as $row)
	            {         
	                //echo $row['contador'];
	                echo "<button class='btn btn-success'>".$row['contador']."</button>";
	            }//fin de foreach de cantidad escuelas
	    echo "</h4></div>";
	    //--------------------------------------------
	   // echo "<h3>Localidades/parajes de ".$departamentos."</h3></div>";			// baner interior de escuelas en parajes
		echo "<div class='table_responsive'>";				
		echo "<table class='table table-condensed table-striped'><tbody>";							// tabla de columnas escuelas / botones /		
		echo "<tr class='success'><td> Registro</td><td>Codigo Unico Escolar</td><td>Establecimiento</td><td>Visualizar metricas</td></tr>";	    
	    //--------------------------------------------
	    foreach($escuelas_localidad->result_array() as $row)
	            {         
	                echo "<tr><td>".$row['id']."</td><td>".$row['Cue_Anexo']."</td><td>".$row['Nombre']."</td>";
	                echo "<td><button type='submit' class='btn btn-default' name='escuela' value='"
	                .$row['Nombre']."'>ver</button></td></tr>";
	            }//fin de foreach de nombres escuelas
	    
	    
		echo "</tobody></table></div>"; 
		echo form_close();
		//---------------------------------------------------------------------------------------------------------------------   
		}elseif($estado == 300)
		{
			echo form_open('inicio/alumnos');
			echo form_hidden('estado', 300);
			echo form_hidden('departamento', $departamento);
			echo form_hidden('localidad', $localidad);
			
			
			
			echo "<br/><div class='alert alert-info'>";
			echo "<h4>Escuelas de la localidad de ".$localidad.", departamento de ".$departamento."<br/>";
			echo $escuela."<h4></div>";
		//---------------------------deplegar datos de escuela
		echo "<div class='table_responsive'>";				
		echo "<table class='table table-condensed table-striped'><tbody>";							// tabla de columnas escuelas / botones /		
		    
	    //---------------------------------------------------------------
	   foreach($escuelas_localidad->result_array() as $row)
	            {         
	   echo "<tr><td><b><small>Id:</small></b> ".$row['id']."</td><td><b><small>Cue-anexo:</b></small> ".$row['Cue_Anexo']."</td><td colspan='3' rowspan='1'><b><small>Nombre:</b></small> ".$row['Nombre']."</tr><tr>";
	   echo "</td><td><b><small>Departamento:</b></small> ".$row['Departamento']."<td><b><small>Regimen:</b></small> ".$row['Regimen']."</td><td><b><small>Jurisdiccion:</b></small> ".$row['Jurisdiccion']."</td><td><b><small>Cod. zona:</b></small> ".$row['Obs']."</td><td><b><small>Localidad:</b></small> ".$row['Localidad']."</td></tr>";
	            }//fin de foreach de datos de la escuela	    
		echo "</tobody></table></div><hr/>";
		//---------------------------------------------------------------
		echo "<br/><div class='alert alert-info'>";
			echo "<h4>Cursos o divisiones de la ".$escuela.",<br/>de la localidad de ".$localidad."departamento de ".$departamento;
			echo "<h4></div>";
		//---------------------------deplegar datos de cursos y divisiones
		echo "<div class='table_responsive'>";				
		echo "<table class='table table-condensed table-striped'><tbody>";	
			
		//---------------------------------------------------------------
		foreach($cursos_divisiones->result_array() as $row)
	            {
					echo "<tr><td><b><small><span style='color: red;'>Id:</span></small></b> ".$row['id']."</td>
					<td><b><small>Cue-anexo:</b></small> ".$row['CUE-ANEXO']."</td>
					<td><b><small><span style='color: red;'>Curso/Division:</small></b></small>"					
					.$row['CursoDivisionID']."</td>
					<td><b><small>Curso:</b></small> ".$row['Curso']."</td></tr>";
	   echo "<tr><td><b><small>Division:</b></small> ".$row['Division']."</td>
	   <td><b><small>Nivel:</b></small> ".$row['NivelEnsenanza']."</td>
	   <td><b><small>Ciclo:</b></small> ".$row['Ciclo']."</td>
	   <td><b><small>Orientacion:</b></small> ".$row['Orientacion']."</td></tr>";
	   echo "<tr><td><b><small>Modalidad:</b></small> ".$row['Modalidad']."</td>
	   <td colspan='2' rowspan='1'><b><small>Obs:</b></small> ".$row['obs1']." ".$row['obs2']." ".$row['obs3']." ".$row['obs4']."</td>
	   <td><button type='submit' class='btn btn-info' name='escuela' value='".$row['CursoDivisionID']."'>ver curso</button></td></tr>";
	   	   		
				}//end foreach cursos y divisiones
				echo "</tobody></table></div><hr/>";
		if(!isset($row['Curso']))
		{
			
			echo "Sin registros en la base de datos";
		}		
		//------------------------------------------
		echo form_close();		
		}//fin de ciclo de formularios
	
?>
<br/><br/>