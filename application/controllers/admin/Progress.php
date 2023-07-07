<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 1) { redirect('auth'); }

    $this->load->model(['Admin/M_progress']);
    $this->load->library(['form_validation', 'encryption', 'session', 'Pdfgenerator']);

  }

  public function index() {
    $data = [
      'progress'  => $this->M_progress->get_all_progress(),
      'content'   => 'admin/progress/index',
    ];
    $this->load->view('admin/template/Template', $data);
  }

  public function print() {
    $get = $this->input->get();

    $data = [
      'programs'  => $this->M_progress->get_all_program(),
      'content'   => 'admin/progress/print',
    ];

    if (count($get) == 0) {
      $data['progress'] = [];
    } else {
      $data['progress'] = $this->M_progress->get_progress_by_filter($get['program_id'], $get['start_date'], $get['end_date']);
    }

    $this->load->view('admin/template/Template', $data);
  }

  public function print_pdf() {
    $get = $this->input->get();

    $program_id = $get['program_id'];
    $start_date = $get['start_date'];
    $end_date   = $get['end_date'];

    if (!$program_id || !$start_date || !$end_date) {
      $this->session->set_flashdata('close', '<div></div>');
      redirect('admin/progress/print');
    } else {
      $validation = $this->print_validation($program_id, $start_date, $end_date);
      if (!$validation) {
        $this->session->set_flashdata('close', '<div></div>');
        redirect('admin/progress/print');
      }

      // get data
      $get_data = $this->M_progress->get_progress_by_filter($program_id, $start_date, $end_date);
      if (!$get_data) {
        $this->session->set_flashdata('close', '<div></div>');
        redirect('admin/progress/print');
      }
    
// var_dump($get_data[0]);die;
      // title dari pdf
      $data = [ 
        'title'     => 'Laporan Progress Peserta',
        'program'   => $get_data[0]->program,
        'progress'  => $get_data 
      ];
        
      // filename dari pdf ketika didownload
      $file_pdf = 'Laporan_Progress_Peserta';
      $paper = 'A4';
      $orientation = "portrait";
      
      $html = $this->load->view('admin/progress/report_pdf', $data, true);	    
      
      // run dompdf
      $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

      
    }

  }

  public function print_validation($program_id, $start_date, $end_date) {
    if (!$program_id || !$start_date || !$end_date) {
      return false;
    } else {
      if (!is_numeric($program_id)) return false;
      if (!strtotime($start_date)) return false;
      if (!strtotime($end_date)) return false;
      return true;
    }
  }

}