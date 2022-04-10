<?php  
class Petugas_Pelayanan extends CI_Controller{

	public function __Construct(){
		parent:: __Construct();
		if($this->session->userdata('role') !== 'Petugas Pelayanan'){
			redirect('auth');
			die();
		}
		$user = $this->db->get_where('user_petugas',['id_petugas'=>$this->session->userdata('id')])->row_array();
		$this->session->set_userdata('gambar',$user['gambar']); 
		$this->load->model('Admin_model');
		$this->load->model('Ptpelayanan_model');
		$this->load->model('Guru_model');
		$this->load->model('Ptbuku_model');
		$this->Admin_model->tersedia();
	}

	public function index(){
		$data['judul'] = 'Beranda';
		$data['jumlah_buku'] = $this->Admin_model->jumlah_buku();
		$data['peminjaman'] = $this->Ptpelayanan_model->konfirmasi_peminjaman();
		$data['pengembalian'] = $this->Ptpelayanan_model->konfirmasi_pengembalian();
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('templates_ptPelayanan/sidebar');
		$this->load->view('ptPelayanan/index',$data);
		$this->load->view('templates_ptPelayanan/footer');

	}

	public function lihat_profil(){
		$data['judul'] = 'Lihat Profil';
		$data['detail'] = $this->Ptpelayanan_model->detail_ptpelayanan($this->session->userdata('email'));
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('templates_ptPelayanan/sidebar');
		$this->load->view('ptPelayanan/lihat_profil',$data);
		$this->load->view('templates_ptPelayanan/footer');
	}

	public function ganti_foto(){
		$data['judul'] = 'Ganti Foto';
		$data['detail'] = $this->Ptpelayanan_model->detail_ptpelayanan($this->session->userdata('email'));
		if(!isset($_FILES['gambar']['name'])){
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/ganti_foto',$data);
			$this->load->view('templates_ptPelayanan/footer');			
		}else{
			if($this->Ptpelayanan_model->ganti_foto()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !! </div>');
			redirect('Petugas_Pelayanan/ganti_foto');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !! </div>');
			redirect('Petugas_Pelayanan/ganti_foto');
			}
		}

	}

