<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 2) { redirect('auth'); }

    $this->load->model(['Peserta/M_profile']);
  }

  public function index() {
    $data = [ 
      'profile' => $this->M_profile->get_profile($this->session->userdata('member_id'))[0],
      'content' => 'peserta/profile/index', 
    ];
		$this->load->view('peserta/template/Template', $data);
  }


  public function change_password() {
    $data = [ 
      'profile' => $this->M_profile->get_profile($this->session->userdata('member_id'))[0],
      'content' => 'peserta/profile/change_password', 
    ];
		$this->load->view('peserta/template/Template', $data);
  }

  public function update_password() {
    $validation = $this->form_validation->set_rules($this->update_validation())->run();

    if ($validation === false) {
      $data = [ 
        'profile' => $this->M_profile->get_profile($this->session->userdata('member_id'))[0],
        'content' => 'peserta/profile/change_password', 
      ];
      $this->load->view('peserta/template/Template', $data);
    } else {
      $post     = $this->input->post();
      $user_id  = $this->session->userdata('user_id');

      // get user by id session
      $user = $this->M_profile->get_user_by_id($user_id)[0];

      // check pasword bener nggak
      $verification = password_verify($post['current_password'], $user->password);
      if (!$verification) {
        $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password yang anda masukkan salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			  redirect('peserta/profile/change-password');
      } else {
        $new_password =  password_hash($post['new_password'], PASSWORD_DEFAULT);
        $this->M_profile->update_password($user_id, $new_password);
        
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password berhasil di update.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			  redirect('peserta/profile/change-password');
      }
    }

  }



  private function update_validation() {
    return [
      [
        'field' 	=> 'current_password',
        'label'	  => 'Password Sekarang',
        'rules'	  => 'required|min_length[8]',
        'errors'	=> 
          [
            'required'    => '<b>%s<b/> tidak boleh kosong.',
            'min_length'  => '<b>%s<b/> minimal 8 karakter.'
          ]
      ],
      [
        'field' 	=> 'new_password',
        'label'	  => 'Password Baru',
        'rules'	  => 'required|trim|min_length[8]|matches[confirm_password]',
        'errors'	=> [ 
          'required'    => '<b>%s</b> tidak boleh kosong.',
          'min_length'  => '<b>%s<b/> minimal 8 karakter.',
          'matches'     => '<b>%s</b> tidak sama dengan konfirmasi password.',
        ]
      ], 
      [
        'field' 	=> 'confirm_password',
        'label'	  => 'Konfirmasi Password',
        'rules'	  => 'required',
        'errors'	=> [ 'required'    => '<b>%s</b> tidak boleh kosong.', ]
      ], 
    ];
  }

}