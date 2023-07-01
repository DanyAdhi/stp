<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 2) { redirect('auth'); }

    $this->load->model(['Peserta/M_jadwal']);
  }

  public function index() {
    $data = [
      'schedulers'  => $this->M_jadwal->get_all_jadwal(),
			'content'     => 'peserta/jadwal/index',
		];
		$this->load->view('peserta/template/Template', $data);
  }

}