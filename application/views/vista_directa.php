<?php
/////////////////////////////////////////////////////////////
// Terciario Superior de Informatica UOCRA subsede         //
// subsede El Sombrero | Grupo TICs INTA EEA Corrientes    //
// Profesor:                                               //
// Edwin Aguiar (analista de sistemas)                     //
//  Version 11 mayo de 2016  EEA CORRIENTES- INTA          //
//  aguiar.edwin@inta.gob.ar                               //
//  programado con herramientas libres:                    //
//  php, mysql, apache, css, js, jquery, bootstrap, html   //
/////////////////////////////////////////////////////////////
?>
		<br/><br/>
		<div class="panel panel-info">
		  <div class="panel-heading">Busqueda Directa &nbsp;&nbsp;<a href="#" id="ayuda2" class="btn btn-info btn-xs" >Ayuda</a></div>
		  <div class="panel-body">
		  <?php  
		    //------------------------------------------------------------------------------------------------------------------------
		    echo form_open('inicio/directa2');
		    echo form_input('nombre');
		    echo form_hidden('estado', 100);
		    //---------------------------------
		    echo form_submit('','Buscar');		    
		    echo form_close();
		    //------------------------------------------------------------------------------------------------------------------------
		    if(isset($estado))
		    {
				//echo "estado: ".$estado;					
				if($estado == 100)
				{	
					echo form_open('inicio/directa3');
					echo form_hidden('estado', 200);
					//--------------------------------------------
					foreach($total->result_array() as $row)
		            {         
		                //echo $row['contador'];
		                $total = $row['contador'];
		            }//fin de foreach de total alumnos
					//--------------------------------------------	            
					echo "<h3>Escuelas con nombre: ".$nombre."&nbsp;&nbsp;&nbsp;<span class='label label-success'>Total hallado: "
					.$total."</span></h3></div>";						echo "<div class='table-responsive'>";				
					echo "<table class='table table-striped'><tbody>";							// tabla de columnas localidades / botones /
					
					//--------------------------------------------
					foreach($escuelas->result_array() as $row)
						{
							echo "<tr><td>".$row['id']."</td><td> ".$row['Nombre']."</td><td>".$row['Cue_Anexo']
							."</td><td>".$row['Departamento']."</td><td>".$row['Localidad']
							."</td><td><button type='submit' class='btn btn-info' name='cue' value='".$row['Cue_Anexo']."'>ver escuela</button></td></tr> ";
						}
				//===============================================		
				}elseif($estado == 200)
				{
					echo form_open('inicio/alumnos');
					echo form_hidden('estado', 300);
					
					//--------------------------------------------
					echo "<h3>Escuela seleccionada</span></h3></div>";						
					echo "<div class='table-responsive'>";				
					echo "<table class='table table-striped'><tbody>";							// tabla de columnas localidades / botones /
					echo "<tr><td>Id</td><td>Nombre establecimiento</td><td>Cue</td><td>Regimen</td><td>Jurisdiccion</td><td>Latitud</td>
						  <td>Longitud</td><td>Departamento</td><td>Localidad</td></tr>";
					
					//--------------------------------------------
					foreach($escuela->result_array() as $row)
						{
							echo "<tr><td>".$row['id']."</td><td> ".$row['Nombre']."</td><td>".$row['Cue_Anexo']							
							."</td><td>".$row['Regimen']."</td><td>".$row['Jurisdiccion']."</td><td>".$row['Latitud']."</td><td>".$row['Longitud']
							."</td><td>".$row['Departamento']."</td><td>".$row['Localidad']
							."</td></tr> ";
							echo form_hidden('departamento', $row['Departamento']);
							echo form_hidden('localidad', $row['Localidad']);
							echo form_hidden('escuela', $row['Nombre']);	
							
						}
					echo "</tobody></table></div><hr/>";
					echo "<div class='table-responsive'>";				
					echo "<table class='table table-striped'><tbody>";	
					foreach($cursos->result_array() as $row)	
						{
							echo "<tr><td><b><small><span style='color: red;'>Id:</span></small></b> ".$row['id']."</td>
							<td><b><small>Cue-anexo:</b></small> ".$row['CUE-ANEXO']."</td>
							<td><b><small><span style='color: red;'>Curso/Division: </small></b>"					
							.$row['CursoDivisionID']."</td>
							<td><b><small>Curso:</b></small> ".$row['Curso']."</td></tr>";
						    echo "<tr><td><b><small>Division:</b></small> ".$row['Division']."</td>
						    <td><b><small>Nivel:</b></small> ".$row['NivelEnsenanza']."</td>
						    <td><b><small>Ciclo:</b></small> ".$row['Ciclo']."</td>
						    <td><b><small>Orientacion:</b></small> ".$row['Orientacion']."</td></tr>";
						    echo "<tr><td><b><small>Modalidad:</b></small> ".$row['Modalidad']."</td>
						    <td colspan='2' rowspan='1'><b><small>Obs:</b></small> ".$row['obs1']." ".$row['obs2']." ".$row['obs3']." ".$row['obs4']."</td>
						    <td><button type='submit' class='btn btn-info' name='curso_division' value='".$row['CursoDivisionID']
						    ."'>ver curso</button></td></tr>";
						}
					if(!isset($row['Curso']))
						{
							
							echo "<p class='text-center'>Sin registros de cursos o divisiones en la base de datos</span>";
						}	
					
											
				}				
				echo "</tbody></table>";
			}					    
		    //------------------------------------------------------------------------------------------------------------------------
		  ?>  
		  </div>
		</div>

		

