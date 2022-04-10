<?php  
class Auth extends CI_Controller{

	public function __Construct(){
		parent::__Construct();
			if($this->session->userdata('aktif')){
			redirect($this->session->userdata('aktif'));
			die();
		}

		$this->load->model('Auth_model');
	}


	public function index(){
		$data['judul'] = 'Masuk';
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() == false){
			$this->load->view('template_auth/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('template_auth/auth_footer');
		}else{
			$this->login();
		}
	}

	private function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user_petugas = $this->db->get_where('user_petugas',['email'=>$email])->row_array();
		$user_anggota = $this->db->get_where('user_anggota',['email'=>$email])->row_array();
		if(!empty($user_petugas)){
			if($user_petugas['role'] == 'Administrator'){
				if(password_verify($password, $user_petugas['password'])){
					$this->session->set_userdata(['email'=>$email,'role'=>'Administrator','id'=>$user_petugas['id_petugas'],'aktif'=>'admin']);
					redirect('admin');
					die();
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal! email atau kata sandi yang anda masukkan salah</div>');
					redirect('Auth');
					die();
				}
			}elseif($user_petugas['role'] == 'Kepala Perpustakaan'){
				if(password_verify($password, $user_petugas['password'])){
					$this->session->set_userdata(['email'=>$email,'role'=>'Kepala Perpustakaan','nama'=>$user_petugas['nama_petugas'],'id'=>$user_petugas['id_petugas'],'aktif'=>'kepala_perpustakaan']);
					redirect('kepala_perpustakaan');
					die();
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal! email atau kata sandi yang anda masukkan salah</div>');
					redirect('Auth');
					die();
				}
			}elseif($user_petugas['role'] == 'Petugas Pelayanan'){
				if(password_verify($password, $user_petugas['password'])){
					$this->session->set_userdata(['email'=>$email,'role'=>'Petugas Pelayanan','nama'=>$user_petugas['nama_petugas'],'id'=>$user_petugas['id_petugas'],'aktif'=>'petugas_pelayanan']);
					redirect('petugas_pelayanan');
					die();
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal! email atau kata sandi yang anda masukkan salah</div>');
					redirect('Auth');
					die();
				}
			}elseif($user_petugas['role'] == 'Petugas Buku'){
				if(password_verify($password, $user_petugas['password'])){
					$this->session->set_userdata(['email'=>$email,'role'=>'Petugas Buku','nama'=>$user_petugas['nama_petugas'],'id'=>$user_petugas['id_petugas'],'aktif'=>'petugas_buku']);
					redirect('petugas_buku');
					die();
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal! email atau kata sandi yang anda masukkan salah</div>');
					redirect('Auth');
					die();
				}
			}elseif($user_petugas['role'] == 'Petugas Keuangan'){
				if(password_verify($password, $user_petugas['password'])){
					$this->session->set_userdata(['email'=>$email,'role'=>'Petugas Keuangan','nama'=>$user_petugas['nama_petugas'],'id'=>$user_petugas['id_petugas'],'aktif'=>'petugas_keuangan']);
					redirect('petugas_keuangan');
					die();
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal! email atau kata sandi yang anda masukkan salah</div>');
					redirect('Auth');
					die();
				}

			}
		}elseif(!empty($user_anggota)){
			if($user_anggota['role'] == 'siswa'){
				if(password_verify($password, $user_anggota['password'])){
					if($user_anggota['is_active'] == 0){
						$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Akun anda belum aktif,silahkan kontak administrator</div>');
					redirect('Auth');
					die();
					}else{
						$this->session->set_userdata(['email'=>$email,'role'=>'siswa','nama'=>$user_anggota['nama_anggota'],'id'=>$user_anggota['id_anggota'],'aktif'=>'siswa']);
					redirect('siswa');
					die();
					}
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal! email atau kata sandi yang anda masukkan salah</div>');
					redirect('Auth');
					die();
				}
			}elseif($user_anggota['role'] == 'guru'){
				if(password_verify($password, $user_anggota['password'])){
					$this->session->set_userdata(['email'=>$email,'role'=>'guru','nama'=>$user_anggota['nama_anggota'],'id'=>$user_anggota['id_anggota'],'aktif'=>'guru']);
					redirect('guru');
					die();
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal! email atau kata sandi yang anda masukkan salah</div>');
					redirect('Auth');
					die();
				}
			}
		}
		$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal! email atau kata sandi yang anda masukkan salah</div>');
			redirect('Auth');
			die();
	}

	public function daftar(){
		$data['judul'] = 'Daftar';
		$this->form_validation->set_rules('nama','Nama','required',['required'=>'Nama Tidak Boleh Kosong']);
		$this->form_validation->set_rules('nis','Nis','required',['required'=>'Nis Tidak Boleh Kosong']);
		$this->form_validation->set_rules('email','Email','required|valid_email',['required'=>'Email Tidak Boleh Kosong','valid_email'=>'Email Tidak Valid']);
		$this->form_validation->set_rules('jenis_kelamin','Jenis_kelamin','required',['required'=>'Pilih Jenis Kelamin']);
		$this->form_validation->set_rules('kelas','Kelas','required',['required'=>'Pilih Kelas']);
		$this->form_validation->set_rules('jurusan','jurusan','required',['required'=>'Pilih jurusan']);
		$this->form_validation->set_rules('password1','Password','required|min_length[6]|matches[konfirmasi]',['required'=>'Kata Sandi Tidak Boleh Kosong','min_length'=>'Minimal 6 Karakter','matches'=>'Konfirmasi Tidak Sama']);
		$this->form_validation->set_rules('konfirmasi','Konfirmasi','required|trim|matches[password1]');
		if($this->form_validation->run() == false){
			$this->load->view('template_auth/auth_header',$data);
			$this->load->view('auth/daftar');
			$this->load->view('template_auth/auth_footer');
		}else{
			if($this->Auth_model->daftar()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Berhasil Mendaftar! Silahkan kontak administrator untuk aktivasi akun!</div>');
					redirect('Auth');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal Mendaftar! Email yang dimasukkan telah dipakai!</div>');
					redirect('Auth/daftar');
			}
		}

	}


	public function koleksi_buku(){
		$data['judul'] = 'Koleksi Buku';
		$data['buku'] = $this->Auth_model->data_buku();
		$this->load->view('template_auth/auth_header',$data);
		$this->load->view('auth/koleksi_buku',$data);
		$this->load->view('template_auth/auth_footer');
	}

	public function detail_buku($id=null){
		if($id == null){
			redirect('admin/data_buku');
			die();
		}
		$data['judul'] = 'Detail Buku';
		$data['detail'] = $this->Auth_model->detail_buku($id);
		$this->load->view('template_auth/auth_header',$data);
		$this->load->view('auth/detail_buku',$data);
		$this->load->view('template_auth/auth_footer');
	}


	public function kritik_saran(){
		$data['judul'] = 'Kritik dan Saran';
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isi','Isi','required|min_length[10]');
		if($this->form_validation->run() == false){
			$this->load->view('template_auth/auth_header',$data);
		$this->load->view('auth/kritik_saran',$data);
		$this->load->view('template_auth/auth_footer');
		}else{
			if($this->Auth_model->kirim_kritik()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikrim!</div>');
				redirect('Auth/kritik_saran');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Data Gagal Dikrim!</div>');
				redirect('Auth/kritik_saran');
			}
		}
	}


}















?>