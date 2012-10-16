<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuentas extends CI_Controller {

	/**
	 * Cuentas
	 * Altas - Bajas - Modificaciones - Consultas
	 * 
	 * Autor: Joaquin Gomez
	 * 15-oct-2012
	 * 
	 * 
	 */
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('clientes_model');
		$this->load->model('cuentas_model');
		
		
	}
	
	public function index(){
		$arreglo['clientes'] = $this->clientes_model->getClientes();
		if($arreglo['clientes']){
		$this->load->view('alta_cuenta',$arreglo);
		}else{
			echo 'Es necesario registrar clientes para crear una cuenta. <a href="'.base_url().'clientes/">CLIC AQUI PARA DAR DE ALTA CLIENTE</a>';
		}
	}
	
	public function edita(){
		$id = $this->input->post('idCuenta');
		$alta_arr['idCliente'] = $this->input->post('cmbCliente');
		$alta_arr['nombre'] = $this->input->post('txtNombre');
		$alta_arr['usuario'] = $this->input->post('txtUsuario');
		$alta_arr['password'] = $this->input->post('txtPassword');
		
		if($this->cuentas_model->edita($alta_arr,$id)){
				echo 'Se modifico con exito';
			
		}else{
				echo 'Error al modificar';
			
		}
	}
	
	public function modificar($id){
		if($this->cuentas_model->existe($id)){
			$datos['datos_cuenta'] = $this->cuentas_model->getCuenta($id);
			$datos['clientes'] = $this->clientes_model->getClientes();
			$datos['idCuenta'] = $id;
			$this->load->view('edita_cuenta',$datos);
		}else{
			echo 'No existe la cuenta.';
		}
	}
	
	public function baja($id){
		if($this->cuentas_model->eliminar($id)){
			echo 'Se elimino con exito.';
		}else{
			echo 'Error al Eliminar.';
		}
	}
	
	public function alta(){
		$alta_arr['idCliente'] = $this->input->post('cmbCliente');
		$alta_arr['nombre'] = $this->input->post('txtNombre');
		$alta_arr['usuario'] = $this->input->post('txtUsuario');
		$alta_arr['password'] = $this->input->post('txtPassword');
		$alta_arr['fecha'] = date("Y-m-d");   
		$alta_arr['hora'] = date("H:i:s");
		$alta_arr['status'] = 1;
		
		$idCuenta = $this->cuentas_model->alta($alta_arr);
		
		if($idCuenta>0){
			echo 'Se dio de alta exitosamente la cuenta: '.$idCuenta;
		}else{
			echo 'Error al dar de alta la cuenta';
		}
		
	}
}

