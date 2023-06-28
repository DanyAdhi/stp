<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 3) { redirect('auth'); }

    $this->load->model(['Pembimbing/M_progress']);
    $this->load->library(['form_validation', 'encryption']);

  }

  public function index() {
    $data = [
      'progress'  => $this->M_progress->get_all_progress(),
      'content'   => 'pembimbing/progress/index',
    ];
    $this->load->view('pembimbing/template/Template', $data);
  }

  public function store() {
    $get_period_active = $this->M_progress->get_period_active();
    if (!$get_period_active) {
      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Tidak dapat menambah data, periode aktif tidak ditemukan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('pembimbing/progress');
    } else {
      $post   = $this->input->post();
        
        $insert_progress = [
          'progress'          => $post['progress'],
          'program_period_id' => $get_period_active[0]->id,
          'program_id'        => $this->session->userdata('program_id'),
          'mentor_id'         => $this->session->userdata('mentor_id'),
        ];
  
        $this->M_progress->save_progress($insert_progress);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pembimbing/progress');
    }
  }

  public function update($id=null) {
    if(!isset($id)) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Id progress tidak valid.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pembimbing/progress');
    };
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_progress->get_one_progress($id);
    if (!$get_data) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data progress tidak ditemukan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pembimbing/progress');
    }

    $post   = $this->input->post();
    $update_progress = [ 'progress' => $post['progress'] ];
    $this->M_progress->update_progress($id, $update_progress);

    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di update.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('pembimbing/progress');
  }

  public function delete($id=null) {
    if(!isset($id)) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Id progress tidak valid.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pembimbing/progress');
    };
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_progress->get_one_progress($id);
    if (!$get_data) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data progress tidak ditemukan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pembimbing/progress');
    }

    $this->M_progress->delete_progress($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('pembimbing/progress');
  }

}