<?php

class M_barang extends CI_Model{
	protected $_table = 'barang';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stok(){
		$query = $this->db->get_where($this->_table, 'stok > 1');
		return $query->result();
	}

	public function lihat_id($id){
		$query = $this->db->get_where($this->_table, ['id' => $id]);
		return $query->row();
	}

	
}