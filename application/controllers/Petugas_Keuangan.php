<?php  
class Petugas_Keuangan extends CI_Controller{

	public function __Construct(){
		parent:: __Construct();
			if($this->session->userdata('role') !== 'Petugas Keuangan'){
			redirect('auth');
			die();
		}
		$user = $this->db->get_where('user_petugas',['id_petugas'=>$this->session->userdata('id')])->row_array();
		$this->session->set_userdata('gambar',$user['gambar']); 
		$this->load->model('Admin_model');
		$this->load->model('Ptkeuangan_model');
		$this->load->model('Guru_model');
		$this->load->model('Ptbuku_model');
		$this->Admin_model->tersedia();
	}

	public function index(){
		$data['judul'] = 'Beranda';
		$data['jumlah_buku'] = $this->Admin_model->jumlah_buku();
		$data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
		$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/index',$data);
		$this->load->view('templates_ptKeuangan/footer');

	}

	public function lihat_profil(){
		$data['judul'] = 'Lihat Profil';
		$data['detail'] = $this->Ptkeuangan_model->detail_ptkeuangan($this->session->userdata('email'));
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/lihat_profil',$data);
		$this->load->view('templates_ptKeuangan/footer');
	}

	public function ganti_foto(){
		$data['judul'] = 'Ganti Foto';
		$data['detail'] = $this->Ptkeuangan_model->detail_ptkeuangan($this->session->userdata('email'));
		if(!isset($_FILES['gambar']['name'])){
			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/ganti_foto',$data);
			$this->load->view('templates_ptKeuangan/footer');			
		}else{
			if($this->Ptkeuangan_model->ganti_foto()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !! </div>');
			redirect('Petugas_keuangan/ganti_foto');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !! </div>');
			redirect('Petugas_keuangan/ganti_foto');
			}
		}

	}

