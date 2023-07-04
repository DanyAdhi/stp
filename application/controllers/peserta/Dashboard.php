<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 2) { redirect('auth'); }

    $this->load->model(['Peserta/M_dashboard']);
  }

  public function index() {

    $data = [ 
      'content'   => 'peserta/dashboard/index',
      'progress'  => $this->M_dashboard->get_progress_member($this->session->userdata('member_id')),
    ];
		$this->load->view('peserta/template/Template', $data);
  }

}