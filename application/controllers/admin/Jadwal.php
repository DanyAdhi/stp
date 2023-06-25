<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 1) { redirect('auth'); }

    $this->load->model(['Admin/M_jadwal']);
    $this->load->library(['form_validation', 'encryption']);
  }

  public function index() {
    $data = [
      'schedulers'  => $this->M_jadwal->get_all_jadwal(),
			'content'     => 'admin/jadwal/index',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function create() {
    $data = [
      'mentors'   => $this->M_jadwal->get_all_mentor(),
      'programs'  => $this->M_jadwal->get_all_program(),
      'days'      => $this->M_jadwal->get_all_day(),
			'content'   => 'admin/jadwal/create',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function store() {
    $validation 	= $this->form_validation->set_rules($this->save_validation())->run();

    if ($validation === false) {
      $data = [
        'mentors'   => $this->M_jadwal->get_all_mentor(),
        'programs'  => $this->M_jadwal->get_all_program(),
        'days'      => $this->M_jadwal->get_all_day(),
        'content'   => 'admin/jadwal/create',
      ];
      $this->load->view('admin/template/Template', $data);
    } else {
      $post   = $this->input->post();

      $insert_program_schedule = [
        'program_id'  => $post['program_id'],
        'days_id'     => $post['days_id'],
        'start_time'  => $post['start_time'],
        'end_time'    => $post['end_time'],
        'mentor_id'   => $post['mentor_id'],
      ];
      
      $this->M_jadwal->save_program_schedule($insert_program_schedule);
      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/jadwal');
    }

  }

  public function edit($id) {
    if (!isset($id)) show_404();
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_jadwal->get_one_jadwal($id);
    if (!$get_data) show_404();

    $start_time = strtotime($get_data[0]->start_time);
    $end_time   = strtotime($get_data[0]->end_time);

    $get_data[0]->start_time  = date('H:i', $start_time);
    $get_data[0]->end_time    = date('H:i', $end_time);
   
    $data = [
      'jadwal'    => $get_data[0],
      'mentors'   => $this->M_jadwal->get_mentor_by_program($get_data[0]->program_id),
      'programs'  => $this->M_jadwal->get_all_program(),
      'days'      => $this->M_jadwal->get_all_day(),
			'content'		=> 'admin/jadwal/edit',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function update($id) {
    if (!isset($id)) show_404();
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_jadwal->get_one_jadwal($id);
    if (!$get_data) show_404();

    $validation = $this->form_validation->set_rules($this->update_validation())->run();
    if ($validation === false) {
      $start_time = strtotime($get_data[0]->start_time);
      $end_time   = strtotime($get_data[0]->end_time);

      $get_data[0]->start_time  = date('H:i', $start_time);
      $get_data[0]->end_time    = date('H:i', $end_time);
    
      $data = [
        'jadwal'    => $get_data[0],
        'mentors'   => $this->M_jadwal->get_all_mentor(),
        'programs'  => $this->M_jadwal->get_all_program(),
        'days'      => $this->M_jadwal->get_all_day(),
        'content'		=> 'admin/jadwal/edit',
      ];
      $this->load->view('admin/template/Template', $data);
    } else {
      $post   = $this->input->post();

      $update_program_schedule = [
        'program_id'  => $post['program_id'],
        'days_id'     => $post['days_id'],
        'start_time'  => $post['start_time'],
        'end_time'    => $post['end_time'],
        'mentor_id'   => $post['mentor_id'],
      ];
      $this->M_jadwal->update_program_schedule($id, $update_program_schedule);

      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di update.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/jadwal');
    }

  }

  public function delete($id) {
    if (!isset($id)) show_404();
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_jadwal->get_one_jadwal($id);
    if (!$get_data) show_404();

    $this->M_jadwal->delete_program_schedule($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('admin/jadwal');
  }


  // return json
  public function get_mentor_by_program($program_id) {
    $result = [
      'code'  => 404,
      'data'  => []
    ];
    
    if (!isset($program_id)) {
      echo json_encode($result);
    }
    
    $get_data = $this->M_jadwal->get_mentor_by_program($program_id);
    if (!$get_data) {
      echo json_encode($result);
    } else {
      $result['code'] = 200;
      $result['data'] = $get_data;
      echo json_encode($result);
    }
  }

  private function save_validation() {
    return [
      [
        'field' 	=> 'program_id',
        'label'	  => 'Program',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
      [
        'field' 	=> 'days_id',
        'label'	  => 'Hari',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
      [
        'field' 	=> 'start_time',
        'label'	  => 'Jam Mulai',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
      [
        'field' 	=> 'end_time',
        'label'	  => 'Jam Selesai',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
      [
        'field' 	=> 'mentor_id',
        'label'	  => 'Pembimbing',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
    ];
  }

  private function update_validation() {
    return [
      [
        'field' 	=> 'program_id',
        'label'	  => 'Program',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
      [
        'field' 	=> 'days_id',
        'label'	  => 'Hari',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
      [
        'field' 	=> 'start_time',
        'label'	  => 'Jam Mulai',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
      [
        'field' 	=> 'end_time',
        'label'	  => 'Jam Selesai',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
      [
        'field' 	=> 'mentor_id',
        'label'	  => 'Pembimbing',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
    ];
  }

}