<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) { redirect('auth'); }
        $this->load->library('form_validation');
        $this->load->model('pendaftaran_model');
        $this->load->model('daftarnama_model');
        $this->load->model('jadwalprogram_model');
        $this->load->model('pembimbing_model');
        $this->load->model('pdf_model');
        $this->load->model('profile_model');
    }

    public function index()
    {
        $data['title'] = 'ATENSI';
        $email = $this->session->userdata('email');
        $pdf_data = $this->db->get_where('pendaftaran', ['email' => $email])->row_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        if ($pdf_data) {

            $data['pdf'] = $this->db->get_where('pendaftaran', ['email' => $this->session->userdata('email')])->row_array();
            // Jika data ada dalam 'pendaftaran' table
            $this->load->view('templates_user/header', $data);
            $this->load->view('templates_user/sidebar', $data);
            $this->load->view('templates_user/topbar', $data);
            $this->load->view('user/index', $data); // Menampilkan form profil
            $this->load->view('templates_user/footer');
        } else {
            // Jika data tidak ada dalam 'pendaftaran' table
            $this->load->view('templates_user/header', $data);
            $this->load->view('templates_user/sidebar', $data);
            $this->load->view('templates_user/topbar', $data);
            $this->load->view('user/pendaftaran', $data); // Menampilkan form pendaftaran
            $this->load->view('templates_user/footer');
        }
    }
    // public function index()
    // {
    //     $data['title'] = 'ATENSI';
    //     $data['pdf'] = $this->db->get_where('pendaftaran', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->load->view('templates_user/header', $data);
    //     $this->load->view('templates_user/sidebar', $data);
    //     $this->load->view('templates_user/topbar', $data);
    //     $this->load->view('user/index', $data);
    //     $this->load->view('templates_user/footer');
    // }

    public function pendaftaran()
    {


        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[10]|is_unique[pendaftaran.nik]', [
            'is_unique' => 'NIK Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('namalengkap', 'Namalengkap', 'required|trim');
        $this->form_validation->set_rules('tempatlahir', 'Tempatlahir', 'required|trim');
        $this->form_validation->set_rules('tanggallahir', 'Tanggallahir', 'required|trim');
        $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('namaort', 'Namaort', 'required|trim');
        $this->form_validation->set_rules('domisili', 'Domisili', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telpon', 'telpon', 'required|trim|max_length[13]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'ATENSI';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates_user/header', $data);
            $this->load->view('templates_user/sidebar', $data);
            $this->load->view('templates_user/topbar', $data);
            $this->load->view('user/pendaftaran', $data);
            $this->load->view('templates_user/footer');
        } else {
            $this->pendaftaran_model->pendaftaranmodel();
            $this->session->set_flashdata('pendaftaran', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sudah Tersimpan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
            redirect('user/index');
        }
    }

    public function biodata()
    {
        $data['domisili']   = ['', 'Kab.Bekasi', 'Kota Bogor', 'Kab.Purwakarta', 'Kab.Karawang', 'Kab.Kuningan'];
        $data['agama']      = ['', 'Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'konghucu'];
        $data['jkelamin']   = ['', 'Pria', 'Wanita'];

        $this->form_validation->set_rules('namalengkap', 'Namalengkap', 'required|trim');
        $this->form_validation->set_rules('tempatlahir', 'Tempatlahir', 'required|trim');
        $this->form_validation->set_rules('tanggallahir', 'Tanggallahir', 'required|trim');
        $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('namaort', 'Namaort', 'required|trim');
        $this->form_validation->set_rules('domisili', 'Domisili', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telpon', 'telpon', 'required|trim|max_length[13]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'ATENSI';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pdf'] = $this->db->get_where('pendaftaran', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates_user/header', $data);
            $this->load->view('templates_user/sidebar', $data);
            $this->load->view('templates_user/topbar', $data);
            $this->load->view('user/biodata', $data);
            $this->load->view('templates_user/footer');
        } else {
            $this->pendaftaran_model->biodatamodel();
            $this->session->set_flashdata('pendaftaran', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sudah Diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
            redirect('user/biodata');
        }
    }

    public function jprogram()
    {
        // manggil Table
        $data['jprogram'] = $this->jadwalprogram_model->getAlljprogram('jadwalprogram');
        $data['title'] = 'ATENSI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
        $this->load->view('user/jprogram', $data);
        $this->load->view('templates_user/footer');
    }

    // Table pembimbing//////////////////////////////////
    public function pembimbing()
    {
        $data['pembimbing'] = $this->pembimbing_model->getAllpembimbing('pembimbing');
        $data['title'] = 'ATENSI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
        $this->load->view('user/pembimbing', $data);
        $this->load->view('templates_user/footer');
    }

    public function gantipassword()
    {
        $this->form_validation->set_rules('current_password', 'current_password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'new_password1', 'required|trim|min_length[3]|matches[new_password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'password too short!'
        ]);
        $this->form_validation->set_rules('new_password2', 'new_password2', 'required|trim|min_length[3]|matches[new_password1]');
        $data['title'] = 'ATENSI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_user/header', $data);
            $this->load->view('templates_user/sidebar', $data);
            $this->load->view('templates_user/topbar', $data);
            $this->load->view('user/gantipw', $data);
            $this->load->view('templates_user/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('gantipassword', '<div class="alert alert-danger alert-dismissible" role="alert">
                          Password Salah!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>');
                redirect('user/gantipassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('gantipassword', '<div class="alert alert-danger alert-dismissible" role="alert">
                          Password Sama!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>');
                    redirect('user/gantipassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('gantipassword', '<div class="alert alert-success alert-dismissible" role="alert">
                          Password Berhasil Di Ubah!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>');
                    redirect('auth');
                }
            }
        }
    }

    public function print()
    {
        // manggil Table
        $data['pdfuser'] = $this->db->get_where('pendaftaran', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'ATENSI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('PDF/pdfuser', $data);
        $paper_size = 'A4';
        $orientation = 'potret';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan.pdf", array('Attachment' => 0));
    }
}
