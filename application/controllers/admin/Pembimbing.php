<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembimbing extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 1) { redirect('auth'); }

    $this->load->model(['Admin/M_pembimbing']);
    $this->load->library(['form_validation', 'encryption']);
    $this->load->helper(['email']);
  }

  public function index() {

    $data = [
      'mentors'   => $this->M_pembimbing->get_all_pembimbing(),
			'content'   => 'admin/pembimbing/index',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function detail($id) {
    if(!isset($id)) show_404();

    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    
    $get_data = $this->M_pembimbing->get_one_pembimbing($id);
    if (!$get_data) {
      show_404();
    }

    $data = [
      'pembimbing' => $get_data[0],
			'content'		 => 'admin/pembimbing/detail',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function create() {
    $data = [
      'programs'  => $this->M_pembimbing->get_all_program(),
			'content'   => 'admin/pembimbing/create',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function store() {
    $validation = $this->form_validation->set_rules($this->save_validation())->run();

    if ($validation === false) {
      $data = [
        'programs'  => $this->M_pembimbing->get_all_program(),
        'content'   => 'admin/pembimbing/create',
      ];
      $this->load->view('admin/template/Template', $data);
    } else {
      $post   = $this->input->post();

      $insert_users = [
        'name'      => $post['name'],
        'email'     => $post['email'],
        'image'     => 'default.jpg',
        'password'  => password_hash('password', PASSWORD_DEFAULT),
        'role_id'   => 3,
        'is_active' => 1,
      ];

      $user_id = $this->M_pembimbing->save_user($insert_users);

      $insert_detail_mentor = [
        'user_id'             => $user_id,
        'name'                => $post['name'],
        'place_of_birth'      => $post['place_of_birth'],
        'date_of_birth'       => $post['date_of_birth'],
        'handphone'           => $post['handphone'],
        'email'               => $post['email'],
        'address'             => $post['address'],
        'program_id'          => $post['program_id'],
      ];

      $this->M_pembimbing->save_detail_mentor($insert_detail_mentor);
      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/pembimbing');
    }
  }

  public function edit($id) {
    if(!isset($id)) show_404();

    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_pembimbing->get_one_pembimbing($id);
    if (!$get_data) show_404();

    $data = [
      'pembimbing'  => $get_data[0],
      'programs'    => $this->M_pembimbing->get_all_program(),
			'content'		  => 'admin/pembimbing/edit',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function update($id) {
    if(!isset($id)) show_404();

    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_pembimbing->get_one_pembimbing($id);
    if (!$get_data) show_404();

    $validation = $this->form_validation->set_rules($this->update_validation())->run();

    if ($validation === false) {
      $data = [
        'pembimbing'  => $get_data[0],
        'programs'    => $this->M_pembimbing->get_all_program(),
        'content'		  => 'admin/pembimbing/edit',
      ];
      $this->load->view('admin/template/Template', $data);
    } else {
      $post   = $this->input->post();

      $update_detail_mentor = [
        'name'                => $post['name'],
        'place_of_birth'      => $post['place_of_birth'],
        'date_of_birth'       => $post['date_of_birth'],
        'handphone'           => $post['handphone'],
        'email'               => $post['email'],
        'address'             => $post['address'],
        'program_id'          => $post['program_id'],
      ];

      $this->M_pembimbing->update_detail_mentor($id, $update_detail_mentor);


      // update table user 
      $user_id = $get_data[0]->user_id;
      $update_user = [ 'name' => $post['name'] ];
      $this->M_pembimbing->update_user($user_id, $update_user);

      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di update.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/pembimbing');
    }
  }

  public function delete($id) {
    if(!isset($id)) show_404();
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_pembimbing->get_one_pembimbing($id);
    if (!$get_data) show_404();

    if ($get_data[0]->total_schedule != 0) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Pembimbing tidak bisa dihapus karena memliki jadwal program.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/pembimbing');
    }

    $this->M_pembimbing->delete_user($get_data[0]->user_id);
    $this->M_pembimbing->delete_mentor($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('admin/pembimbing');
  }


  private function save_validation() {
    return [
      [
        'field' 	=> 'name',
        'label'	  => 'Nama',
        'rules'	  => 'required|min_length[4]',
        'errors'	=> 
          [
            'required'    => '<b>%s<b/> tidak boleh kosong.',
            'min_length'  => '<b>%s<b/> minimal 4 huruf.'
          ]
      ],
      [
        'field' 	=> 'place_of_birth',
        'label'	  => 'Tempat Lahir',
        'rules'	  => 'required',
        'errors'	=> [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ], 
      [
        'field' 	=> 'date_of_birth',
        'label'	  => 'Tanggal Lahir',
        'rules'	  => 'required',
        'errors' 	=> [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'address',
        'label'	  => 'Alamat',
        'rules'	  => 'required',
        'errors' 	=>  [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'handphone',
        'label'	  => 'Nomor Telepon',
        'rules'	  => 'required|min_length[11]|max_length[15]',
        'errors' 	=>  [ 
          'required'    => '<b>%s</b> tidak boleh kosong.',
          'min_length'  => '<b>%s<b/> minimal 11 angka.',
          'max_length'  => '<b>%s<b/> maksimal 15 angka.'
        ]
      ],
      [
        'field' 	=> 'email',
        'label'	  => 'Email',
        'rules'	  => 'required|valid_email|is_unique[users.email]',
        'errors' 	=>  
          [ 
            'required'    => '<b>%s</b> tidak boleh kosong.',
            'valid_email' => '<b>%s</b> tidak valid.',
            'is_unique'   => '<b>%s</b> sudah digunakan.'
          ]
      ],
      [
        'field' 	=> 'program_id',
        'label'	  => 'Program',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'    => '<b>%s<b/> tidak boleh kosong.']
      ],
    ];
  }

  private function update_validation() {
    return [
      [
        'field' 	=> 'name',
        'label'	  => 'Nama',
        'rules'	  => 'required|min_length[4]',
        'errors'	=> 
          [
            'required'    => '<b>%s<b/> tidak boleh kosong.',
            'min_length'  => '<b>%s<b/> minimal 4 huruf.'
          ]
      ],
      [
        'field' 	=> 'place_of_birth',
        'label'	  => 'Tempat Lahir',
        'rules'	  => 'required',
        'errors'	=> [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ], 
      [
        'field' 	=> 'date_of_birth',
        'label'	  => 'Tanggal Lahir',
        'rules'	  => 'required',
        'errors' 	=> [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'address',
        'label'	  => 'Alamat',
        'rules'	  => 'required',
        'errors' 	=>  [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'handphone',
        'label'	  => 'Nomor Telepon',
        'rules'	  => 'required|min_length[11]|max_length[15]',
        'errors' 	=>  [ 
          'required'    => '<b>%s</b> tidak boleh kosong.',
          'min_length'  => '<b>%s<b/> minimal 11 angka.',
          'max_length'  => '<b>%s<b/> maksimal 15 angka.'
        ]
      ],
      [
        'field' 	=> 'email',
        'label'	  => 'Email',
        'rules'	  => 'required|valid_email',
        'errors' 	=>  
          [ 
            'required'    => '<b>%s</b> tidak boleh kosong.',
            'valid_email' => '<b>%s</b> tidak valid.',
          ]
      ],
      [
        'field' 	=> 'program_id',
        'label'	  => 'Program',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'    => '<b>%s<b/> tidak boleh kosong.']
      ],
    ];
  }

}