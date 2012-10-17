<?php
class Cuentas_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getCuentasByCliente($id){
    	$this->db->select('*')->from('cuentas')->where(array('status'=>1,'idCliente'=>$id));
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
    
    public function getCuentas(){
    	$this->db->select('*')->from('cuentas')->where('status', 1);
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
    
    public function getCuenta($id){
    	$this->db->select("*")->from("cuentas")->where("idCuenta", $id);
    	$query = $this->db->get();
    	if($query->num_rows()>0){
    		return $query->row_array();
    	}
    	else
    		return false;
    }
    
    public function edita($array,$id){
    	$this->db->where('idCuenta',$id);
    	$this->db->update('cuentas',$array);
    	return true;
    
    }
    
    public function existe($id){
    	$this->db->select("*")->from("cuentas")->where(array('idCuenta'=>$id,'status'=>1));
    	$query = $this->db->get();
    	if($query->num_rows()>0){
    		return true;
    	}
    	else
    		return false;
    }
    
    public function eliminar($id){
    	$this->db->where('idCuenta',$id);
    	$this->db->update('cuentas',array('status'=>0));
    	return true;
    }
    
	public function alta($array){
		$query = $this->db->insert('cuentas',$array);
		if($this->db->affected_rows()>0)
			return $this->db->insert_id();
		else
			return 0;
	}
	
	
		
}

?>
