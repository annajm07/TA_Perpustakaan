<?php  
class Petugas_Buku extends CI_Controller{


	public function __Construct(){
		parent:: __Construct();
		if($this->session->userdata('role') !== 'Petugas Buku'){
			redirect('auth');
			die();
		}
		$user = $this->db->get_where('user_petugas',['id_petugas'=>$this->session->userdata('id')])->row_array();
		$this->session->set_userdata('gambar',$user['gambar']); 
		$this->load->model('Admin_model');
		$this->load->model('Ptbuku_model');
		$this->load->model('Guru_model');
		$this->Admin_model->tersedia();
	}

	public function index(){
		$data['judul'] = 'Beranda';
		$data['jumlah_buku'] = $this->Admin_model->jumlah_buku();
		$data['jumlah_jurnal'] = $this->Ptbuku_model->jumlah_jurnal();
		$data['jumlah_majalah'] = $this->Ptbuku_model->jumlah_majalah();
		$data['jumlah_surat_kabar'] = $this->Ptbuku_model->jumlah_surat_kabar();
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/index',$data);
		$this->load->view('templates_ptBuku/footer');

	}


	public function lihat_profil(){
		$data['judul'] = 'Lihat Profil';
		$data['detail'] = $this->Ptbuku_model->detail_ptbuku($this->session->userdata('email'));
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/lihat_profil',$data);
		$this->load->view('templates_ptBuku/footer');
	}

	public function ganti_foto(){
		$data['judul'] = 'Ganti Foto';
		$data['detail'] = $this->Ptbuku_model->detail_ptbuku($this->session->userdata('email'));
		if(!isset($_FILES['gambar']['name'])){
			$this->load->view('templates_ptBuku/header',$data);
			$this->load->view('templates_ptBuku/sidebar');
			$this->load->view('ptBuku/ganti_foto',$data);
			$this->load->view('templates_ptBuku/footer');			
		}else{
			if($this->Ptbuku_model->ganti_foto()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !! </div>');
			redirect('Petugas_buku/ganti_foto');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !! </div>');
			redirect('Petugas_buku/ganti_foto');
			}
		}

	}

