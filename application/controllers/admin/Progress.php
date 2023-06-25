<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 1) { redirect('auth'); }

    $this->load->model(['Admin/M_progress']);
    $this->load->library(['form_validation', 'encryption']);

  }

  public function index() {
    $data = [
      'progress'  => $this->M_progress->get_all_progress(),
      'content'   => 'admin/progress/index',
    ];
    $this->load->view('admin/template/Template', $data);

  }

}