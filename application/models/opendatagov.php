<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
		function alumnos_total($curso)
		{
			$query = $this->db->query("select count(id) as contador from alumnos where curso = '$curso'");
			return $query;
		}// fin conteo de alumnos totales de curso de l aescuela x
		//-------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_femeninos($curso)
		{
			$query = $this->db->query("select count(id) as contador from alumnos where curso = '$curso' and sexo ='F'");
			return $query;
		}// fin conteo de alumnos femeninos de curso de l aescuela x
		//-------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_masculinos($curso)
		{
			$query = $this->db->query("select count(id) as contador from alumnos where curso = '$curso' and sexo ='M'");
			return $query;
		}// fin conteo de alumnos masculinos de curso de l aescuela x
		//--------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_listado($curso)
		{
			$query = $this->db->query("select * from alumnos where curso = '$curso' order by sexo, fechanac desc");
			return $query;
		}//fin funcion listado de alumnos de escuela/curso x
		//--------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_escuela_total($escuela)
		{
			$query = $this->db->query("select count(id) as contador from alumnos where cursodivisionid = '$escuela'");
			return $query;
		}// fin conteo de alumnos totales de curso de l aescuela x
		//-------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_escuela_femeninos($escuela)
		{
			$query = $this->db->query("select count(id) as contador from alumnos where cursodivisionid = '$escuela' and sexo ='F'");
			return $query;
		}// fin conteo de alumnos femeninos de curso de l aescuela x
		//-------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_escuela_masculinos($escuela)
		{
			$query = $this->db->query("select count(id) as contador from alumnos where cursodivisionid = '$escuela' and sexo ='M'");
			return $query;
		}// fin conteo de alumnos masculinos de curso de l aescuela x
		//--------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_total_general()
		{
			$query = $this->db->query("select count(id) as contador from alumnos");
			return $query;
		}// fin funcion conteo general de alumnos
		//--------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_total_femenino()
		{
			$query = $this->db->query("select count(id) as contador from alumnos where sexo ='F'");
			return $query;
		}// fin funcion conteo general femenino
		//--------------------------------------------------------------------------------------------------------------------------------------
		function alumnos_total_masculino()
		{
			$query = $this->db->query("select count(id) as contador from alumnos where sexo ='M'");
			return $query;
		}// fin funcion conteo general femenino
		//--------------------------------------------------------------------------------------------------------------------------------------
		function busqueda_directa_escuelas($nombre)
		{
			$query = $this->db->query("select * from establecimientos where nombre like '".$nombre."' order by nombre asc");
			return $query;
			
		}// fin funcion busqueda directa [por nombre de escuelas]
		//---------------------------------------------------------------------------------------------------------------------------------------
		function busqueda_directa_conteo($nombre)
		{
			$query = $this->db->query("select count(*)as contador from establecimientos where nombre like '".$nombre."'");
			return $query;
			
		}// fin funcion busqueda directa [por nombre de escuelas]
		//---------------------------------------------------------------------------------------------------------------------------------------
		function busqueda_directa_escuela($cue)
		{
			$query = $this->db->query("select * from establecimientos where cue_anexo = '".$cue."' order by nombre asc");
			return $query;
			
		}// fin funcion busqueda directa [por nombre de escuelas]
		
	}//fin clase Opendatagov