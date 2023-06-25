<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 1) { redirect('auth'); }

    $this->load->model(['Admin/M_dashboard']);
    $this->load->library('form_validation');
  }

  public function index() {

    $data = [
      'count_member'          => $this->M_dashboard->get_count_member(),
      'count_mentor'          => $this->M_dashboard->get_count_mentor(),
      'count_archive_member'  => $this->M_dashboard->get_count_archive_member(),
			'content'		            => 'admin/dashboard/index',
		];
		$this->load->view('admin/template/Template', $data);
  }

}