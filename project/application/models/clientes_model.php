<?php
class Clientes_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getClientes(){
    	$this->db->select('*')->from('clientes')->where('status', 1);
    	$query = $this->db->get();
    	if($query->num_rows()>0){
            foreach($query->result() as $fila){
                $data[]=$fila;
            }
            return $data;
        }
        else
            return false;
    }

	public function alta($array){
		$query = $this->db->insert('clientes',$array);
		if($this->db->affected_rows()>0)
			return $this->db->insert_id();
		else
			return 0;
	}
	
	public function eliminar($id){
    	$this->db->where('idCliente',$id);
    	$this->db->update('clientes',array('status'=>0));
    	return true;
	}
	
	public function existe($id){
		$this->db->select("*")->from("clientes")->where(array('idCliente'=>$id,'status'=>1));
    	$query = $this->db->get();
    	if($query->num_rows()>0){	
    		return true;
    	}
    	else
    		return false;
	}
	
	public function getCliente($id){
		$this->db->select("*")->from("clientes")->where("idCliente", $id);
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else
			return false;
	}
	
	public function edita($array,$id){
		$this->db->where('idCliente',$id);
		$this->db->update('clientes',$array);
		return true;
		
	}
}

?>
