<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') === 1) { 
      redirect('admin'); 
    } else if ($this->session->userdata('role_id') === 2) {
      redirect('peserta'); 
    } else if ($this->session->userdata('role_id') === 3) {
      redirect('pembimbing'); 
    }

    $this->load->library('form_validation');
  }
  public function index() {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login | ATENSI';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      // validasinya success
      $this->_login();
    }
  }

  private function _login() {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('users', ['email' => $email])->row_array();
    // usernya ada
    if ($user) {
        // jika usernya aktif
      if ($user['is_active'] == 1) {
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'user_id'   => $user['id'],
            'email'     => $user['email'],
            'role_id'   => intval($user['role_id']),
            'user_name' => $user['name']
          ];
          $this->session->set_userdata($data);

          if ($user['role_id'] == 1) {
            redirect('admin/dashboard');
          }
          if ($user['role_id'] == 3) {
            $mentor = $this->db->get_where('detail_mentor', ['user_id' => $user['id']])->result();
            $this->session->set_userdata([
              'mentor_id'   => $mentor[0]->id,
              'program_id'  => $mentor[0]->program_id
            ]);
            redirect('pembimbing/dashboard');
          } else {
            $member = $this->db->get_where('detail_member', ['user_id' => $user['id']])->result();
            $this->session->set_userdata(['member_id' => $member[0]->id]);
            redirect('peserta/dashboard');
          }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah! </div> ');
            redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email Tidak Aktif! </div> ');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar!</div> ');
      redirect('auth');
    }
  }


  // log out
  public function logout() {
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> kamu sudah keluar! </div> ');
    redirect('auth');
  }
}