	public function ganti_password(){
		$data['judul'] = 'Ganti Password';

		$this->form_validation->set_rules('password_lama','Kata Sandi','required',['required'=>'kata sandi tidak boleh kosong']);
		$this->form_validation->set_rules('password_baru','Kata Sandi','required|matches[konfirmasi_password]',['required'=>'password baru tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);
		$this->form_validation->set_rules('konfirmasi_password','Kata Sandi','required|matches[password_baru]',['required'=>'konfirmasi tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);

	if($this->form_validation->run() == false){
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/ganti_password');
		$this->load->view('templates_ptBuku/footer');
	}else{
		if($this->Ptbuku_model->ganti_password() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Kata Sandi Berhasil Diubah !! </div>');
			redirect('petugas_buku/ganti_password');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Kata Sandi Yang Dimasukkan Salah !! </div>');
			redirect('petugas_buku/ganti_password');
		} 
	
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
			$this->load->view('templates_ptBuku/header',$data);
			$this->load->view('templates_ptBuku/sidebar');
			$this->load->view('ptBuku/data_buku',$data);
			$this->load->view('templates_ptBuku/footer');
		}else{
			if($this->Admin_model->input_buku() > 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan !</div>');
			redirect('Petugas_buku/data_buku');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan !</div>');
			redirect('Petugas_buku/data_buku');
			}
		}
	}

	public function detail_buku($id=null){
		if($id == null){
			redirect('Petugas_buku/data_buku');
			die();
		}
		$data['judul'] = 'Detail Buku';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/detail_buku',$data);
		$this->load->view('templates_ptBuku/footer');
	}

	public function edit_buku($id=null){
		if($id == null){
			redirect('Petugas_buku/data_buku');
			die();
		}
		$data['judul'] = 'Edit Buku';

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/edit_buku',$data);
		$this->load->view('templates_ptBuku/footer');
		}else{
				if($this->Admin_model->edit_buku($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('Petugas_buku/data_buku');
				}else{
					redirect('Petugas_buku/data_buku');
				}
			}
	}

	public function hapus_buku($id){
		if($this->Admin_model->hapus_buku($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('Petugas_buku/data_buku');
		}
	}

	public function cetak_buku(){
		$data['buku'] = $this->Admin_model->data_buku();
		$data['judul'] = 'Cetak Buku';
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('ptBuku/cetak_buku',$data);
	}

	public function buku_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Admin_model->data_buku();
		$data['judul'] = 'Buku PDF';
	    $html = $this->load->view('templates_ptBuku/header',$data,true);
		$html .= $this->load->view('ptBuku/pdf/buku_pdf',$data,true);

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
			$this->load->view('templates_ptBuku/header',$data);
			$this->load->view('templates_ptBuku/sidebar');
			$this->load->view('ptBuku/data_jurnal',$data);
			$this->load->view('templates_ptBuku/footer');
		}else{
			if($this->Ptbuku_model->input_jurnal() > 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan !</div>');
			redirect('Petugas_buku/data_jurnal');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan !</div>');
			redirect('Petugas_buku/data_jurnal');
			}
		}
	}

	public function detail_jurnal($id=null){
		if($id == null){
			redirect('Petugas_buku/data_jurnal');
			die();
		}
		$data['judul'] = 'Detail Jurnal';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/detail_jurnal',$data);
		$this->load->view('templates_ptBuku/footer');
	}

	public function edit_jurnal($id=null){
		if($id == null){
			redirect('Petugas_buku/data_jurnal');
			die();
		}
		$data['judul'] = 'Edit Jurnal';

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('penulis','Penulis','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/edit_jurnal',$data);
		$this->load->view('templates_ptBuku/footer');
		}else{
				if($this->Ptbuku_model->edit_jurnal($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('Petugas_buku/data_jurnal');
				}else{
					redirect('Petugas_buku/data_jurnal');
				}
			}
	}

		public function hapus_jurnal($id){
		if($this->Admin_model->hapus_buku($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('Petugas_buku/data_jurnal');
		}
	}

	public function cetak_jurnal(){
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
		$data['judul'] = 'Cetak Jurnal';
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('ptBuku/cetak_jurnal',$data);
	}

	public function jurnal_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
		$data['judul'] = 'Jurnal PDF';
	    $html = $this->load->view('templates_ptBuku/header',$data,true);
		$html .= $this->load->view('ptBuku/pdf/jurnal_pdf',$data,true);

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
			$this->load->view('templates_ptBuku/header',$data);
			$this->load->view('templates_ptBuku/sidebar');
			$this->load->view('ptBuku/data_majalah',$data);
			$this->load->view('templates_ptBuku/footer');
		}else{
			if($this->Ptbuku_model->input_majalah() > 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan !</div>');
			redirect('Petugas_buku/data_majalah');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan !</div>');
			redirect('Petugas_buku/data_majalah');
			}
		}
	}

	public function edit_majalah($id=null){
		if($id == null){
			redirect('Petugas_buku/data_majalah');
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
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/edit_majalah',$data);
		$this->load->view('templates_ptBuku/footer');
		}else{
				if($this->Ptbuku_model->edit_majalah($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('Petugas_buku/data_majalah');
				}else{
					redirect('Petugas_buku/data_majalah');
				}
			}
	}

	public function detail_majalah($id=null){
		if($id == null){
			redirect('Petugas_buku/data_majalah');
			die();
		}
		$data['judul'] = 'Detail Majalah';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/detail_majalah',$data);
		$this->load->view('templates_ptBuku/footer');
	}

	public function hapus_majalah($id){
		if($this->Admin_model->hapus_buku($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('Petugas_buku/data_majalah');
		}
	}

	public function cetak_majalah(){
		$data['buku'] = $this->Ptbuku_model->data_majalah();
		$data['judul'] = 'Cetak Majalah';
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('ptBuku/cetak_majalah',$data);
	}


	public function majalah_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_majalah();
		$data['judul'] = 'Majalah PDF';
	    $html = $this->load->view('templates_ptBuku/header',$data,true);
		$html .= $this->load->view('ptBuku/pdf/majalah_pdf',$data,true);

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
			$this->load->view('templates_ptBuku/header',$data);
			$this->load->view('templates_ptBuku/sidebar');
			$this->load->view('ptBuku/data_surat_kabar',$data);
			$this->load->view('templates_ptBuku/footer');
		}else{
			if($this->Ptbuku_model->input_surat_kabar() > 0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan !</div>');
			redirect('Petugas_buku/data_surat_kabar');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan !</div>');
			redirect('Petugas_buku/data_surat_kabar');
			}
		}
	}

	public function edit_surat_kabar($id=null){
		if($id == null){
			redirect('Petugas_buku/data_surat_kabar');
			die();
		}
		$data['judul'] = 'Edit Surat Kabar';

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/edit_surat_kabar',$data);
		$this->load->view('templates_ptBuku/footer');
		}else{
				if($this->Ptbuku_model->edit_surat_kabar($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('Petugas_buku/data_surat_kabar');
				}else{
					redirect('Petugas_buku/data_surat_kabar');
				}
			}
	}

	public function detail_surat_kabar($id=null){
		if($id == null){
			redirect('Petugas_buku/data_surat_kabar');
			die();
		}
		$data['judul'] = 'Detail Surat Kabar';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/detail_surat_kabar',$data);
		$this->load->view('templates_ptBuku/footer');
	}

	public function hapus_surat_kabar($id){
		if($this->Admin_model->hapus_buku($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
			redirect('Petugas_buku/data_surat_kabar');
		}
	}

	public function cetak_surat_kabar(){
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
		$data['judul'] = 'Cetak Surat Kabar';
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('ptBuku/cetak_surat_kabar',$data);
	}

	public function surat_kabar_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
		$data['judul'] = 'Surat Kabar PDF';
	    $html = $this->load->view('templates_ptBuku/header',$data,true);
		$html .= $this->load->view('ptBuku/pdf/surat_kabar_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Surat Kabar',true,'A4','portrait');

	}

	public function perawatan(){
		$data['judul'] = 'Perawatan Koleksi';
		$data['perawatan'] = $this->Admin_model->getPerawatan();
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('jenis_koleksi','Jenis Koleksi','required');
		$this->form_validation->set_rules('kondisi_koleksi','Kondisi Koleksi','required');
		$this->form_validation->set_rules('aksi','Catatan','required');
		if($this->form_validation->run() == false){
			$this->load->view('templates_ptBuku/header',$data);
			$this->load->view('templates_ptBuku/sidebar');
			$this->load->view('ptBuku/perawatan',$data);
			$this->load->view('templates_ptBuku/footer');	
		}else{
			if($this->Admin_model->input_perawatan()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
				redirect('petugas_buku/perawatan');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan!</div>');
					redirect('petugas_buku/perawatan');
			 }
		}
	}

	public function detail_perawatan($id){
		$data['judul'] = 'Detail Perawatan';
		$data['detail'] = $this->Admin_model->getPerawatanById($id);
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/detail_perawatan',$data);
		$this->load->view('templates_ptBuku/footer');	
	}

	public function kritik_saran(){
		$data['judul'] = 'Kritik dan Saran';
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isi','Isi','required|min_length[10]');
		if($this->form_validation->run() == false){
			$this->load->view('templates_ptBuku/header',$data);
			$this->load->view('templates_ptBuku/sidebar');
			$this->load->view('ptBuku/kritik_saran');
			$this->load->view('templates_ptBuku/footer');	
		}else{
			if($this->Guru_model->kirim_kritik()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikrim!</div>');
				redirect('petugas_buku/kritik_saran');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Data Gagal Dikrim!</div>');
				redirect('petugas_buku/kritik_saran');
			}
		}
	}

	public function usulan_masuk(){
		$data['buku'] = $this->Ptbuku_model->usulan_buku_masuk();
		$data['judul'] = 'Usulan Masuk';
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/usulan_buku',$data);
		$this->load->view('templates_ptBuku/footer');
	}

	public function konfirmasi_buku($id){
		if($this->Ptbuku_model->konfirmasi_usulan($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikonfirmasi!</div>');
				redirect('petugas_buku/usulan_masuk');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dikonfirmasi!</div>');
				redirect('petugas_buku/usulan_masuk');
		}
	}

	public function konfirmasi_jurnal($id){
		if($this->Ptbuku_model->konfirmasi_usulan($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikonfirmasi!</div>');
				redirect('petugas_buku/usulan_jurnal');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dikonfirmasi!</div>');
				redirect('petugas_buku/usulan_jurnal');
		}
	}

	public function konfirmasi_majalah($id){
		if($this->Ptbuku_model->konfirmasi_usulan($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikonfirmasi!</div>');
				redirect('petugas_buku/usulan_majalah');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dikonfirmasi!</div>');
				redirect('petugas_buku/usulan_majalah');
		}
	}

	public function konfirmasi_surat_kabar($id){
		if($this->Ptbuku_model->konfirmasi_usulan($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikonfirmasi!</div>');
				redirect('petugas_buku/usulan_surat_kabar');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dikonfirmasi!</div>');
				redirect('petugas_buku/usulan_surat_kabar');
		}
	}

	public function hapus_usulan_buku($id){
		if($this->Ptbuku_model->hapus_usulan($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
				redirect('petugas_buku/usulan_masuk');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');
				redirect('petugas_buku/usulan_masuk');
		}
	}

	public function hapus_usulan_jurnal($id){
		if($this->Ptbuku_model->hapus_usulan($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
				redirect('petugas_buku/usulan_jurnal');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');
				redirect('petugas_buku/usulan_jurnal');
		}
	}

	public function hapus_usulan_majalah($id){
		if($this->Ptbuku_model->hapus_usulan($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
				redirect('petugas_buku/usulan_majalah');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');
				redirect('petugas_buku/usulan_majalah');
		}
	}

	public function hapus_usulan_surat_kabar($id){
		if($this->Ptbuku_model->hapus_usulan($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
				redirect('petugas_buku/usulan_surat_kabar');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dihapus!</div>');
				redirect('petugas_buku/usulan_surat_kabar');
		}
	}

	public function usulan_jurnal(){
		$data['buku'] = $this->Ptbuku_model->usulan_jurnal_masuk();
		$data['judul'] = 'Usulan Masuk';
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/usulan_jurnal',$data);
		$this->load->view('templates_ptBuku/footer');
	}

	public function usulan_majalah(){
		$data['buku'] = $this->Ptbuku_model->usulan_majalah_masuk();
		$data['judul'] = 'Usulan Masuk';
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/usulan_majalah',$data);
		$this->load->view('templates_ptBuku/footer');
	}

	public function usulan_surat_kabar(){
		$data['buku'] = $this->Ptbuku_model->usulan_surat_kabar_masuk();
		$data['judul'] = 'Usulan Masuk';
		$this->load->view('templates_ptBuku/header',$data);
		$this->load->view('templates_ptBuku/sidebar');
		$this->load->view('ptBuku/usulan_surat_kabar',$data);
		$this->load->view('templates_ptBuku/footer');
	}


}

?>