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

	public function lihat_nama_barang($nama_barang){
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_barang' => $nama_barang]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambah($id){
		return $this->db->insert($this->_table, $id);
		//  $this->db->insert('barang', $id);
        //return $this->db->insert_id();
	}

	public function min_stok($stok, $nama_barang){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('nama_barang', $nama_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubah($data, $kode_barang){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_barang' => $kode_barang]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id)
    {
        // Hapus data dari tabel barang berdasarkan id
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }
}