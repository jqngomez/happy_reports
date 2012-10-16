<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redes extends CI_Controller {

	/**
	 * Clientes
	 * Altas - Bajas - Modificaciones - Consultas
	 * 
	 * Autor: Joaquin Gomez
	 * 11-oct-2012
	 * 
	 * 
	 */
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('redes_model');
	}
	
	public function index()
	{
		$data['redes'] = $this->redes_model->getRedes();
		$this->load->view('lista_redes', $data);
	}
	
	public function nuevo(){
		$this->load->view('alta_redes');
	}
	
	public function edita(){
		$id = $this->input->post('idCliente');
		$alta_arr['nombre'] = $this->input->post('txtNombre');
		
		if($this->redes_model->edita($alta_arr,$id)){
				echo 'Se modifico con exito';
			
		}else{
				echo 'Error al modificar';
			
		}
	}
	
	public function modificar($id){
		if($this->redes_model->existe($id)){
			$datos['datos_red'] = $this->redes_model->getRed($id);
			$datos['idRed'] = $id;
			$this->load->view('edita_redes',$datos);
		}else{
			echo 'No existe la red.';
		}
	}
	
	public function baja($id){
		if($this->redes_model->eliminar($id)){
			echo 'Se elimino con exito.';
		}else{
			echo 'Error al Eliminar.';
		}
	}
	
	public function alta(){
		$alta_arr['nombre'] = $this->input->post('txtNombre');
		$alta_arr['fecha'] = date("Y-m-d");   
		$alta_arr['hora'] = date("H:i:s");
		$alta_arr['status'] = 1;
		
		$idRed = $this->redes_model->alta($alta_arr);
		if($idRed>0){
			echo 'Se dio de alta exitosamente la red social: '.$idRed;
		}else{
			echo 'Error al dar de alta red social';
		}
		
	}
}

