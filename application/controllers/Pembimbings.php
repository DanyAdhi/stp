<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pembimbing extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'ATENSI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pembimbing/header', $data);
        $this->load->view('templates_pembimbing/sidebar', $data);
        $this->load->view('templates_pembimbing/topbar', $data);
        $this->load->view('pembimbing/index', $data);
        $this->load->view('templates_pembimbing/footer');
    }
}
