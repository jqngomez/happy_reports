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
		$this->load->model('redes_model');
		$this->load->library('session');
		
		
	}
	
	
	public function index(){
		$data['cuentas'] = $this->cuentas_model->getCuentas();
		$this->load->view('lista_cuentas', $data);
	}
	
	
	public function cliente($id){
			$data['idCliente'] = $id;
			$data['redes'] = $this->redes_model->getRedes();
			$data['datos'] = $this->cuentas_model->getCuentasByCliente($id);
			$this->load->view('cuentas_cliente',$data);
	}
	
	public function nuevo(){
		$arreglo['clientes'] = $this->clientes_model->getClientes();
		if($arreglo['clientes']){
			$this->load->view('alta_cuenta',$arreglo);
		}else{
			echo 'Es necesario registrar clientes para crear una cuenta. <a href="'.base_url().'clientes/">CLIC AQUI PARA DAR DE ALTA CLIENTE</a>';
		}
	}
	
	public function edita(){
		$id = $this->input->post('idCuenta');
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
		$redes = $this->redes_model->getRedes();
		$idCliente = $this->input->post('idCliente');
		foreach ($redes as $red){
			if($this->input->post('cuenta'.$red->idRed)){
				$id = $this->input->post('cuenta'.$red->idRed);
				$alta_arr['idCliente'] = $idCliente;
				$alta_arr['nombre'] = $this->input->post('txtNombre'.$red->idRed);
				$alta_arr['usuario'] = $this->input->post('txtUsuario'.$red->idRed);
				$alta_arr['password'] = $this->input->post('txtPassword'.$red->idRed);
				$alta_arr['idRed'] = $red->idRed;
				$alta_arr['fecha'] = date("Y-m-d");
				$alta_arr['hora'] = date("H:i:s");
				$alta_arr['status'] = 1;
		
				if($this->cuentas_model->edita($alta_arr,$id))
					echo 'Se modifico la cuenta: '.$id;
				else echo 'Error al modificar: '.$id;
		
 			}elseif($this->input->post("chk".$red->idRed)=='on'){
				$alta_arr['idCliente'] = $idCliente;
				$alta_arr['nombre'] = $this->input->post('txtNombre'.$red->idRed);
				$alta_arr['usuario'] = $this->input->post('txtUsuario'.$red->idRed);
				$alta_arr['password'] = $this->input->post('txtPassword'.$red->idRed);
				$alta_arr['idRed'] = $red->idRed;
				$alta_arr['fecha'] = date("Y-m-d");
				$alta_arr['hora'] = date("H:i:s");
				$alta_arr['status'] = 1;
				$idCuenta = $this->cuentas_model->alta($alta_arr);
				if($idCuenta>0)
					echo 'Se agrego la cuenta: '.$idCuenta;
				else echo 'Error al agregar cuenta: '.$idCuenta;
 			}
		}		
	}
}

