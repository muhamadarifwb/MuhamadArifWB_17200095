<?php

use Dompdf\Dompdf; 

class customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->login['role'] != 'customer' && $this->session->login['role']
            != 'admin') redirect();
        $this->data['aktif'] = 'customer';
        $this->load->model('M_customer', 'm_customer');

    }

    public function index(){
        $this->data['title'] = 'Data customer';
        $this->data['all_customer'] = $this->m_customer->lihat();
        $this->data['no'] = 1;

        $this->load->view('customer/lihat', $this->data);
    }

    public function tambah(){
        if ($this->session->login['role'] == 'customer'){
            $this->session->set_flashdata('error','Tambah data hanya untuk admin!');
            redirect('customer');
        }

        $this->data['title'] = 'Tambah customer';

        $this->load->view('customer/tambah', $this->data);
    }

    public function proses_tambah(){
        if ($this->session->login['role'] == 'customer'){
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('customer');
        }

        $data = [
            'kd_cust' => $this->input->post('kd_cust'),
            'nm_cust' => $this->input->post('nm_cust'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'hp' => $this->input->post('hp'),
        ];

        if($this->m_customer->tambah($data)){
            $this->session->set_flashdata('success','Data customer <strong> Berhasil</strong> Ditambahkan!');
            redirect('customer');
        } else {
            $this->session->set_flashdata('error', 'Data customer <strong> Gagal</strong> Ditambahkan!');
            redirect('customer');
        }
    }

    public function ubah($id){
        if($this->session->login['role'] == 'customer'){
            $this->session->set_flashdata('error','Ubah data hanya untuk admin!');
            redirect('penjualan');
        }
        $this->data['title'] = 'Ubah customer';
        $this->data['customer'] = $this->m_customer->lihat_id($id);

        $this->load->view('customer/ubah', $this->data);
    }

    public function proses_ubah($id){
        if($this->session->login['role'] == 'customer'){
            $this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
            redirect('penjualan');
        }
        
        $data = [
            'kd_cust' => $this->input->post('kd_cust'),
            'nm_cust' => $this->input->post('nm_cust'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'hp' => $this->input->post('hp'),
        ];
        if($this->m_customer->ubah($data,$id)){
            $this->session->set_flashdata('success','Data customer <strong> Berhasil </strong> Diubah!');
            redirect('customer');
        } else {
            $this->session->set_flashdata('error','Data customer <strong> Gagal</strong> Diubah!');
            redirect('customer');
        }
    }

    public function hapus($id){
        if($this->session->login['role'] == 'customer'){
            $this->session->set_flashdata('error','Hapus data hanya untuk admin!');
            redirect('penjualan');
        }

        if($this->m_customer->hapus($id)){
            $this->session->set_flashdata('success','Data customer <strong> Berhasil</strong> Dihapus!');
            redirect('customer');
        } else {
            $this->session->set_flashdata('error','Data customer <strong> Gagal</strong> Dihapus!');
            redirect('customer');
        }
    }

    public function export(){
        $dompdf = new Dompdf();
        // $this->data['perusahaan'] = $this->m_usaha->lihat();
        $this->data['all_customer'] = $this->m_customer->lihat();
        $this->data['title'] = 'Laporan Data customer';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4','Landscape');
        $html = $this->load->view('customer/report', $this->data,true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data customer Tanggal' . date('d F Y'),array("Attachment" => false));
    }
    
}