<?php  
Class Admin extends CI_Controller{

	public function __Construct(){
		parent:: __Construct();
		if($this->session->userdata('role') !== 'Administrator'){
			redirect('auth');
			die();
		}
		$user = $this->db->get_where('user_petugas',['id_petugas'=>$this->session->userdata('id')])->row_array();
		$this->session->set_userdata('gambar',$user['gambar']); 
		$this->session->set_userdata('nama',$user['nama_petugas']); 
		$this->load->model('Admin_model');
		$this->load->model('Ptbuku_model');
		$this->Admin_model->tersedia();

	}

	public function index(){

		$data['jumlah_petugas'] = $this->db->count_all_results('user_petugas');
		$data['jumlah_guru'] = $this->Admin_model->jumlah_guru();
		$data['jumlah_siswa'] = $this->Admin_model->jumlah_siswa();
		$data['jumlah_buku'] = $this->Admin_model->jumlah_buku();
		$data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
		$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();

		$data['judul'] = 'Beranda';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/index',$data);
		$this->load->view('templates_admin/footer');

	}


	public function lihat_profil(){
		$data['judul'] = 'Lihat Profil';
		$data['detail'] = $this->Admin_model->detail_Admin($this->session->userdata('id'));
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/lihat_profil',$data);
		$this->load->view('templates_admin/footer');
	}

	public function ganti_foto(){
		$data['judul'] = 'Ganti Foto';
		$data['detail'] = $this->Admin_model->detail_admin($this->session->userdata('id'));
		if(!isset($_FILES['gambar']['name'])){
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/ganti_foto',$data);
			$this->load->view('templates_admin/footer');			
		}else{
			if($this->Admin_model->ganti_foto()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !! </div>');
			redirect('admin/ganti_foto');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !! </div>');
			redirect('admin/ganti_foto');
			}
		}

	}

public function ganti_profil(){
	$data['judul'] = 'Ganti Profil';
	$data['user'] = $this->Admin_model->detail_admin($this->session->userdata('id'));

	$this->form_validation->set_rules('nama','Nama','required',['valid_email'=>'Nama Tidak Boleh Kosong']);
	$this->form_validation->set_rules('email','Email','required|valid_email',['valid_email'=>'Email Tidak Valid','required'=>'Email Tidak Boleh Kosong']);
	if($this->form_validation->run() == false){
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/ganti_profil',$data);
		$this->load->view('templates_admin/footer');
	}else{
		if($this->Admin_model->ganti_profil() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !! </div>');
			redirect('admin/ganti_profil');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !! </div>');
			redirect('admin/ganti_profil');
		}
	}

}

public function ganti_password(){
		$data['judul'] = 'Ganti Password';

		$this->form_validation->set_rules('password_lama','Kata Sandi','required',['required'=>'kata sandi tidak boleh kosong']);
		$this->form_validation->set_rules('password_baru','Kata Sandi','required|matches[konfirmasi_password]',['required'=>'password baru tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);
		$this->form_validation->set_rules('konfirmasi_password','Kata Sandi','required|matches[password_baru]',['required'=>'konfirmasi tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);

	if($this->form_validation->run() == false){
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/ganti_password');
		$this->load->view('templates_admin/footer');
	}else{
		if($this->Admin_model->ganti_password() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Kata Sandi Berhasil Diubah !! </div>');
			redirect('admin/ganti_password');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Kata Sandi Yang Dimasukkan Salah !! </div>');
			redirect('admin/ganti_password');
		} 
	
	}

}

	public function data_petugas(){
		$data['judul'] = 'Data Petugas';
		$data['petugas'] = $this->Admin_model->getPetugas();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_petugas',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_petugas(){
		$data['judul'] = 'Tambah Petugas';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('role','Role','required');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');

		if($this->form_validation->run() == false){		
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_petugas');
		$this->load->view('templates_admin/footer');
		}else{
			if($this->Admin_model->cek_email('user_petugas','user_anggota',$this->input->post('email')) == 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Email Telah Digunakan !</div>');
				redirect('admin/tambah_petugas');
				die();
			}
			if($this->Admin_model->tambah_petugas()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
					redirect('admin/data_petugas');
				}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan!</div>');
					redirect('admin/tambah_petugas');
				}
			}
		}
	

	public function detail_petugas($id){
		$data['judul'] = 'Detail Petugas';
		$data['detail'] = $this->Admin_model->detail_petugas($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_petugas',$data);
		$this->load->view('templates_admin/footer');
	}

	public function edit_petugas($id=null){
		if($id == null){
			redirect('admin/data_petugas');
			die();
		}
		$data['judul'] = 'Edit Petugas';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('role','Role','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_petugas($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_petugas',$data);
		$this->load->view('templates_admin/footer');
		}else{
				if($this->Admin_model->edit_petugas($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('admin/data_petugas');
				}else{
					redirect('admin/data_petugas');
				}
			}
	}

	public function hapus_petugas($id){
		if($this->Admin_model->hapus_petugas($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('admin/data_petugas');
		}
	}

	public function cetak_petugas(){
		$data['petugas'] = $this->Admin_model->getPetugas();
		$data['judul'] = 'Cetak Petugas';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_petugas',$data);
		// $this->load->view('templates_admin/footer',$data);
	}
	public function petugas_pdf(){
		$this->load->library('pdfgenerator');
		$data['petugas'] = $this->Admin_model->getPetugas();
	    $data['judul'] = 'Petugas PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/petugas_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Petugas',true,'A4','portrait');

	}

	public function data_guru(){
		$data['judul'] = 'Data Guru';
		$data['guru'] = $this->Admin_model->getAnggotaGuru();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_guru',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_guru(){
		$data['judul'] = 'Tambah Guru';

		$this->form_validation->set_rules('nip','Nip','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		if($this->form_validation->run() == false){			
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/tambah_guru',$data);
			$this->load->view('templates_admin/footer');
		}else{
			if($this->Admin_model->cek_email('user_petugas','user_anggota',$this->input->post('email')) == 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Email Telah Digunakan !</div>');
				redirect('admin/tambah_guru');
				die();
			}
			if($this->Admin_model->tambah_guru()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
					redirect('admin/data_guru');
				}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan!</div>');
					redirect('admin/tambah_guru');
				}
		}
	}

	public function detail_guru($id=null){
		if($id == null){
			redirect('admin/data_guru');
			die();
		}
		$data['judul'] = 'Detail Guru';
		$data['detail'] = $this->Admin_model->detail_guru($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_guru',$data);
		$this->load->view('templates_admin/footer');
	}

	public function edit_guru($id=null){
		if($id == null){
			redirect('admin/data_guru');
			die();
		}
		$data['judul'] = 'Edit Guru';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nip','Nip','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_guru($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_guru',$data);
		$this->load->view('templates_admin/footer');
		}else{
				if($this->Admin_model->edit_guru($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('admin/data_guru');
				}else{
					redirect('admin/data_guru');
				}
			}
	}

	public function hapus_guru($id){
		if($this->Admin_model->hapus_guru($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('admin/data_guru');
		}
	}

	public function cetak_guru(){
		$data['guru'] = $this->Admin_model->getAnggotaGuru();
		$data['judul'] = 'Cetak Guru';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_guru',$data);
		// $this->load->view('templates_admin/footer',$data);
	}

	public function guru_pdf(){
		$this->load->library('pdfgenerator');
		$data['guru'] = $this->Admin_model->getAnggotaGuru();
		$data['judul'] = 'Guru PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/guru_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Guru',true,'A4','portrait');

	}



	public function data_siswa(){
		$data['judul'] = 'Data Siswa';
		$data['siswa'] = $this->Admin_model->getAnggotaSiswa();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_siswa',$data);
		$this->load->view('templates_admin/footer');
	}

	public function detail_siswa($id=null){
		if($id == null){
			redirect('admin/data_siswa');
			die();
		}
		$data['judul'] = 'Detail siswa';
		$data['detail'] = $this->Admin_model->detail_siswa($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_siswa',$data);
		$this->load->view('templates_admin/footer');
	}

	public function edit_siswa($id=null){
		if($id == null){
			redirect('admin/data_siswa');
			die();
		}
		$data['judul'] = 'Edit Siswa';

		$this->form_validation->set_rules('nis','Nis','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('kelas','Kelas','required');
		$this->form_validation->set_rules('jurusan','Jurusan','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_siswa($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_siswa',$data);
		$this->load->view('templates_admin/footer');
		}else{
				if($this->Admin_model->edit_siswa($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('admin/data_siswa');
				}else{
					redirect('admin/data_siswa');
				}
			}
	}

	public function hapus_siswa($id){
		if($this->Admin_model->hapus_siswa($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('admin/data_siswa');
		}
	}

	public function cetak_siswa(){
		$data['siswa'] = $this->Admin_model->getAnggotaSiswa();
		$data['judul'] = 'Cetak Siswa';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_siswa',$data);
		// $this->load->view('templates_admin/footer',$data);
	}

	public function siswa_pdf(){
		$this->load->library('pdfgenerator');
		$data['siswa'] = $this->Admin_model->getAnggotaSiswa();
		$data['judul'] = 'Siswa PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/siswa_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Siswa',true,'A4','portrait');

	}


	public function konfirmasi($id = null){
		$data['judul'] = 'Konfirmasi Pengguna';
		if($id == null){

		$data['konfirmasi'] = $this->Admin_model->konfirmasi();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/konfirmasi',$data);
		$this->load->view('templates_admin/footer');

		}else{
			$data = $this->Admin_model->aktif_user($id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikonfirmasi !</div>');
			redirect('admin/konfirmasi');
		}
		
	}

	public function data_buku(){
		$data['judul'] = 'Data Buku';
		$data['buku'] = $this->Admin_model->data_buku();

		$this->form_validation->set_rules('judul','Nama','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('klasifikasi','Klasifikasi','required');

		if($this->form_validation->run() == false){
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_buku',$data);
			$this->load->view('templates_admin/footer');
		}else{
			if($this->Admin_model->input_buku() > 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan !</div>');
			redirect('admin/data_buku');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan !</div>');
			redirect('admin/data_buku');
			}
		}
	}

	public function detail_buku($id=null){
		if($id == null){
			redirect('admin/data_buku');
			die();
		}
		$data['judul'] = 'Detail Buku';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_buku',$data);
		$this->load->view('templates_admin/footer');
	}

	public function edit_buku($id=null){
		if($id == null){
			redirect('admin/data_buku');
			die();
		}
		$data['judul'] = 'Edit Buku';

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isbn','Isbn','required');
		$this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_buku',$data);
		$this->load->view('templates_admin/footer');
		}else{
				if($this->Admin_model->edit_buku($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('admin/data_buku');
				}else{
					redirect('admin/data_buku');
				}
			}
	}

	public function hapus_buku($id){
		if($this->Admin_model->hapus_buku($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('admin/data_buku');
		}
	}

	public function cetak_buku(){
		$data['buku'] = $this->Admin_model->data_buku();
		$data['judul'] = 'Cetak Buku';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_buku',$data);
	}

	public function buku_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Admin_model->data_buku();
		$data['judul'] = 'Buku PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/buku_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Buku',true,'A4','portrait');

	}

	public function data_jurnal(){
		$data['judul'] = 'Data Buku';
		$data['buku'] = $this->Ptbuku_model->data_jurnal();

		$this->form_validation->set_rules('judul','Nama','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('penulis','Penulis','required');
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');

		if($this->form_validation->run() == false){
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_jurnal',$data);
			$this->load->view('templates_admin/footer');
		}else{
			if($this->Ptbuku_model->input_jurnal() > 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan !</div>');
			redirect('admin/data_jurnal');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan !</div>');
			redirect('admin/data_jurnal');
			}
		}
	}

	public function detail_jurnal($id=null){
		if($id == null){
			redirect('admin/data_jurnal');
			die();
		}
		$data['judul'] = 'Detail Jurnal';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_jurnal',$data);
		$this->load->view('templates_admin/footer');
	}

	public function edit_jurnal($id=null){
		if($id == null){
			redirect('admin/data_jurnal');
			die();
		}
		$data['judul'] = 'Edit Jurnal';

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('penulis','Penulis','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_jurnal',$data);
		$this->load->view('templates_admin/footer');
		}else{
				if($this->Ptbuku_model->edit_jurnal($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('admin/data_jurnal');
				}else{
					redirect('admin/data_jurnal');
				}
			}
	}

		public function hapus_jurnal($id){
		if($this->Admin_model->hapus_buku($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('admin/data_jurnal');
		}
	}

	public function cetak_jurnal(){
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
		$data['judul'] = 'Cetak Jurnal';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_jurnal',$data);
	}

	public function jurnal_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
		$data['judul'] = 'Jurnal PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/jurnal_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Jurnal',true,'A4','portrait');

	}

	public function data_majalah(){
		$data['judul'] = 'Data Majalah';
		$data['buku'] = $this->Ptbuku_model->data_majalah();

		$this->form_validation->set_rules('judul','Nama','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');

		if($this->form_validation->run() == false){
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_majalah',$data);
			$this->load->view('templates_admin/footer');
		}else{
			if($this->Ptbuku_model->input_majalah() > 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan !</div>');
			redirect('admin/data_majalah');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan !</div>');
			redirect('admin/data_majalah');
			}
		}
	}

	public function edit_majalah($id=null){
		if($id == null){
			redirect('admin/data_majalah');
			die();
		}
		$data['judul'] = 'Edit Majalah';

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_majalah',$data);
		$this->load->view('templates_admin/footer');
		}else{
				if($this->Ptbuku_model->edit_majalah($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('admin/data_majalah');
				}else{
					redirect('admin/data_majalah');
				}
			}
	}

	public function detail_majalah($id=null){
		if($id == null){
			redirect('admin/data_majalah');
			die();
		}
		$data['judul'] = 'Detail Majalah';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_majalah',$data);
		$this->load->view('templates_admin/footer');
	}

	public function hapus_majalah($id){
		if($this->Admin_model->hapus_buku($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('admin/data_majalah');
		}
	}

	public function cetak_majalah(){
		$data['buku'] = $this->Ptbuku_model->data_majalah();
		$data['judul'] = 'Cetak Majalah';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_majalah',$data);
	}


	public function majalah_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_majalah();
		$data['judul'] = 'Majalah PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/majalah_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Majalah',true,'A4','portrait');

	}

	public function data_surat_kabar(){
		$data['judul'] = 'Data Surat Kabar';
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');

		if($this->form_validation->run() == false){
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_surat_kabar',$data);
			$this->load->view('templates_admin/footer');
		}else{
			if($this->Ptbuku_model->input_surat_kabar() > 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan !</div>');
			redirect('admin/data_surat_kabar');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan !</div>');
			redirect('admin/data_surat_kabar');
			}
		}
	}

	public function edit_surat_kabar($id=null){
		if($id == null){
			redirect('admin/data_surat_kabar');
			die();
		}
		$data['judul'] = 'Edit Surat Kabar';

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_surat_kabar',$data);
		$this->load->view('templates_admin/footer');
		}else{
				if($this->Ptbuku_model->edit_surat_kabar($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('admin/data_surat_kabar');
				}else{
					redirect('admin/data_surat_kabar');
				}
			}
	}

	public function detail_surat_kabar($id=null){
		if($id == null){
			redirect('admin/data_surat_kabar');
			die();
		}
		$data['judul'] = 'Detail Surat Kabar';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_surat_kabar',$data);
		$this->load->view('templates_admin/footer');
	}

	public function hapus_surat_kabar($id){
		if($this->Admin_model->hapus_buku($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('admin/data_surat_kabar');
		}
	}

	public function cetak_surat_kabar(){
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
		$data['judul'] = 'Cetak Surat Kabar';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_surat_kabar',$data);
	}

	public function surat_kabar_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
		$data['judul'] = 'Surat Kabar PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/surat_kabar_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Surat Kabar',true,'A4','portrait');

	}

	public function konfirmasi_peminjaman($id = null){
		$data['judul'] = 'Peminjaman';
		if($id == null){		
			$data['peminjaman'] = $this->Admin_model->getKonfirmPeminjaman();
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/konfirmasi_peminjaman',$data);
			$this->load->view('templates_admin/footer');
		}else{
			if($this->Admin_model->aktif_peminjaman($id) > 0){
			   $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Berhasil Dikonfirmasi</div>');
			redirect('admin/konfirmasi_peminjaman');
			}
		}
	}

	public function hapus_peminjaman($id){
		if($this->Admin_model->hapus_peminjaman($id) >0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Berhasil Dihapus</div>');
			redirect('admin/konfirmasi_peminjaman');
		}
	}

	public function daftar_peminjam(){
			$data['judul'] = 'Sedang Meminjam';
			$data['peminjam'] = $this->Admin_model->getPeminjam();
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/daftar_peminjam',$data);
			$this->load->view('templates_admin/footer');
	}

	public function konfirmasi_pengembalian(){
			$data['judul'] = 'Pengembalian';
			$data['peminjam'] = $this->Admin_model->getDaftarPeminjam();
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/konfirmasi_pengembalian',$data);
			$this->load->view('templates_admin/footer');
	}

	public function proses_pengembalian($id_peminjaman,$id_anggota){
		if($this->Admin_model->proses_pengembalian($id_peminjaman,$id_anggota) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Buku Berhasil Dikembalikan</div>');
			redirect('admin/konfirmasi_pengembalian');
		}
	}

	public function riwayat_siswa(){
		    $data['riwayat_peminjaman_siswa'] = $this->Admin_model->riwayat_peminjaman_siswa();
			$data['judul'] = 'Riwayat Transaksi Siswa';
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/riwayat_peminjaman_siswa',$data);
			$this->load->view('templates_admin/footer');
	}

	public function cetak_transaksi_siswa(){
		$data['riwayat_peminjaman_siswa'] = $this->Admin_model->riwayat_peminjaman_siswa();
		$data['judul'] = 'Cetak Transaksi Siswa';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_transaksi_siswa',$data);
	}

	public function transaksi_siswa_pdf(){
		$this->load->library('pdfgenerator');
		$data['riwayat_peminjaman_siswa'] = $this->Admin_model->riwayat_peminjaman_siswa();
		$data['judul'] = 'Transaksi Siswa PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/transaksi_siswa_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Transaksi Siswa',true,'A4','portrait');

	}

	public function riwayat_guru(){
		    $data['riwayat_peminjaman_guru'] = $this->Admin_model->riwayat_peminjaman_guru();
			$data['judul'] = 'Riwayat Transaksi Guru';
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/riwayat_peminjaman_guru',$data);
			$this->load->view('templates_admin/footer');
	}

	public function cetak_transaksi_guru(){
		$data['riwayat_peminjaman_guru'] = $this->Admin_model->riwayat_peminjaman_guru();
		$data['judul'] = 'Cetak Transaksi Guru';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_transaksi_guru',$data);
	}

	public function transaksi_guru_pdf(){
		$this->load->library('pdfgenerator');
		$data['riwayat_peminjaman_guru'] = $this->Admin_model->riwayat_peminjaman_guru();
		$data['judul'] = 'Transaksi Guru PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/transaksi_guru_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Transaksi Guru',true,'A4','portrait');

	}

	public function konfirmasi_denda(){
			$data['judul'] = 'Konfirmasi Denda';
			$data['konfirmasi_denda'] = $this->Admin_model->konfirmasi_denda();
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/konfirmasi_denda',$data);
			$this->load->view('templates_admin/footer');
	}

	public function proses_denda($id){
		if($this->Admin_model->proses_denda($id)>0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Denda Berhasil Dibayarkan!</div>');
			redirect('admin/konfirmasi_denda');
		}
	}

	public function data_denda(){
		    $data['judul'] = 'Data Denda';
			$data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
			$data['data_denda'] = $this->Admin_model->data_denda();
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_denda',$data);
			$this->load->view('templates_admin/footer');
	}

	public function cetak_denda(){
		$data['data_denda'] = $this->Admin_model->data_denda();
		$data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
		$data['judul'] = 'Cetak Denda';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_denda',$data);
	}

	public function denda_pdf(){
		$this->load->library('pdfgenerator');
		$data['data_denda'] = $this->Admin_model->data_denda();
	    $data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
	    $data['judul'] = 'Cetak Denda';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/denda_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Laporan Denda',true,'A4','portrait');

	}

	public function donasi(){
			$data['judul'] = 'Donasi';
			$data['donasi'] = $this->Admin_model->donasi();
			$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('jumlah','Jumlah','required|integer');

			if($this->form_validation->run() == false){	
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/donasi',$data);
			$this->load->view('templates_admin/footer');
			}else{
				if($this->Admin_model->tambah_donasi()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
				redirect('admin/donasi');
				}
			}
	}

		public function edit_donasi($id=null){
		if($id == null){
			redirect('admin/donasi');
			die();
		}
		$data['judul'] = 'Edit Donasi';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required|integer');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_donasi($id);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_donasi',$data);
		$this->load->view('templates_admin/footer');
		}else{
				if($this->Admin_model->edit_donasi($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('admin/donasi');
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
					redirect('admin/donasi');
				}
			}
	}

	public function cetak_donasi(){
		$data['donasi'] = $this->Admin_model->donasi();
		$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();
		$data['judul'] = 'Cetak Donasi';
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetak_donasi',$data);
	}

	public function hapus_donasi($id){
		if($this->Admin_model->hapus_donasi($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
				redirect('admin/donasi');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Gagal Dihapus !</div>');
				redirect('admin/donasi');
		}
	}

	public function donasi_pdf(){
		$this->load->library('pdfgenerator');
		$data['donasi'] = $this->Admin_model->donasi();
		$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();
		$data['judul'] = 'Donasi PDF';
	    $html = $this->load->view('templates_admin/header',$data,true);
		$html .= $this->load->view('admin/pdf/donasi_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Laporan Donasi',true,'A4','portrait');

	}

	public function kritik_saran(){
		    $data['judul'] = 'Kritik dan Saran';
			$data['kritik_saran'] = $this->Admin_model->kritik_saran();
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/kritik_saran',$data);
			$this->load->view('templates_admin/footer');
	}

	public function detail_kritik_saran($id){
		    $data['judul'] = 'Detail Kritik Saran';
			$data['detail'] = $this->Admin_model->detail_kritik_saran($id);
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/detail_kritik_saran',$data);
			$this->load->view('templates_admin/footer');
	}

	public function hapus_kritik_saran($id){
		if($this->Admin_model->hapus_kritik_saran($id) >0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
					redirect('admin/kritik_saran');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dihapus !</div>');
					redirect('admin/kritik_saran');
			}
	}

}

?>



