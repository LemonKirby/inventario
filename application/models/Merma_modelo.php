<?php
defined('BASEPATH') OR exit('No se permite el acceso directo.');

class Merma_model extends CI_Model{

	public function getAll(){
		$this->db->join('idInsumo', 'insumo.idInsumo = mermaInsumo.idInsumo');
		$rs = $this->db->get('mermaInsumo');
		return $rs->num_rows() > 0 ? $rs->result() : NULL;
	}

	public function insert($data){
		return $this->db->insert('mermaInsumo', $data) ? true : NULL;
	}

	public function getById($id)
    {
        $cmd = "SELECT * FROM mermaInsumo where idInsumo  = ".$id;

        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

	public function update($entry, $idInsumo)
    {
        try {
            $this->db->set($entry);
            $this->db->where('idInsumo', $idInsumo);
            $this->db->update('v');

            return ($idInsumo) ? TRUE : NULL;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
		
    }	

	public function deleteById($id)
    {
        $cmd = "DELETE FROM mermaInsumo where idInsumo = ".$id;

        $query = $this->db->query($cmd);
        return (TRUE) ? TRUE : NULL;
    }
     
}
