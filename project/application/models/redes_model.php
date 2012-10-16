<?php
class Redes_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getRed($id){
    	$this->db->select("*")->from("redes_sociales")->where("idRed", $id);
    	$query = $this->db->get();
    	if($query->num_rows()>0){
    		return $query->row_array();
    	}
    	else
    		return false;
    }
    
    public function edita($array,$id){
    	$this->db->where('idRed',$id);
    	$this->db->update('redes_sociales',$array);
    	return true;
    
    }
    
    public function existe($id){
    	$this->db->select("*")->from("redes_sociales")->where(array('idRed'=>$id,'status'=>1));
    	$query = $this->db->get();
    	if($query->num_rows()>0){
    		return true;
    	}
    	else
    		return false;
    }
    
    public function eliminar($id){
    	$this->db->where('idRed',$id);
    	$this->db->update('redes_sociales',array('status'=>0));
    	return true;
    }
    
	public function alta($array){
		$query = $this->db->insert('redes_sociales',$array);
		if($this->db->affected_rows()>0)
			return $this->db->insert_id();
		else
			return 0;
	}
	
	
		
}

?>
