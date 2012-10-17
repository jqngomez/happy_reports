<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('usuarios_model');
            $this->load->library('pagination');
            $this->load->library('email');          
            $this->load->library('session');
          
        }
	public function index() {
                if($this->session->userdata('idUsuario')){
                    $data['usuarioData']=$this->usuarios_model->getDatosUsuarioModel(@$idUsuario);
                    $data['usuariosData']=$this->usuarios_model->getDatosUsuariosModel();
                    $data['tipos']=$this->usuarios_model->getTipos();
                    $this->load->view('alta_usuarios',$data);
                }else{
                    $this->load->view('login');
                }
	}
        public function guardarUsuarios() {
            if($this->session->userdata('idUsuario')){
                date_default_timezone_set("America/Mazatlan");
                $nombre=$this->input->post('nombre');
                $apellido=$this->input->post('apellido');
                $usuario=$this->input->post('usuario');
                $password=$this->input->post('password');
                $passwordConfirm=$this->input->post('passwordConfirm');
                $tipoUsuario=$this->input->post('tipoUsuario');
                $guardarData['nombre'] = $nombre;
                $guardarData['apellido'] = $apellido;
                $guardarData['usuario'] = $usuario;
                $guardarData['password'] = sha1($password);
                $guardarData['tipo_usuario'] = $tipoUsuario;
                $guardarData['fecha'] = date("Y-m-d");
                $guardarData['hora'] = date("H:i:s");
                $guardarData['status'] = "1";
                if($nombre=="" || $apellido=="" || $usuario=="" || $password=="" || $password!=$passwordConfirm ){
                        $bandera=0;
                }
                else{
                    $bandera=1;
                }
                if($bandera!=0){
//                    echo "we";
                    $this->usuarios_model->agregarModel($guardarData);
                    $data['usuariosData']=$this->usuarios_model->getDatosUsuariosModel();
                    $data['tipos']=$this->usuarios_model->getTipos();
                    $data['usuariosData']=$this->usuarios_model->getDatosUsuariosModel();
                    $this->load->view('alta_usuarios',$data);
                }else{
                    redirect();
                }
            }else{
                    redirect();
            }
	}
        public function eliminarUsuarios($id) {
            $flag=$this->usuarios_model->eliminarModel($id);
            if($flag==true){$data['error']="Eliminado";}else{$data['error']="Usuario no existente";}
            redirect();
	}
        public function modificarUsuarios($id) {
            if($this->session->userdata('idUsuario')){
                $data['usuarioData']=$this->usuarios_model->getDatosUsuarioModel($id);
                $data['usuariosData']=$this->usuarios_model->getDatosUsuariosModel();
                $data['tipos']=$this->usuarios_model->getTipos();
                $nombre=$this->input->post('nombre');
                $apellido=$this->input->post('apellido');
                $usuario=$this->input->post('usuario');
                $password=sha1($this->input->post('password'));
                $tipoUsuario=$this->input->post('tipoUsuario');
                $this->load->view('modificar_usuarios',$data);
            }else{
                redirect();
            }
        }
        public function modificar() {
            date_default_timezone_set("America/Mazatlan");//Cambia el formato a la hora de mazatlan
            $id=$this->input->post('id');
            $nombre=$this->input->post('nombre');
            $apellido=$this->input->post('apellido');
            $usuario=$this->input->post('usuario');
            $password=$this->input->post('password');
            $tipoUsuario=$this->input->post('tipoUsuario');
            $fecha=date("Y-m-d");
            $hora=date("H:i:s");
            $this->usuarios_model->modificarUsuarioModel($id,$nombre,$apellido,$usuario,$password,$tipoUsuario,$fecha,$hora);
            $this->modificarUsuarios($id);
        }
        public function modificarContrasenaView($id) {
            $data['id']=$id;
            $this->load->view('modificarContrasena',$data);
        }
        public function modificarContrasena() {
            //$pass=$this->input->post('passLast');
            $passLast=sha1($this->input->post('passLast'));
            $id=$this->input->post('id');
            //echo json_encode($passLast);
            $flag=$this->usuarios_model->verificarContrasena($id,$passLast);
            echo json_encode($flag);
            //if($flag==true){echo json_encode('1');}else{echo json_encode('2');}
        }
        public function contrasenaModificada() {
            $passNew=sha1($this->input->post('passNew'));
            $passLast=sha1($this->input->post('passLast'));
            $passConfirm=sha1($this->input->post('passConfirm'));
            $id=$this->input->post('id');
//            echo $passNew."<br>";
//            echo $passLast."<br>";
//            echo $id;
            if($passNew!=$passConfirm){
                redirect(base_url().'usuarios/modificarContrasenaView/'.$id);
            }else{
                $this->usuarios_model->contrasenaModificada($id,$passLast,$passNew);
                redirect(base_url().'usuarios/index/');
            }
            
        }
        public function loginTest() {
            $usuario=$this->input->post('usuario');
            $pass=sha1($this->input->post('pass'));
            if($this->session->userdata('idUsuario')){
                $data['usuarioData']=$this->usuarios_model->getDatosUsuarioModel(@$idUsuario);
                $data['usuariosData']=$this->usuarios_model->getDatosUsuariosModel();
                $data['tipos']=$this->usuarios_model->getTipos();
                redirect(base_url().'usuarios/loginTest/',$data);
            }else{
                $idUsuario=$this->usuarios_model->getUsuario($usuario,$pass);
                $tipo=$this->usuarios_model->getUsuarioTipo($usuario,$pass);
                if($idUsuario){
                    $this->session->set_userdata('idUsuario',$idUsuario);
                    $data['usuarioData']=$this->usuarios_model->getDatosUsuarioModel($idUsuario);
                    $data['usuariosData']=$this->usuarios_model->getDatosUsuariosModel();
                    $data['tipos']=$this->usuarios_model->getTipos();
                    $this->load->view('alta_usuarios',$data);
                }else if($tipo){
                    if($tipo==2){
                        $this->load->view('usuariosLibres');
                    }
                }else{
                    $data['error']="Usuario o Contraseña Incorrecta";
                    $this->load->view('login',$data);
                }
            }
        }
        function cerrar() {
            $this->session->sess_destroy();
            $this->load->view('login');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Usuarios.php
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 *  */