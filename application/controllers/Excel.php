<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

// Load database
 public function __construct() {
 parent::__construct();
 //$this->load->model('admin/user_model');
 $this->load->model('Excel_model', 'Excel_model');
 }


public function export_excel_kasir(){
 $data = array( 'title' => 'Laporan Excel',
 'kasir' => $this->Excel_model->listing());
 $this->load->view('kasir/laporan_kasir_ex',$data);
 }

}

/* End of file Excel.php */
/* Location: ./application/controllers/Excel.php */