
<script src="<?php echo base_url();?>js/jquery.js"></script>
<!-------------------------------------------------------------------------------------->
<script type="text/javascript">
		$(function () {
		    $('#ayuda').popover({
		        title: 'Ayuda en linea',
		        content: 'Para realizar una busqueda en esta opcion, primeramente debera seleccionar el boton de familia, luego en la proxima pantalla el genero y finalmente la especie. Para reiniciar la busqueda desde cero seleccione del menu superior la opcion BUSQUEDAS',
		        placement: 'rigth'
		    });
		});
</script> 
<!--- scripts -------------------------------------------------------------------------->
<script type="text/javascript">
		$(function () {
		    $('#ayuda2').popover({
		        title: 'Busqueda por banco de Germoplasma',
		        content: 'La busqueda esta orientada a los contenidos de accesiones de BANCO o COLECCION, descriptos en forma de FAMILIA, GENERO y ESPECIE, los cuales permiten ver la lista completa pulsando en el boton de cada ACCESION presentada. La lista puede ser muy extensa ya que se listan todos los especimenes descriptos por BANCO o COLECCION; para una busqueda mas acotada recurra a la busqueda por FAMILIA-GENERO-ESPECIE en la primer opcion de esta pagina.',
		        placement: 'rigth'
		    });
		});
</script>
<!--- scripts -------------------------------------------------------------------------->
<br/><br/>
<!-------------------------------------------------------------------------------------->
<div class="alert alert-success">
		<h2><img src="<?php echo base_url()?>/images/logo.jpeg" width="40px" hspace="10px" align="left"></img> Busquedas<h2>			
</div>

<div class="panel-group" id="accordion">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Busqueda por Familia - Genero - especie    
        </a>       
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
      <!--- tooltips ----------------------------------------------------------------->
     	<a href="#" id="ayuda" class="btn btn-info btn-xs" >Ayuda</a><br/><br/>
      <!--- formulario de envio jquery sin recargar ---------------------------------->
	  <div class="form-group">
	  <div class="table-responsive">
 		 <table class="table">
    		<tbody>
    			<tr>
    				<td>
		  <form method='POST' action='preaccesiones1'>
				 	
				<div class="form-group has-success">
  				<label class="control-label" for="seleccion_familia">Seleccionar una familia</label>
  				<?php
  				//---- busqueda por familia--------------------------------------------------------------
				
				echo '<table class="table table-striped"><tbody><tr>';
				$i=1;
		        foreach($taxonomia_maxima->result_array() as $row)
		            {         
		                echo '<td><button type="submit" class="btn btn-default" name="seleccion_familia" value="'.$row['familia'].'">'
		                .ucfirst(strtolower($row['familia'])).'</button></td>';
		                echo '&nbsp;&nbsp;'; 
		                if($i > 2)
		                	{	echo '</tr><tr>';
		                	    $i = 0;} 
		                $i++;	       
		            } 
		       //echo $i;
		       if($i = 2)
		       		echo '<td></td>';	//componer resto de celdas de tabla por definicion de estilo grafico
		       echo '</tr><td></td><td></td><td></td></tbody></table>';
	   //-------------------------------------------------------------------------------
  		?>  		
		  </form> </td></tr></tbody></table>
	  </div>	   
	  <!------------------------------------------------------------------------------->
      </div>
      </div>
    </div>
  </div>    
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        Busqueda por Banco
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
      <!--- formulario de busqueda por banco en varios pasos escalonados ------------->        
      <!--- tooltips ----------------------------------------------------------------->
     	<a href="#" id="ayuda2" class="btn btn-info btn-xs" >Ayuda</a><br/><br/>
      <!--- formulario de envio jquery sin recargar ---------------------------------->
      
      <div class="form-group">
	  <form method='POST' action='buscar_por_banco' >	
      <div class="form-group has-success">
  		<label class="control-label" for="seleccion_banco">Ingresar banco</label>	
      	<select class="form-control input-sm" id="seleccion_banco" name="seleccion_banco">
      		<option value=''>Seleccione un banco</option>
      		<div class="table-responsive">
 		 	<table class="table">
    		<tbody>
    			<tr>
    				<td>
      		
      <?php	$i=1;
      //----- SELECCION lista de BANCOS de la DB --------------------------------------
      		foreach ($lista_bancos->result_array() as $banco_red) 
					{
						echo '<option value="'.$banco_red['banco'].'">'.$i.' ) '.$banco_red['banco'].'</option>';
						$i++;										//contador de bancos
					}      		
      //-------------------------------------------------------------------------------
      ?>     		
      </select>
      </div>
      <button type="submit" class="btn btn-info btn-xs">Acceder</button>
	  <button type="reset" class="btn btn-primary btn-xs">Borrar antes de reconsultar</button>	        		
	  </form>     	
      <!-------------------------------------------------------------------------------> 
      </div>
    </div>
  </div>  
</div> 
<hr/>
<!------------------------------------------------------------------------------------->





