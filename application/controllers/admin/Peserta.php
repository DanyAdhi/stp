<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role_id') !== 1) { redirect('auth'); }

    $this->load->model(['Admin/M_peserta']);
    $this->load->library(['form_validation', 'encryption']);
    $this->load->helper(['email']);
  }

  public function index() {
    $data = [
      'users'      => $this->M_peserta->get_all_peserta(),
			'content'		 => 'admin/peserta/index',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function detail($id) {
    if(!isset($id)) show_404();

    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    // get detail peserta
    $get_data = $this->M_peserta->get_one_peserta($id);
    if (!$get_data) {
      show_404();
    }

    $data = [
      'peserta'    => $get_data[0],
			'content'		 => 'admin/peserta/detail',
		];
		$this->load->view('admin/template/Template', $data);
  }

  public function create() {
    $check_period = $this->check_period();
    
    $data = [
      'content'		=> 'admin/peserta/create',
      'religions' => $this->getAllReligion(),
      'domicile'  => $this->M_peserta->get_all_domicile(),
    ];
    $this->load->view('admin/template/Template', $data);
  }

  public function store() {

    $validation 	= $this->form_validation->set_rules($this->save_validation())->run();    

    if ($validation === false) {
      $data = [
        'content'   => 'admin/peserta/create',
        'religions' => $this->getAllReligion(),
        'domicile'  => $this->M_peserta->get_all_domicile()
      ];
      $this->load->view('admin/template/Template', $data);
    } else {    

      $check_period = $this->check_period();

      $post   = $this->input->post();

      $insert_users = [
        'name'      => $post['name'],
        'email'     => $post['email'],
        'image'     => 'default.jpg',
        'password'  => password_hash('password', PASSWORD_DEFAULT),
        'role_id'   => 2,
        'is_active' => 1,
      ];

      $user_id = $this->M_peserta->save_user($insert_users);

      $insert_detail_member = [
        'user_id'             => $user_id,
        'nik'                 => $post['nik'],
        'name'                => $post['name'],
        'place_of_birth'      => $post['place_of_birth'],
        'date_of_birth'       => $post['date_of_birth'],
        'gender'              => $post['gender'],
        'religion'            => $post['religion'],
        'parents_name'        => $post['parents_name'],
        'domicile'            => $post['domicile'],
        'address'             => $post['address'],
        'handphone'           => $post['handphone'],
        'email'               => $post['email'],
        'ktp'                 => $this->uploadImage($user_id, 'ktp'),
        'kk'                  => $this->uploadImage($user_id, 'kk'),
        'medical_certificate' => $this->uploadImage($user_id, 'medical_certificate'),
        'program_period_id'   => $check_period,
      ];

      $this->M_peserta->save_detail_member($insert_detail_member);
      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/peserta');
    }

  }

  public function edit ($id) {
    if(!isset($id)) show_404();
    
    $id	=	str_replace(['-','_','~',],['=','+','/'], $id);
    $id	=	$this->encryption->decrypt($id);

    $get_data = $this->M_peserta->get_one_peserta($id);
    if (!$get_data) {
      show_404();
    }

    $data = [
      'peserta'   => $get_data[0],
      'religions' => $this->getAllReligion(),
      'domicile'  => $this->M_peserta->get_all_domicile(),
			'content'		=> 'admin/peserta/edit',
		];
		$this->load->view('admin/template/Template', $data);

  }

  public function update($user_id) {
    if(!isset($user_id)) show_404();
    
    $user_id	=	str_replace(['-','_','~',],['=','+','/'], $user_id);
    $user_id	=	$this->encryption->decrypt($user_id);

    $get_data = $this->M_peserta->get_one_peserta($user_id);
    if (!$get_data) {
      show_404();
    }

    $validation = $this->form_validation->set_rules($this->update_validation())->run();

    if ($validation === false) {
      $data = [
        'peserta'   => $get_data[0],
        'religions' => $this->getAllReligion(),
        'domicile'  => $this->M_peserta->get_all_domicile(),
        'content'		=> 'admin/peserta/edit',
      ];
      $this->load->view('admin/template/Template', $data);
    } else {
      $post   = $this->input->post();
      $update_detail_member = [
        'nik'                 => $post['nik'],
        'name'                => $post['name'],
        'place_of_birth'      => $post['place_of_birth'],
        'date_of_birth'       => $post['date_of_birth'],
        'gender'              => $post['gender'],
        'religion'            => $post['religion'],
        'parents_name'        => $post['parents_name'],
        'domicile'            => $post['domicile'],
        'address'             => $post['address'],
        'handphone'           => $post['handphone'],
        'email'               => $post['email'],
      ];

      if ($_FILES['ktp']['name'] !== '') {
        $update_detail_member['ktp'] = $this->uploadImage($user_id, 'ktp');
      }
      if ($_FILES['kk']['name'] !== '') {
        $update_detail_member['kk'] = $this->uploadImage($user_id, 'kk');
      }
      if ($_FILES['medical_certificate']['name'] !== '') {
        $update_detail_member['medical_certificate'] = $this->uploadImage($user_id, 'medical_certificate');
      }

      $member_id = $get_data[0]->id;
      $this->M_peserta->update_detail_member($member_id, $update_detail_member);

      // update table user 
      $update_user = [ 'name' => $post['name'] ];
      $this->M_peserta->update_user($user_id, $update_user);

      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di update.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/peserta');
    }

  }

  public function delete($user_id) {
    if(!isset($user_id)) show_404();
    
    $user_id	=	str_replace(['-','_','~',],['=','+','/'], $user_id);
    $user_id	=	$this->encryption->decrypt($user_id);

    $get_data = $this->M_peserta->get_one_peserta($user_id);
    if (!$get_data) {
      show_404();
    }

    $this->M_peserta->delete_user($user_id);
    $this->M_peserta->delete_member($get_data[0]->id);
    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('admin/peserta');
  }

  public function arsip() {
    $data = [
      'users'      => $this->M_peserta->get_peserta_done(),
			'content'		 => 'admin/peserta/archive',
		];
		$this->load->view('admin/template/Template', $data);
  }



  private function check_period() {
    $today = date('Y-m-d');
    
    $check_period = $this->M_peserta->get_period_active();
    if (!$check_period) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Tidak bisa menambah peserta karena tidak ada periode aktif.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/peserta');
    } else if ($check_period[0]->start_date < $today) {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Tidak bisa menambah peserta ditengah periode aktif.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/peserta');
    } else { 
      return $check_period[0]->id;
    }
  }

  private function uploadImage($user_id, $type) {
		$config['upload_path'] 		= './assets/image/member/';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['file_name']		  = $type.'-'.$user_id;
		$config['max_size']  		  = '2048';
    $config['overwrite']      = TRUE;

    // Create a new instance of the upload library for each upload
		$this->load->library('upload');
    $this->upload->initialize($config);


		if ($this->upload->do_upload($type)) {
			return $this->upload->data('file_name');
		}else{
      var_dump($this->upload->display_errors());
			return "";
		}
	}

  private function getAllReligion() {
    return [
      ["name" => 'Islam'],
      ["name" => 'Protestan'],
      ["name" => 'Katolik'],
      ["name" => 'Hindu'],
      ["name" => 'Buddha'],
      ["name" => 'Khonghucu'],
    ];
  }

  private function save_validation() {
    return [
      [
        'field' 	=> 'nik',
        'label'	  => 'NIK',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
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
        'field' 	=> 'gender',
        'label'	  => 'Jenis Kelamin',
        'rules'	  => 'required',
        'errors' 	=> [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'religion',
        'label'	  => 'Agama',
        'rules'	  => 'required',
        'errors' 	=>  [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'parents_name',
        'label'	  => 'Nama Orang Tua',
        'rules'	  => 'required|min_length[4]',
        'errors' 	=>  
          [ 
            'required' => '<b>%s</b> tidak boleh kosong.',
            'min_length'  => '<b>%s<b/> minimal 4 huruf.'
          ]
      ],
      [
        'field' 	=> 'domicile',
        'label'	  => 'Domisili',
        'rules'	  => 'required',
        'errors' 	=>  [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
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
    ];
  }

  private function update_validation() {
    return [
      [
        'field' 	=> 'nik',
        'label'	  => 'NIK',
        'rules'	  => 'required',
        'errors'	=>  [ 'required'  => '<b>%s</b> tidak boleh kosong.']
      ],
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
        'field' 	=> 'gender',
        'label'	  => 'Jenis Kelamin',
        'rules'	  => 'required',
        'errors' 	=> [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'religion',
        'label'	  => 'Agama',
        'rules'	  => 'required',
        'errors' 	=>  [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
      ],
      [
        'field' 	=> 'parents_name',
        'label'	  => 'Nama Orang Tua',
        'rules'	  => 'required|min_length[4]',
        'errors' 	=>  
          [ 
            'required' => '<b>%s</b> tidak boleh kosong.',
            'min_length'  => '<b>%s<b/> minimal 4 huruf.'
          ]
      ],
      [
        'field' 	=> 'domicile',
        'label'	  => 'Domisili',
        'rules'	  => 'required',
        'errors' 	=>  [ 'required' => '<b>%s</b> tidak boleh kosong.' ]
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
            'required'      => '<b>%s</b> tidak boleh kosong.',
            'valid_email'   => '<b>%s</b> tidak valid.',
          ]
      ],
    ];
  }

}