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
		class Opendatagov extends CI_Model  
		{
			
		function __construct()
		{
				parent::__construct();				
				
		}// fin constructor de clase
		//----------------------------------------------------------------------------------------------------------------------------------
		// conteo de establecimientos
		
		function contar_establecimientos()
		{			
			$query = $this->db->query("select count(distinct nombre)as contador from establecimientos");
			return $query;
		}// fin conteo establecimientos.
		//----------------------------------------------------------------------------------------------------------------------------------
		function listar_departamentos()
		{
			$query = $this->db->query("select distinct(departamento),obs from establecimientos order by departamento asc");
			return $query;
		}//fin funcion listado de departamentos
		//----------------------------------------------------------------------------------------------------------------------------------
		function contar_establecimientos_departamento($departamento)
		{
			$query = $this->db->query("select count(distinct nombre)as contador from establecimientos where departamento = $departamento");
			return $query;
		}//fin funcion listado de departamentos	
		//----------------------------------------------------------------------------------------------------------------------------------
		function contar_establecimientos_departamento2($id_departamento)
		{
			$query = $this->db->query("select count(obs)as contador from establecimientos where obs = $id_departamento");
			return $query;
		}//fin funcion listado de departamentos
		
		//----------------------------------------------------------------------------------------------------------------------------------
		function nombre_departamento($id_departamento)
		{
			$query = $this->db->query("select distinct(departamento) from establecimientos where obs = $id_departamento order by departamento asc");
			return $query;
		}// fin funcion nombre del departamento
		//----------------------------------------------------------------------------------------------------------------------------------
		function listar_localidades($id_departamento)
		{
			$query = $this->db->query("select distinct(localidad) from establecimientos where obs = $id_departamento order by localidad asc");
			return $query;
		}// fin funcion listar localidades del departamento
		//----------------------------------------------------------------------------------------------------------------------------------
		function contar_establecimientos_departamento3($seleccion_localidad)
		{
			//select  distinct * from establecimientos where localidad = "ensenadita"	
			$query = $this->db->query("select count(obs)as contador from establecimientos where localidad = '$seleccion_localidad'");
			return $query;
		}//fin funcion contar escuelas de parajes o localidades
		//----------------------------------------------------------------------------------------------------------------------------------
		function nombre_escuelas($seleccion_localidad)
		{
			//select * from establecimientos where localidad ="itati"	
			$query = $this->db->query("select * from establecimientos where localidad = '$seleccion_localidad'");
			return $query;
		}//fin funcion nombres de escuelas de la localidad
		//-----------------------------------------------------------------------------------------------------------------------------------
		function datos_escuela($escuela)
		{
			//select * from establecimientos where localidad ="itati"	
			$query = $this->db->query("select * from establecimientos where nombre = '$escuela'");
			return $query;
		}//fin funcion nombres de escuelas de la localidad
		//-----------------------------------------------------------------------------------------------------------------------------------
		function datos_cursos($cue_anexo)
		{
			$query = $this->db->query("select * from cursos_divisiones where cue-anexo = '$cue_anexo' order by nivelensenanza asc");
			return $query;			
		}//fin datos de cue-anexo para escuelas
		//------------------------------------------------------------------------------------------------------------------------------------
		
		
		
		
		
	}//fin clase Opendatagov