	public function ganti_password(){
		$data['judul'] = 'Ganti Password';

		$this->form_validation->set_rules('password_lama','Kata Sandi','required',['required'=>'kata sandi tidak boleh kosong']);
		$this->form_validation->set_rules('password_baru','Kata Sandi','required|matches[konfirmasi_password]',['required'=>'password baru tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);
		$this->form_validation->set_rules('konfirmasi_password','Kata Sandi','required|matches[password_baru]',['required'=>'konfirmasi tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);

	if($this->form_validation->run() == false){
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/ganti_password');
		$this->load->view('templates_ptKeuangan/footer');
	}else{
		if($this->Ptkeuangan_model->ganti_password() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Kata Sandi Berhasil Diubah !! </div>');
			redirect('petugas_keuangan/ganti_password');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Kata Sandi Yang Dimasukkan Salah !! </div>');
			redirect('petugas_keuangan/ganti_password');
		} 
	
	}

}

	public function buku(){
		$data['judul'] = 'Buku';
		$data['buku'] = $this->Admin_model->data_buku();
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/buku',$data);
		$this->load->view('templates_ptKeuangan/footer');	
	}

	public function detail_buku($id=null){
		if($id == null){
			redirect('admin/data_buku');
			die();
		}
		$data['judul'] = 'Detail Buku';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/detail_buku',$data);
		$this->load->view('templates_ptKeuangan/footer');
	}

	public function data_jurnal(){
		$data['judul'] = 'Data Jurnal';
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/data_jurnal',$data);
			$this->load->view('templates_ptKeuangan/footer');
	}

	public function detail_jurnal($id=null){
		if($id == null){
			redirect('petugas_keuangan/data_jurnal');
			die();
		}
		$data['judul'] = 'Detail Jurnal';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/detail_jurnal',$data);
		$this->load->view('templates_ptKeuangan/footer');
	}



	public function data_majalah(){
		$data['judul'] = 'Data Majalah';
		$data['buku'] = $this->Ptbuku_model->data_majalah();
			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/data_majalah',$data);
			$this->load->view('templates_ptKeuangan/footer');
	}


	public function detail_majalah($id=null){
		if($id == null){
			redirect('petugas_keuangan/data_majalah');
			die();
		}
		$data['judul'] = 'Detail Majalah';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/detail_majalah',$data);
		$this->load->view('templates_ptKeuangan/footer');
	}

	public function data_surat_kabar(){
		$data['judul'] = 'Data Surat Kabar';
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/data_surat_kabar',$data);
			$this->load->view('templates_ptKeuangan/footer');
	}


	public function detail_surat_kabar($id=null){
		if($id == null){
			redirect('petugas_keuangan/data_surat_kabar');
			die();
		}
		$data['judul'] = 'Detail Surat Kabar';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/detail_surat_kabar',$data);
		$this->load->view('templates_ptKeuangan/footer');
	}

	public function konfirmasi_denda(){
			$data['judul'] = 'Konfirmasi Denda';
			$data['konfirmasi_denda'] = $this->Admin_model->konfirmasi_denda();
			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/konfirmasi_denda',$data);
			$this->load->view('templates_ptKeuangan/footer');
	}

	public function proses_denda($id,$id_siswa){
		if($this->Admin_model->proses_denda($id,$id_siswa)>0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Denda Berhasil Dibayarkan!</div>');
			redirect('petugas_keuangan/konfirmasi_denda');
		}
	}

	public function data_denda(){
		    $data['judul'] = 'Data Denda';
			$data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
			$data['data_denda'] = $this->Admin_model->data_denda();
			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/data_denda',$data);
			$this->load->view('templates_ptKeuangan/footer');
	}

	public function cetak_denda(){
		$data['data_denda'] = $this->Admin_model->data_denda();
		$data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
		$data['judul'] = 'Cetak Denda';
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('ptKeuangan/cetak_denda',$data);
	}

	public function denda_pdf(){
		$this->load->library('pdfgenerator');
		$data['data_denda'] = $this->Admin_model->data_denda();
	    $data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
	    $data['judul'] = 'Cetak Denda';
	    $html = $this->load->view('templates_ptKeuangan/header',$data,true);
		$html .= $this->load->view('ptKeuangan/pdf/denda_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Laporan Denda',true,'A4','portrait');

	}

	public function donasi(){
			$data['judul'] = 'Donasi';
			$data['donasi'] = $this->Admin_model->donasi();
			$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('jumlah','Jumlah','required|integer');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('jenis_pembayaran','Jenis Pembayaran','required');
			$this->form_validation->set_rules('telepon','Telepon','required|integer');

			if($this->form_validation->run() == false){	
			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/donasi',$data);
			$this->load->view('templates_ptKeuangan/footer');
			}else{
				if($this->Admin_model->tambah_donasi()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
				redirect('petugas_keuangan/donasi');
				}
			}
	}

		public function detail_donasi($id){
			$data['judul'] = 'Detail Donasi';
			$data['detail'] = $this->Admin_model->detail_donasi($id);

			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/detail_donasi',$data);
			$this->load->view('templates_ptKeuangan/footer');

	}

		public function edit_donasi($id=null){
		if($id == null){
			redirect('petugas_keuangan/donasi');
			die();
		}
		$data['judul'] = 'Edit Donasi';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required|integer');

		if($this->form_validation->run() == false){			
		$data['detail'] = $this->Admin_model->detail_donasi($id);
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('templates_ptKeuangan/sidebar');
		$this->load->view('ptKeuangan/edit_donasi',$data);
		$this->load->view('templates_ptKeuangan/footer');
		}else{
				if($this->Admin_model->edit_donasi($id)>0){
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
				redirect('petugas_keuangan/donasi');
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
					redirect('petugas_keuangan/donasi');
				}
			}
	}

	public function cetak_donasi(){
		$data['donasi'] = $this->Admin_model->donasi();
		$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();
		$data['judul'] = 'Cetak Donasi';
		$this->load->view('templates_ptKeuangan/header',$data);
		$this->load->view('ptKeuangan/cetak_donasi',$data);
	}

	public function hapus_donasi($id){
		if($this->Admin_model->hapus_donasi($id) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
				redirect('petugas_keuangan/donasi');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Gagal Dihapus !</div>');
				redirect('petugas_keuangan/donasi');
		}
	}

	public function donasi_pdf(){
		$this->load->library('pdfgenerator');
		$data['donasi'] = $this->Admin_model->donasi();
		$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();
		$data['judul'] = 'Donasi PDF';
	    $html = $this->load->view('templates_ptKeuangan/header',$data,true);
		$html .= $this->load->view('ptKeuangan/pdf/donasi_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Laporan Donasi',true,'A4','portrait');

	}

		public function kritik_saran(){
		$data['judul'] = 'Kritik dan Saran';
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isi','Isi','required|min_length[10]');
		if($this->form_validation->run() == false){
			$this->load->view('templates_ptKeuangan/header',$data);
			$this->load->view('templates_ptKeuangan/sidebar');
			$this->load->view('ptKeuangan/kritik_saran');
			$this->load->view('templates_ptKeuangan/footer');	
		}else{
			if($this->Guru_model->kirim_kritik()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikrim!</div>');
				redirect('petugas_keuangan/kritik_saran');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Data Gagal Dikrim!</div>');
				redirect('petugas_keuangan/kritik_saran');
			}
		}
	}

}

?>