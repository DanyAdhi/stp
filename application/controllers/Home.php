<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'ATENSI';
        $this->load->view('tampilan/index', $data); // Menampilkan form profil
    }
}
