<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	/**
	 * Menu
	 */
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	
	public function index(){
		echo $this->session->userdata('idUsuario');
		$this->load->view('menu_vista');
	}
}
