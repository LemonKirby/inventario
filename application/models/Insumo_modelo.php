<?php
defined('BASEPATH') OR exit('No se permite el acceso directo.');

class Insumo_model extends CI_Model{

	public function getAll(){
        $this->db->select("*");
        $this->db->from("insumo");
        $results=$this->db->get();
        return $results->result();
	}

	public function save($data){
		return $this->db->insert('insumo', $data) ? true : NULL;
	}

	public function getById($id)
    {
        $this->db->select("*");
        $this->db->from("insumo");
        $this->db->where("idInsumo",$id);
        $result=$this->db->get();
        return $result->row();   
    }

	public function update($data, $id)
    { 
        $this->db->where("idInsumo",$id);
        $this->db->update("insumo",$data);
    }	

	public function delete($id)
    {
        $this->db->where("idInsumo",$id);
        $this->db->delete("insumo");
    }
     
}
