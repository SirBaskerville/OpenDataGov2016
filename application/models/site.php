<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
		class Site extends CI_Model  
		{
			
		function __construct()
		{
				parent::__construct();				
				
			}// fin constructor de clase
			
		//-----------------------------------------------------------------------------------------------------------------------------------
		//    DB: site                                                                    datos     tablas - fecha       uso    
		//    tabla: metadatos_fito       metadatos de bancos de la red fitogenetica         *        *  12/02/2016      *
		//    tabla: metadatos_zoo        metadatos de bancos zoogeneticos                   -        -                  -
		//	  tabla: metadatos_micro      metadatos de bancos microbianos                    -        -                  -
		//	  tabla: fitogeneticos        accesiones de bancos fitogeneticos                 *        *  17/02/2016      -
		//    tabla: zoogeneticos         registros de bancos zoogeneticos                   -        -                  -
		//    tabla: microbianos          registros de bancos microbianos                    -        -                  -
		//-----------------------------------------------------------------------------------------------------------------------------------
		//                                                       METADATOS
		//-----------------------------------------------------------------------------------------------------------------------------------
		function metadatos($banco)
		{
			//echo $banco;
			$query = $this->db->query("SELECT * FROM metadatos_fito WHERE banco = '$banco'");
			return $query;
		}// fin retorno metadatos de banco/coleccion
		//-----------------------------------------------------------------------------------------------------------------------------------
		function taxonomia_minima($banco)
		{
			$query = $this->db->query("SELECT distinct genero, familia FROM fitogeneticos WHERE banco = '$banco' order by familia, genero asc");
			return $query;
			
		}//fin de taxonomias minimas por banco: familia y genero
		//-----------------------------------------------------------------------------------------------------------------------------------
		//                                                         CONTADORES
		//-----------------------------------------------------------------------------------------------------------------------------------
		function count_familias($banco)
		{
			$query = $this->db->query("select count(distinct familia)as contador from fitogeneticos where banco='$banco'");
			return $query;			
			
		}//fin de familias por banco seleccionado
		//-----------------------------------------------------------------------------------------------------------------------------------
		function count_generos($banco)
		{
			$query = $this->db->query("select count(distinct genero)as contador from fitogeneticos where banco='$banco'");
			return $query;
			
		}//fin de familias por banco seleccionado
		//-----------------------------------------------------------------------------------------------------------------------------------
		function count_accesiones($banco)
		{
			$query = $this->db->query("select count(*) as contador from fitogeneticos where banco='$banco'");
			return $query;			
			
		}//fin de familias por banco seleccionado
		//------------------------------------------------------------------------------------------------------------------------------------
		
		function count_total_accesiones()
		{
			$query = $this->db->query("select count(*) as contador from fitogeneticos");
			return $query;			
			
		}//fin contador total de accesiones de la base de datos
		//------------------------------------------------------------------------------------------------------------------------------------
		function count_total_familias()
		{
			$query = $this->db->query("select count(distinct familia)as contador from fitogeneticos");
			return $query;			
			
		}//fin de conmtador total de familias 
		//-----------------------------------------------------------------------------------------------------------------------------------
		function count_total_generos()
		{
			$query = $this->db->query("select count(distinct genero)as contador from fitogeneticos");
			return $query;			
			
		}//fin de conmtador total de genero 
		//-----------------------------------------------------------------------------------------------------------------------------------
		function count_total_bancos()
		{
			$query = $this->db->query("select count(distinct banco)as contador from fitogeneticos");
			return $query;			
			
		}//fin de conmtador total de bancos/colecciones 
		//-----------------------------------------------------------------------------------------------------------------------------------
		//                                                         BUSQUEDAS GENERALES
		//-----------------------------------------------------------------------------------------------------------------------------------
		function taxonomia_maxima()
		{
			$query = $this->db->query("SELECT distinct familia FROM fitogeneticos order by familia asc");
			return $query;			
		}//fin de taxonomias totales del sistema
		//-----------------------------------------------------------------------------------------------------------------------------------
		function lista_bancos()
		{
			$query = $this->db->query("SELECT distinct banco FROM metadatos_fito where estado ='1' order by banco asc");
			return $query;
		}// listado de bancos HABILITADOS
		
		//-----------------------------------------------------------------------------------------------------------------------------------
		//                                                       BUSQUEDAS FITOGENETICAS
		//-----------------------------------------------------------------------------------------------------------------------------------
		function listar_generos($familia)
		{
			$query = $this->db->query("SELECT  distinct(genero),familia FROM fitogeneticos where familia ='".$familia."' order by genero");
			return $query;
		}// lisdtado de generos por familia seleccionada
		
	}//fin clase Site