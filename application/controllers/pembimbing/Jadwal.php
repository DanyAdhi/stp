<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 3) { redirect('auth'); }

    $this->load->model(['Pembimbing/M_jadwal']);
  }

  public function index() {
    $data = [
      'schedulers'  => $this->M_jadwal->get_all_jadwal_by_mentor_id($this->session->userdata('mentor_id')),
			'content'     => 'pembimbing/jadwal/index',
		];
		$this->load->view('pembimbing/template/Template', $data);
  }

}