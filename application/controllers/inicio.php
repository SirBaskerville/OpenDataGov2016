<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
class Inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->helper('text');
		$this->load->model('opendatagov','',TRUE);
		$this->load->helper('form');
		
		//$this->load->library('session');
		// Limpieza de librerias y helpers para cargar minimo operativo				
	}// fin funcion de constructor de clase
	//-----------------------------------------------------------------	
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('vista_inicial');
		$this->load->view('includes/footer');
	}// fin index
	//-----------------------------------------------------------------
	public function establecimientos()
	{	
		//-----------------------------------
		$data['cantidad_est']		=	$this->opendatagov->contar_establecimientos();
		$data['lista_deptos']		=	$this->opendatagov->listar_departamentos();
		$data['alumnos_total']		=	$this->opendatagov->alumnos_total_general();
		$data['alumnos_femeninos']	=	$this->opendatagov->alumnos_total_femenino();
		$data['alumnos_masculinos']	=	$this->opendatagov->alumnos_total_masculino();
		$data['leyenda']			=	"establecimientos";		
		//-----------------------------------
		$this->load->view('includes/header');
		$this->load->view('vista_establecimientos', $data);
		$this->load->view('includes/footer');				
	}// fin funcion establecimientos
	//-----------------------------------------------------------------	
	public function establecimientos2()
	{	
		//-----------------------------------
		$data['estado'] 		= $this->input->post('estado');
		$id_departamento	 	= $this->input->post('id_departamento');
		//-----------------------------------
		$data['nombre_departamento']	=	$this->opendatagov->nombre_departamento($id_departamento);
		$data['cantidad_est']			=	$this->opendatagov->contar_establecimientos_departamento2($id_departamento);
		$data['listar_localidades']		=	$this->opendatagov->listar_localidades($id_departamento);
		$data['leyenda']				=	"establecimientos del departamento";		
		//-----------------------------------
		$this->load->view('includes/header');
		$this->load->view('vista_establecimientos', $data);
		$this->load->view('includes/footer');				
	}// fin funcion establecimientos 2 (busqueda de departamentos)
	//-----------------------------------------------------------------
	public function establecimientos3()
	{	
		//-----------------------------------
		$data['estado'] 		= $this->input->post('estado');
		$departamento	 		= $this->input->post('departamento');
		$seleccion_localidad	= $this->input->post('seleccion_localidad');
		$data['localidad']		= $this->input->post('seleccion_localidad');
		$data['departamento']	= $this->input->post('departamento');
		//-----------------------------------
		$data['escuelas_localidad']		=	$this->opendatagov->nombre_escuelas($seleccion_localidad);
		$data['cantidad_est']			=	$this->opendatagov->contar_establecimientos_departamento3($seleccion_localidad);
		//$data['listar_localidades']		=	$this->opendatagov->listar_localidades($id_departamento);
		$data['leyenda']				=	"establecimientos del departamento";		
		//-----------------------------------
		$this->load->view('includes/header');
		$this->load->view('vista_establecimientos', $data);
		$this->load->view('includes/footer');				
	}// fin funcion establecimientos 3 (busqueda de parajes/localidades)
	//-----------------------------------------------------------------
	
	public function establecimientos4()
	{	
		//-----------------------------------
		$data['estado'] 		= $this->input->post('estado');
		$departamento	 		= $this->input->post('departamento');
		$localidad				= $this->input->post('localidad');
		$escuela				= $this->input->post('escuela');
		
		$data['localidad']		= $this->input->post('localidad');
		$data['departamento']	= $this->input->post('departamento');
		$data['escuela']		= $this->input->post('escuela');
		
		//-----------------------------------
		$data['escuelas_localidad']			=	$this->opendatagov->datos_escuela($escuela);
		$escuela_localidad					=	$this->opendatagov->datos_escuela($escuela);
				
		//-----------------------------------
		foreach($escuela_localidad->result_array() as $row)
	            {         
	               $cue = $row['Cue_Anexo'];
	            }//fin de foreach de datos de la escuela
		$cue_anexo = substr($cue, 0, -2).'-'.substr($cue, -2);
		//------------------------------------------------------------
		$data['cursos_divisiones']			=	$this->opendatagov->datos_cursos($cue_anexo);
		$data['total']			= $this->opendatagov->alumnos_escuela_total($cue_anexo);
		$data['femeninos']		= $this->opendatagov->alumnos_escuela_femeninos($cue_anexo);
		$data['masculinos']		= $this->opendatagov->alumnos_escuela_masculinos($cue_anexo);
		//------------------------------------------------------------
	
		$this->load->view('includes/header');
		$this->load->view('vista_establecimientos', $data);
		$this->load->view('includes/footer');				
	}// fin funcion establecimientos 4 (datos de la escuela y metricas)
	//-----------------------------------------------------------------
	
	public function alumnos()
	{
		$data['estado'] 		= $this->input->post('estado');
		$departamento	 		= $this->input->post('departamento');
		$localidad				= $this->input->post('localidad');
		$escuela				= $this->input->post('escuela');
		
		$data['localidad']		= $this->input->post('localidad');
		$data['departamento']	= $this->input->post('departamento');
		$data['escuela']		= $this->input->post('escuela');
		$curso				= $this->input->post('curso_division');
		$data['curso']			= $this->input->post('curso_division');
		//------------------------------------------------
		$data['total']			= $this->opendatagov->alumnos_total($curso);
		$data['femeninos']		= $this->opendatagov->alumnos_femeninos($curso);
		$data['masculinos']		= $this->opendatagov->alumnos_masculinos($curso);
		$data['listado']		= $this->opendatagov->alumnos_listado($curso);
		//------------------------------------------------
		$this->load->view('includes/header');
		$this->load->view('vista_alumnos', $data);
		$this->load->view('includes/footer');
	}//fin funcion metricas de alumnado	
	//-----------------------------------------------------------------
	
	
	
	//-----------------------------------------------------------------
	public function directa()
	{	
		//-----------------------------------
		
		//-----------------------------------
		$this->load->view('includes/header');
		$this->load->view('vista_directa');
		$this->load->view('includes/footer');
				
	}// fin funcion busqueda directa general
	//-----------------------------------------------------------------
	public function directa2()
	{	
		//-----------------------------------
		$nombre		=	"%".$this->input->post('nombre')."%";
		$estado		=	$this->input->post('estado');
		$data['estado']		=	$this->input->post('estado');
		$data['nombre']		=	$this->input->post('nombre');
		//-----------------------------------
		$data['escuelas']	=	$this->opendatagov->busqueda_directa_escuelas($nombre);
		$data['total']		=	$this->opendatagov->busqueda_directa_conteo($nombre);
		//-----------------------------------
		$this->load->view('includes/header');
		$this->load->view('vista_directa',$data);
		$this->load->view('includes/footer');
				
	}// fin funcion busqueda directa nombres escuela
	//-----------------------------------------------------------------
	public function directa3()
	{	
		//-----------------------------------
		$cue				= 	$this->input->post('cue');
		//$data['nombre']		=	$this->input->post('nombre');
		$data['escuela']	=	$this->opendatagov->busqueda_directa_escuela($cue);
		$data['estado']		=	$this->input->post('estado');
		//-----------------------------------
		$cue_anexo = substr($cue, 0, -2).'-'.substr($cue, -2);
		//-----------------------------------
		$data['escuela']	=	$this->opendatagov->busqueda_directa_escuela($cue);
		$data['cursos']		=	$this->opendatagov->datos_cursos($cue_anexo);
		//-----------------------------------
		$this->load->view('includes/header');
		$this->load->view('vista_directa',$data);
		$this->load->view('includes/footer');
				
	}// fin funcion busqueda directa particular
	
	
	
	
}

//fin de clase INICIO al SITE