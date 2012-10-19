<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of altaUsuarios_model
 *
 * @author Pedro
 */
class Usuarios_model extends CI_Model
   {
       public function __construct()
       {
           parent::__construct();
           $this->load->database();
       }
       public function agregarModel($guardarData) {
           $this->db->insert('usuarios',$guardarData);
       }
       public function getDatosUsuariosModel() {
           $this->db->select("*")->from("usuarios");
           $query=$this->db->get();
    		//print_r($query->result());
        if($query->num_rows()>0){
            foreach($query->result() as $fila){
                $data[]=$fila;
            }
            return $data;
        }
        else
            return false;
       }
       public function getTipos() {
           $this->db->select("*")->from("tipo_usuarios");
           $query=$this->db->get();
    		//print_r($query->result());
        if($query->num_rows()>0){
            foreach($query->result() as $fila){
                $data[]=$fila;
            }
            return $data;
        }
        else
            return false;
       }
       public function getDatosUsuarioModel($id) {
           $this->db->where('idUsuario',$id);
           $this->db->select("*")->from("usuarios");
           $query=$this->db->get();
//           print_r($query->result());
        if($query->num_rows()>0){
            foreach($query->result() as $fila){
                $data[]=$fila;
            }
            return $data;
        }
        else
            return false;
       }
       
       public function getUsuario($usuario,$pass) {
            $this->db->where('usuario',$usuario);
            $this->db->where('password',$pass);
            $this->db->where('tipo_usuario',1);
            $this->db->where('status',1);
            $query=$this->db->get('usuarios');
            if($query->num_rows()>0){
                    return $query->row()->idUsuario;
            }else{
                    return false;
            }
       }
       public function getUsuarioTipo($usuario,$pass) {
            $this->db->where('usuario',$usuario);
            $this->db->where('password',$pass);
            $this->db->where('status',1);
            $query=$this->db->get('usuarios');
            if($query->num_rows()>0){
                    return $query->row()->tipo_usuario;
            }else{
                    return false;
            }
       }
//       public function getUsuarioId($id) {
//            $this->db->where('idUsuario',$id);
//            $query=$this->db->get('usuarios');
//            if($query->num_rows()>0){
//                    return $query->row()->tipo_usuario;
//            }else{
//                    return false;
//            }
//       }
    
       public function verificarContrasena($id,$pass) {
           $this->db->where('idUsuario',$id);
           $this->db->where('password',$pass);
           $query=$this->db->get('usuarios');
           return $query->num_rows();
       }
       
       public function contrasenaModificada($id,$passLast,$passNew) {
           $data['password']=$passNew;
//           echo $passNew." ".$id;
           $this->db->where('idUsuario',$id);
           $this->db->where('password',$passLast);
           $this->db->update('usuarios',$data);
           $query=$this->db->affected_rows();
           //print_r($query);
           
       }
        public function eliminarModel($id) {
           $this->db->where('idUsuario',$id);
           $this->db->update('usuarios',array("status"=>0));
           $query=$this->db->affected_rows();
           return $query;
       }
        public function modificarUsuarioModel($id,$nombre,$apellido,$usuario,$password,$tipoUsuario,$fecha,$hora) {
           $data['nombre']=$nombre;
           $data['apellido']=$apellido;
           $data['usuario']=$usuario;
           $data['password']=sha1($password);
           $data['tipo_usuario']=$tipoUsuario;
           $data['fecha'] = $fecha;
           $data['hora'] = $hora;
           $this->db->where('idUsuario',$id);
           $this->db->update('usuarios',$data);
       }
   }
?>