	public function ganti_password(){
		$data['judul'] = 'Ganti Password';

		$this->form_validation->set_rules('password_lama','Kata Sandi','required',['required'=>'kata sandi tidak boleh kosong']);
		$this->form_validation->set_rules('password_baru','Kata Sandi','required|matches[konfirmasi_password]',['required'=>'password baru tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);
		$this->form_validation->set_rules('konfirmasi_password','Kata Sandi','required|matches[password_baru]',['required'=>'konfirmasi tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);

	if($this->form_validation->run() == false){
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('templates_ptPelayanan/sidebar');
		$this->load->view('ptPelayanan/ganti_password');
		$this->load->view('templates_ptPelayanan/footer');
	}else{
		if($this->Ptpelayanan_model->ganti_password() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Kata Sandi Berhasil Diubah !! </div>');
			redirect('Petugas_Pelayanan/ganti_password');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Kata Sandi Yang Dimasukkan Salah !! </div>');
			redirect('Petugas_Pelayanan/ganti_password');
		} 
	
	}

}

	public function buku(){
		$data['judul'] = 'Buku';
		$data['buku'] = $this->Admin_model->data_buku();
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('templates_ptPelayanan/sidebar');
		$this->load->view('ptPelayanan/buku',$data);
		$this->load->view('templates_ptPelayanan/footer');	
	}

	public function detail_buku($id=null){
		if($id == null){
			redirect('admin/data_buku');
			die();
		}
		$data['judul'] = 'Detail Buku';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('templates_ptPelayanan/sidebar');
		$this->load->view('ptPelayanan/detail_buku',$data);
		$this->load->view('templates_ptPelayanan/footer');
	}

	 public function data_jurnal(){
		$data['judul'] = 'Data Jurnal';
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/data_jurnal',$data);
			$this->load->view('templates_ptPelayanan/footer');
	}

	public function detail_jurnal($id=null){
		if($id == null){
			redirect('Petugas_Pelayanan/data_jurnal');
			die();
		}
		$data['judul'] = 'Detail Jurnal';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('templates_ptPelayanan/sidebar');
		$this->load->view('ptPelayanan/detail_jurnal',$data);
		$this->load->view('templates_ptPelayanan/footer');
	}



	public function data_majalah(){
		$data['judul'] = 'Data Majalah';
		$data['buku'] = $this->Ptbuku_model->data_majalah();
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/data_majalah',$data);
			$this->load->view('templates_ptPelayanan/footer');
	}


	public function detail_majalah($id=null){
		if($id == null){
			redirect('Petugas_Pelayanan/data_majalah');
			die();
		}
		$data['judul'] = 'Detail Majalah';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('templates_ptPelayanan/sidebar');
		$this->load->view('ptPelayanan/detail_majalah',$data);
		$this->load->view('templates_ptPelayanan/footer');
	}

	public function data_surat_kabar(){
		$data['judul'] = 'Data Surat Kabar';
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/data_surat_kabar',$data);
			$this->load->view('templates_ptPelayanan/footer');
	}


	public function detail_surat_kabar($id=null){
		if($id == null){
			redirect('Petugas_Pelayanan/data_surat_kabar');
			die();
		}
		$data['judul'] = 'Detail Surat Kabar';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('templates_ptPelayanan/sidebar');
		$this->load->view('ptPelayanan/detail_surat_kabar',$data);
		$this->load->view('templates_ptPelayanan/footer');
	}



	public function konfirmasi_peminjaman($id = null){
		$data['judul'] = 'Peminjaman';
		if($id == null){		
			$data['peminjaman'] = $this->Admin_model->getKonfirmPeminjaman();
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/konfirmasi_peminjaman',$data);
			$this->load->view('templates_ptPelayanan/footer');
		}else{
			if($this->Admin_model->aktif_peminjaman($id) > 0){
			   $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Berhasil Dikonfirmasi</div>');
			redirect('Petugas_Pelayanan/konfirmasi_peminjaman');
			}
		}
	}

	public function hapus_peminjaman($id){
		if($this->Admin_model->hapus_peminjaman($id) >0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Berhasil Dihapus</div>');
			redirect('Petugas_Pelayanan/konfirmasi_peminjaman');
		}
	}

	public function daftar_peminjam(){
			$data['judul'] = 'Sedang Meminjam';
			$data['peminjam'] = $this->Admin_model->sedang_meminjam();
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/daftar_peminjam',$data);
			$this->load->view('templates_ptPelayanan/footer');
	}

	public function konfirmasi_pengembalian(){
			$data['judul'] = 'Pengembalian';
			$data['peminjam'] = $this->Admin_model->getDaftarPeminjam();
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/konfirmasi_pengembalian',$data);
			$this->load->view('templates_ptPelayanan/footer');
	}

	public function proses_pengembalian($id_peminjaman,$id_anggota){
		if($this->Admin_model->proses_pengembalian($id_peminjaman,$id_anggota) > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Buku Berhasil Dikembalikan</div>');
			redirect('Petugas_Pelayanan/konfirmasi_pengembalian');
		}
	}

	public function riwayat_siswa(){
		    $data['riwayat_peminjaman_siswa'] = $this->Admin_model->riwayat_peminjaman_siswa();
			$data['judul'] = 'Riwayat Transaksi Siswa';
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/riwayat_peminjaman_siswa',$data);
			$this->load->view('templates_ptPelayanan/footer');
	}

	public function cetak_transaksi_siswa(){
		$data['riwayat_peminjaman_siswa'] = $this->Admin_model->riwayat_peminjaman_siswa();
		$data['judul'] = 'Cetak Transaksi Siswa';
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('ptPelayanan/cetak_transaksi_siswa',$data);
	}

	public function transaksi_siswa_pdf(){
		$this->load->library('pdfgenerator');
		$data['riwayat_peminjaman_siswa'] = $this->Admin_model->riwayat_peminjaman_siswa();
		$data['judul'] = 'Transaksi Siswa PDF';
	    $html = $this->load->view('templates_ptPelayanan/header',$data,true);
		$html .= $this->load->view('ptPelayanan/pdf/transaksi_siswa_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Transaksi Siswa',true,'A4','portrait');

	}

	public function riwayat_guru(){
		    $data['riwayat_peminjaman_guru'] = $this->Admin_model->riwayat_peminjaman_guru();
			$data['judul'] = 'Riwayat Transaksi Guru';
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/riwayat_peminjaman_guru',$data);
			$this->load->view('templates_ptPelayanan/footer');
	}

	public function cetak_transaksi_guru(){
		$data['riwayat_peminjaman_guru'] = $this->Admin_model->riwayat_peminjaman_guru();
		$data['judul'] = 'Cetak Transaksi Guru';
		$this->load->view('templates_ptPelayanan/header',$data);
		$this->load->view('ptPelayanan/cetak_transaksi_guru',$data);
	}

	public function transaksi_guru_pdf(){
		$this->load->library('pdfgenerator');
		$data['riwayat_peminjaman_guru'] = $this->Admin_model->riwayat_peminjaman_guru();
		$data['judul'] = 'Transaksi Guru PDF';
	    $html = $this->load->view('templates_ptPelayanan/header',$data,true);
		$html .= $this->load->view('ptPelayanan/pdf/transaksi_guru_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Transaksi Guru',true,'A4','portrait');

	}

	public function kritik_saran(){
		$data['judul'] = 'Kritik dan Saran';
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isi','Isi','required|min_length[10]');
		if($this->form_validation->run() == false){
			$this->load->view('templates_ptPelayanan/header',$data);
			$this->load->view('templates_ptPelayanan/sidebar');
			$this->load->view('ptPelayanan/kritik_saran');
			$this->load->view('templates_ptPelayanan/footer');	
		}else{
			if($this->Guru_model->kirim_kritik()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikrim!</div>');
				redirect('Petugas_Pelayanan/kritik_saran');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Data Gagal Dikrim!</div>');
				redirect('Petugas_Pelayanan/kritik_saran');
			}
		}
	}

}

?>