<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 2) { redirect('auth'); }
  }

  public function index() {
    $data = [ 'content' => 'peserta/dashboard/index', ];
		$this->load->view('peserta/template/Template', $data);
  }

}