<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembimbing extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 2) { redirect('auth'); }

    $this->load->model(['Peserta/M_pembimbing']);
    $this->load->library(['encryption']);
  }

  public function index() {
    $data = [
      'mentors'   => $this->M_pembimbing->get_all_pembimbing(),
			'content'   => 'peserta/pembimbing/index',
		];
		$this->load->view('peserta/template/Template', $data);
  }

  public function detail($id=null) {
    if(!isset($id)) show_404();

    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    
    $get_data = $this->M_pembimbing->get_one_pembimbing($id);
    if (!$get_data) {
      show_404();
    }

    $data = [
      'pembimbing' => $get_data[0],
			'content'		 => 'peserta/pembimbing/detail',
		];
		$this->load->view('peserta/template/Template', $data);
  }

}