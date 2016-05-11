<?
/////////////////////////////////////////////////////////////
//  SITE: sistema de informacion terminal externa, sistema //
//  de visualizacion de datos publicos REDGEN del INTA     //
//  Edwin Aguiar (analista de sistemas -referente de docu- //
//  mentacion de bancos de germoplasma) TICs CORRIENTES    //
//  Version 3 Febrero de 2016  EEA CORRIENTES- INTA        //
//  aguiar.edwin@inta.gob.ar                               //
//  programado con herramientas libres:                    //
//  php, mysql, apache, css, js, jquery, bootstrap, html   //
/////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html>
  <head>
     <title>OpenDataGOV Corrientes</title>
	 <!-- Bootstrap y estilos de CSS usuales-->
    
    
 <!----------------------------------------------------------------------------------------------------------------------------------------->   

   
	 <!-- Bootstrap y estilos de CSS usuales-->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet" media="screen">
 <!----------------------------------------------------------------------------------------------------------------------------------------->    
		<script src="<?php echo base_url();?>js/jquery.js"></script>
		<script type="text/javascript">
				$(function () {
				    $('#ayuda').popover({
				        title: 'Ayuda en linea',
				        content: 'BUSQUEDA SECUENCIAL partiendo del departamento, paraje y escuela para brindar informacion de cursos/divisiones, alumnado etc. BUSQUEDA DIRECTA es si ya conoce el nombre de la escuela',
				        placement: 'rigth'
				    });
				});
		</script> 
		<script type="text/javascript">
				$(function () {
				    $('#ayuda2').popover({
				        title: 'Ayuda BUSQUEDA DIRECTA',
				        content: 'Nombre de la escuela o instituto, desplegara una lista de seleccion por departamento y localidad.',
				        placement: 'rigth'
				    });
				});
		</script>    	
<!------------------------------------------------------------------------------------------------------------------------------------------> 	
	</head>
    <body>
    <div class="container">       
		<img src="<?php echo base_url()?>images/logo_opendatagov.PNG" align="left" hspace="5px" vspace="5px" align="middle" class="img-responsive">
		<!------------------------------->
		<div style="text-align: center;"><small> 
		<p class="text-primary">Aplicacion desarrollada en base al Hackathon OPENDATA GOV 2016 Corrientes</p>
		</small></div><hr/>
		<!------------------------------->
        <ul class="nav navbar-nav">
		  		  
					<li><a href="<?php echo site_url('inicio/index')?>" title="Inicio"><b>Inicio</b></a></li>
					<li><a href="<?php echo site_url('inicio/establecimientos')?>" title="Busqueda secuencial en pasos"><b>Busqueda Secuencial</b></a></li>
					<li><a href="<?php echo site_url('inicio/directa')?>" title="Busqueda directa"><b>Busqueda Directa</b></a></li>
					<!---li><a href="<?php echo site_url('inicio/contact')?>" title="Vias de comunicacion"><b>Contactos</b></a></li--->
		            <li><a href="http://mcyp.corrientes.gob.ar" title="Portal principal INTA"><b>Ministerio</b></a></li>
		                     
        </ul> 
        <a href="#" id="ayuda" class="btn btn-info btn-xm" >Ayuda</a><hr/>  
     <!--/container -------->    
     </div>   

	<div class="container">	
	<?php
	
   
   