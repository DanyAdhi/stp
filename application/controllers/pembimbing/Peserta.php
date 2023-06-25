<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 3) { redirect('auth'); }

    $this->load->model(['Pembimbing/M_peserta']);
    $this->load->library(['encryption']);
  }

  public function index() {
    $data = [
      'users'      => $this->M_peserta->get_all_peserta(),
			'content'		 => 'pembimbing/peserta/index',
		];
		$this->load->view('pembimbing/template/Template', $data);
  }

  public function detail($id) {
    if(!isset($id)) show_404();

    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    // get detail peserta
    $get_data = $this->M_peserta->get_one_peserta($id);
    if (!$get_data) {
      show_404();
    }

    $data = [
      'peserta'    => $get_data[0],
			'content'		 => 'pembimbing/peserta/detail',
		];
		$this->load->view('pembimbing/template/Template', $data);
  }

  public function arsip() {
    $data = [
      'users'      => $this->M_peserta->get_peserta_done(),
			'content'		 => 'admin/peserta/archive',
		];
		$this->load->view('admin/template/Template', $data);
  }

}