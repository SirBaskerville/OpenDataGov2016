
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
				echo "estado: ".$estado;					
				if($estado == 100)
				{	
					echo form_open('inicio/directa3');
					echo form_hidden('estado', 200);
					//--------------------------------------------	            
					echo "<h3>Escuelas con nombre: ".$nombre."</h3></div>";						// baner interior de localidades de departamento
					echo "<div class='table-responsive'>";				
					echo "<table class='table table-striped'><tbody>";							// tabla de columnas localidades / botones /
					
					//--------------------------------------------
					foreach($escuelas->result_array() as $row)
						{
							echo "<tr><td>".$row['id']."</td><td> ".$row['Nombre']."</td><td>".$row['Cue_Anexo']
							."</td><td>".$row['Departamento']."</td><td>".$row['Localidad']
							."</td><td><button type='submit' class='btn btn-info' name='cue' value='".$row['Cue_Anexo']."'>ver curso</button></td></tr> ";
						}
				}elseif($estado == 200)
				{
						
						
						
											
				}				
				echo "</tbody></table>";
			}					    
		    //------------------------------------------------------------------------------------------------------------------------
		  ?>  
		  </div>
		</div>

		

