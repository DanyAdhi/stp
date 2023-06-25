<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		// if ($this->session->userdata('masuk') != TRUE) { redirect(base_url('')); };
		
		$this->load->model(['Admin/M_dashboard']);
	}
	public function index() {


		$data = [
			'content'		=> 'admin/dashboard/index',
			'jadwal'		=> $this->M_dashboard->getJadwalProgram()
		];
		$this->load->view('templates_admin/new/Template', $data);

	}
}
