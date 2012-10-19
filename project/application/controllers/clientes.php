<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {

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
		$this->load->model('clientes_model');
		$this->load->library('session');
	}
	
	public function index()
	{
		$data['clientes'] = $this->clientes_model->getClientes();
		$this->load->view('lista_clientes', $data);
	}
	
	public function nuevo(){
		$this->load->view('alta_cliente');
	}
	
	public function edita(){
		$id = $this->input->post('idCliente');
		$alta_arr['nombre'] = $this->input->post('txtNombre');
		$alta_arr['giro'] = $this->input->post('txtGiro');
		$alta_arr['productos'] = $this->input->post('txtProductos');
		$alta_arr['mercado_potencial'] = $this->input->post('txtMercadoPotencial');
		$alta_arr['horario'] = $this->input->post('txtHorario');
		$alta_arr['telefono'] = $this->input->post('txtTelefono');
		$alta_arr['direccion'] = $this->input->post('txtDireccion');
		$alta_arr['correo'] = $this->input->post('txtCorreoElectronico');
		$alta_arr['sitio_web'] = $this->input->post('txtSitioWeb');
		$alta_arr['inicio'] = "'".$this->input->post('txtFechaInicio')."'";
		$alta_arr['nombre_encargado'] = $this->input->post('txtNombreEncargado');
		$alta_arr['apellido_encargado'] = $this->input->post('txtApellidoEncargado');
		$alta_arr['correo_encargado'] = $this->input->post('txtCorreoEncargado');
		$alta_arr['telefono_encargado'] = $this->input->post('txtTelefonoEncargado');
		$alta_arr['extencion_encargado'] = $this->input->post('txtExtencion');
		$alta_arr['skype_encargado'] = $this->input->post('txtSkype');
		$alta_arr['idUsuario'] = $this->input->post('cmbUsuario');
		$alta_arr['usuario'] = $this->input->post('txtUsuario');
		$alta_arr['password'] = $this->input->post('txtPassword');
		
		if($this->clientes_model->edita($alta_arr,$id)){
				echo 'Se modifico con exito';
			
		}else{
				echo 'Error al modificar';
			
		}
	}
	
	public function modificar($id){
		if($this->clientes_model->existe($id)){
			$datos['datos_cliente'] = $this->clientes_model->getCliente($id);
			$datos['idCliente'] = $id;
			$this->load->view('edita_cliente',$datos);
		}else{
			echo 'No existe el cliente.';
		}
	}
	
	public function baja($id){
		if($this->clientes_model->eliminar($id)){
			echo 'Se elimino con exito.';
		}else{
			echo 'Error al Eliminar.';
		}
	}
	
	public function alta(){
		$alta_arr['nombre'] = $this->input->post('txtNombre');
		$alta_arr['giro'] = $this->input->post('txtGiro');
		$alta_arr['productos'] = $this->input->post('txtProductos');
		$alta_arr['mercado_potencial'] = $this->input->post('txtMercadoPotencial');
		$alta_arr['horario'] = $this->input->post('txtHorario');
		$alta_arr['telefono'] = $this->input->post('txtTelefono');
		$alta_arr['direccion'] = $this->input->post('txtDireccion');
		$alta_arr['correo'] = $this->input->post('txtCorreoElectronico');
		$alta_arr['sitio_web'] = $this->input->post('txtSitioWeb');
		$alta_arr['inicio'] = $this->input->post('txtFechaInicio');
		$alta_arr['nombre_encargado'] = $this->input->post('txtNombreEncargado');
		$alta_arr['apellido_encargado'] = $this->input->post('txtApellidoEncargado');
		$alta_arr['correo_encargado'] = $this->input->post('txtCorreoEncargado');
		$alta_arr['telefono_encargado'] = $this->input->post('txtTelefonoEncargado');
		$alta_arr['extencion_encargado'] = $this->input->post('txtExtencion');
		$alta_arr['skype_encargado'] = $this->input->post('txtSkype');
		$alta_arr['idUsuario'] = $this->input->post('cmbUsuario');
		$alta_arr['usuario'] = $this->input->post('txtUsuario');
		$alta_arr['password'] = $this->input->post('txtPassword');
		$alta_arr['fecha'] = date("Y-m-d");   
		$alta_arr['hora'] = date("H:i:s");
		$alta_arr['status'] = 1;
		
		$idCliente = $this->clientes_model->alta($alta_arr);
		if($idCliente>0){
			echo 'Se dio de alta exitosamente el cliente: '.$idCliente. ' <a href="'.base_url().'clientes/">Regresar</a>';
		}else{
			echo 'Error al dar de alta cliente';
		}
		
	}
}

