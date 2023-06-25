<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admins extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
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
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar', $data);
    $this->load->view('templates_admin/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates_admin/footer');
  }

  // public function pendaftaran()
  // {
  //   $this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[16]|is_unique[pendaftaran.nik]', [
  //     'is_unique' => 'NIK Sudah Terdaftar!'
  //   ]);
  //   $this->form_validation->set_rules('namalengkap', 'Namalengkap', 'required|trim');
  //   $this->form_validation->set_rules('tempatlahir', 'Tempatlahir', 'required|trim');
  //   $this->form_validation->set_rules('tanggallahir', 'Tanggallahir', 'required|trim');
  //   $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required|trim');
  //   $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
  //   $this->form_validation->set_rules('namaort', 'Namaort', 'required|trim');
  //   $this->form_validation->set_rules('domisili', 'Domisili', 'required|trim');
  //   $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
  //   $this->form_validation->set_rules('telpon', 'telpon', 'required|trim|max_length[13]');

  //   if ($this->form_validation->run() == false) {
  //     $data['title'] = 'ATENSI';
  //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  //     $this->load->view('templates_admin/header', $data);
  //     $this->load->view('templates_admin/sidebar', $data);
  //     $this->load->view('templates_admin/topbar', $data);
  //     $this->load->view('admin/pendaftaran', $data);
  //     $this->load->view('templates_admin/footer');
  //   } else {
  //     $this->pendaftaran_model->pendaftaranmodel();
  //     $this->session->set_flashdata('pendaftaran', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  //           Data Sudah Tersimpan!
  //           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  //             <span aria-hidden="true">&times;</span>
  //           </button>
  //         </div> ');
  //     redirect('admin/pendaftaran');
  //   }
  // }

  public function daftarnama()
  {
    // manggil Table
    $data['daftarnama'] = $this->daftarnama_model->getAllDaftarnama('pendaftaran');
    $data['title'] = 'ATENSI';
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar', $data);
    $this->load->view('templates_admin/topbar', $data);
    $this->load->view('admin/daftarnama', $data);
    $this->load->view('templates_admin/footer');
  }

  public function editdaftarnama($id)
  {
    $data['editnama'] = $this->daftarnama_model->getDaftarnmById($id);
    $data['domisili'] = ['Kab.Bekasi', 'Kota Bogor', 'Kab.Purwakarta', 'Kab.Karawang', 'Kab.Kuningan'];
    $data['jkelamin'] = ['Pria', 'Wanita'];

    $this->form_validation->set_rules('namalengkap', 'Namalengkap', 'required|trim');
    $this->form_validation->set_rules('tempatlahir', 'Tempatlahir', 'required|trim');
    $this->form_validation->set_rules('tanggallahir', 'Tanggallahir', 'required|trim');
    $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required|trim');
    $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
    $this->form_validation->set_rules('namaort', 'Namaort', 'required|trim');
    $this->form_validation->set_rules('domisili', 'Domisili', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('telpon', 'Telpon', 'required|trim|max_length[13]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'ATENSI';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates_admin/header', $data);
      $this->load->view('templates_admin/sidebar', $data);
      $this->load->view('templates_admin/topbar', $data);
      $this->load->view('admin/editnama', $data);
      $this->load->view('templates_admin/footer');
    } else {
      $this->daftarnama_model->editnama();
      $this->session->set_flashdata('pendaftaran', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sudah Di Ubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
      redirect('admin/daftarnama');
    }
  }

  public function hapus($id)
  {
    $this->daftarnama_model->hapusnama($id);
    $this->session->set_flashdata('pendaftaran', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Sudah Di Hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> ');
    redirect('admin/daftarnama');
  }



  // Table////////////////////////////////////////////////////////////////
  public function jprogram()
  {
    $this->form_validation->set_rules('program', 'program', 'required|trim');
    $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
    $this->form_validation->set_rules('jam', 'Jam', 'required|trim');

    if ($this->form_validation->run() == false) {
      // manggil Table
      $data['jprogram'] = $this->jadwalprogram_model->getAlljprogram('jadwalprogram');
      $data['title'] = 'ATENSI';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates_admin/header', $data);
      $this->load->view('templates_admin/sidebar', $data);
      $this->load->view('templates_admin/topbar', $data);
      $this->load->view('admin/jprogram', $data);
      $this->load->view('templates_admin/footer');
    } else {
      $this->jadwalprogram_model->jprogram();
      $this->session->set_flashdata('jprogram', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sudah Tersimpan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
      redirect('admin/jprogram');
    }
  }

  public function editjprogram($id)
  {
    $data['editjprogram'] = $this->jadwalprogram_model->GetProgramById($id);
    $data['program'] = ['Kosmetik Massage', 'Keterampilan', 'Shiatshu', 'Komputer Braille', 'Refleksi'];
    $this->form_validation->set_rules('program', 'program', 'required|trim');
    $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
    $this->form_validation->set_rules('jam', 'Jam', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'ATENSI';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates_admin/header', $data);
      $this->load->view('templates_admin/sidebar', $data);
      $this->load->view('templates_admin/topbar', $data);
      $this->load->view('admin/editjprogram', $data);
      $this->load->view('templates_admin/footer');
    } else {
      $this->jadwalprogram_model->editjprogram();
      $this->session->set_flashdata('jprogram', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sudah Di Ubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
      redirect('admin/jprogram');
    }
  }

  public function hapusjprogram($id)
  {
    $this->jadwalprogram_model->hapusjprogram($id);
    $this->session->set_flashdata('jprogram', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Sudah Di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
    redirect('admin/jprogram');
  }



  // Table pembimbing//////////////////////////////////
  public function pembimbing()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('tempatlahir', 'Tempatlahir', 'required|trim');
    $this->form_validation->set_rules('tanggallahir', 'tanggallahir', 'required|trim');
    $this->form_validation->set_rules('kontak', 'kontak', 'required|trim');
    $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
    $this->form_validation->set_rules('program', 'program', 'required|trim');

    if ($this->form_validation->run() == false) {
      // manggil Table
      $data['pembimbing'] = $this->pembimbing_model->getAllpembimbing('pembimbing');
      $data['title'] = 'ATENSI';
      $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates_admin/header', $data);
      $this->load->view('templates_admin/sidebar', $data);
      $this->load->view('templates_admin/topbar', $data);
      $this->load->view('admin/pembimbing', $data);
      $this->load->view('templates_admin/footer');
    } else {
      $this->session->set_flashdata('pembimbing', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sudah Disimpan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
      $this->pembimbing_model->pembimbing();
      redirect('admin/pembimbing');
    }
  }

  public function editpembimbing($id)
  {
    $data['editpembimbing'] = $this->pembimbing_model->GetPembimbingById($id);
    $data['program'] = ['Kosmetik Massage', 'Keterampilan', 'Shiatshu', 'Komputer Braille', 'Refleksi'];
    $this->form_validation->set_rules('nama', 'Nama Pembimbing', 'required|trim');
    $this->form_validation->set_rules('tempatlahir', 'Tempatlahir', 'required|trim');
    $this->form_validation->set_rules('tanggallahir', 'tanggallahir', 'required|trim');
    $this->form_validation->set_rules('kontak', 'kontak', 'required|trim');
    $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
    $this->form_validation->set_rules('program', 'program', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'ATENSI';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates_admin/header', $data);
      $this->load->view('templates_admin/sidebar', $data);
      $this->load->view('templates_admin/topbar', $data);
      $this->load->view('admin/editpembimbing', $data);
      $this->load->view('templates_admin/footer');
    } else {
      $this->pembimbing_model->editpembimbing();
      $this->session->set_flashdata('pembimbing', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sudah Di Ubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
      redirect('admin/pembimbing');
    }
  }

  public function hapuspembimbing($id)
  {
    $this->pembimbing_model->hapuspembimbing($id);
    $this->session->set_flashdata('pembimbing', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Sudah Di Hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> ');
    redirect('admin/pembimbing');
  }

  // pdf daftar nama/////////////////
  public function pdf()
  {
    // manggil Table
    $data['daftarnama'] = $this->daftarnama_model->getAllDaftarnama('pendaftaran');
    $data['title'] = 'ATENSI';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('PDF/daftarnamapdf', $data);
    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Laporan.pdf", array('Attachment' => 0));
  }

  public function pdf1()
  {
    // manggil Table
    $data['daftarnama'] = $this->daftarnama_model->getAllDaftarnama('pendaftaran');
    $data['title'] = 'ATENSI';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('PDF/daftarnamapdf', $data);
  }


  public function print($id)
  {
    $data['pdfuser'] = $this->daftarnama_model->GetDaftarnmById($id);
    $this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[16]|is_unique[pendaftaran.nik]', [
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
    $this->form_validation->set_rules('telpon', 'Telpon', 'required|trim|max_length[13]');

    if ($this->form_validation->run() == false) {
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
    } else {
      $this->daftarnama_model->editnama();
    }
  }
  // public function print($id)
  // {
  //   $data['pdfuser'] = $this->daftarnama_model->GetDaftarnmById($id);
  //   $this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[16]|is_unique[pendaftaran.nik]', [
  //     'is_unique' => 'NIK Sudah Terdaftar!'
  //   ]);
  //   $this->form_validation->set_rules('namalengkap', 'Namalengkap', 'required|trim');
  //   $this->form_validation->set_rules('tempatlahir', 'Tempatlahir', 'required|trim');
  //   $this->form_validation->set_rules('tanggallahir', 'Tanggallahir', 'required|trim');
  //   $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required|trim');
  //   $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
  //   $this->form_validation->set_rules('namaort', 'Namaort', 'required|trim');
  //   $this->form_validation->set_rules('domisili', 'Domisili', 'required|trim');
  //   $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
  //   $this->form_validation->set_rules('telpon', 'Telpon', 'required|trim|max_length[13]');

  //   if ($this->form_validation->run() == false) {
  //     $data['title'] = 'ATENSI';
  //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  //     $this->load->view('PDF/pdfuser', $data);
  //   } else {

  //     $this->daftarnama_model->editnama();

  //     redirect('PDF/pdfuser');
  //   }
  // }

  public function gantipassword()
  {
    $this->form_validation->set_rules('current_password', 'current_password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'new_password1', 'required|trim|min_length[3]|matches[new_password2]', [
      'matches' => 'Password dont match!',
      'min_length' => 'password too short!'
    ]);
    $this->form_validation->set_rules('new_password2', 'new_password2', 'required|trim|min_length[3]|matches[new_password1]');
    $data['title'] = 'ATENSI';
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    if ($this->form_validation->run() == false) {
      $this->load->view('templates_admin/header', $data);
      $this->load->view('templates_admin/sidebar', $data);
      $this->load->view('templates_admin/topbar', $data);
      $this->load->view('admin/gantipw', $data);
      $this->load->view('templates_admin/footer');
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
        redirect('admin/gantipassword');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('gantipassword', '<div class="alert alert-danger alert-dismissible" role="alert">
                          Password Sama!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>');
          redirect('admin/gantipassword');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('users');

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

  public function profile()
  {
    $data['user'] = $this->profile_model->getAllprofile();
    $data['title'] = 'ATENSI';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('namalengkap', 'namalengkap', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates_admin/header', $data);
      $this->load->view('templates_admin/sidebar', $data);
      $this->load->view('templates_admin/topbar', $data);
      $this->load->view('admin/profile', $data);
      $this->load->view('templates_admin/footer');
    } else {
      $namalengkap = $this->input->post('namalengkap');
      $email = $this->input->post('email');

      // cek jika ada gambar yang akan diupload
      $upload_image = $_FILES['image'];

      if ($upload_image) {
        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 8000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
          $new_image = $this->upload->data('file_namalengkap');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('namalengkap', $namalengkap);
      $this->db->where('email', $email);
      $this->db->update('user');

      // if ($upload_image) {
      //     $config['allowed_types'] = 'gif|jpg|png';
      //     $config['max_size'] = '2048';
      //     $config['upload_path'] = './assets/img/profile/';

      //     $this->load->library('upload', $config);

      //     if ($this->upload->do_upload('image')) {
      //         $new_image = $this->upload->data('file_name');
      //         $this->db->set('image', $new_image);
      //     } else {
      //         echo $this->upload->dispay_error();
      //     }
      // }

      $this->session->set_flashdata('profile', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Profile Berhasil Di Ubah !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> ');
      redirect('admin/profile');
      // $this->profile_model->editprofile();
      // redirect('admin/profile');
    }
  }
}
