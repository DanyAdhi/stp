<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 1) { redirect('auth'); }

    $this->load->model(['Admin/M_periode']);
    $this->load->library(['form_validation', 'encryption']);
  }

  public function index() {
    $data = [
			'periods'		        => $this->M_periode->get_all_period(),
			'content'		        => 'admin/periode/index',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function create() {
    $check_period = $this->M_periode->get_period_active();
    if ($check_period) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Periode aktif sudah ada.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/periode');
    } else {
      $data = [ 'content'	=> 'admin/periode/create' ];
      $this->load->view('admin/template/Template', $data);
    }
  }

  public function store() {
    $validation = $this->form_validation->set_rules($this->save_validation())->run();

    if ($validation === false) {
      $data = [ 'content'   => 'admin/periode/create' ];
      $this->load->view('admin/template/Template', $data);
    } else {
      $post   = $this->input->post();
      
      $insert_period = [
        'name'        => $post['name'],
        'start_date'  => $post['start_date'],
        'end_date'    => $post['end_date'],
      ];

      $this->M_periode->save_period($insert_period);
      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/periode');
    }

  }

  public function update_status($id) {
    if(!isset($id)) show_404();
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_periode->get_one_period($id);
    if (!$get_data) show_404();

    $update_period = ['status' => 'Selesai'];
    $this->M_periode->update_period($id, $update_period);

    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di update.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('admin/periode');    
  }

  public function delete($id) {
    if(!isset($id)) show_404();
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_periode->get_one_period($id);
    if (!$get_data) {
      show_404();
    }
    if ($get_data[0]->total_user != 0) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Periode telah yang memiliki member tidak bisa dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/periode');
    }

    $this->M_periode->delete_period($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('admin/periode');    
  }

  private function save_validation() {
    return [
      [
        'field' 	=> 'name',
        'label'	  => 'Nama',
        'rules'	  => 'required',
        'errors' 	=> [ 'required' => '<b>%s</b> tidak boleh kosong.' ]

      ],
      [
        'field' 	=> 'start_date',
        'label'	  => 'Tanggal Mulai',
        'rules'	  => 'required',
        'errors' 	=> [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'end_date',
        'label'	  => 'Tanggal Selesai',
        'rules'	  => 'required|callback_check_greater_then['.$this->input->post('start_date').']',
        'errors' 	=> [ 
          'required'            => '<b>%s</b> tidak boleh kosong.',
          'check_greater_then'  => '<b>%s</b> harus lebih besar dari tanggal mulai.'
        ]
      ],
    ];
  }

  public function check_greater_then($end_date, $start_date) {
    if (strtotime($start_date) > strtotime($end_date)) {
      return false;       
    } else {
      return true;
    }
  }

}