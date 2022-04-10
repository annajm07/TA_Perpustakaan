<?php  
class Guru extends CI_Controller{

	public function __Construct(){
		parent:: __Construct();
		if($this->session->userdata('role') !== 'guru'){
			redirect('auth');
			die();
		}
		$user = $this->db->get_where('user_anggota',['id_anggota'=>$this->session->userdata('id')])->row_array();
		$this->session->set_userdata('gambar',$user['gambar']); 
		$this->load->model('Admin_model');
		$this->load->model('Guru_model');
		$this->load->model('Ptbuku_model');
		$this->Admin_model->tersedia();
	}

	public function index(){
		$data['judul'] = 'Beranda';
		$data['jumlah_buku'] = $this->Admin_model->jumlah_buku();
		$data['jumlah_peminjaman'] = $this->Guru_model->jumlah_peminjaman();
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/index',$data);
		$this->load->view('templates_guru/footer');

	}

	public function lihat_profil(){
		$data['judul'] = 'Lihat Profil';
		$data['detail'] = $this->Guru_model->detail_guru($this->session->userdata('email'));
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/lihat_profil',$data);
		$this->load->view('templates_guru/footer');
	}

	public function ganti_foto(){
		$data['judul'] = 'Ganti Foto';
		$data['detail'] = $this->Guru_model->detail_guru($this->session->userdata('email'));
		if(!isset($_FILES['gambar']['name'])){
			$this->load->view('templates_guru/header',$data);
			$this->load->view('templates_guru/sidebar');
			$this->load->view('guru/ganti_foto',$data);
			$this->load->view('templates_guru/footer');			
		}else{
			if($this->Guru_model->ganti_foto()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !! </div>');
			redirect('guru/ganti_foto');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !! </div>');
			redirect('guru/ganti_foto');
			}
		}

	}

public function ganti_password(){
		$data['judul'] = 'Ganti Password';

		$this->form_validation->set_rules('password_lama','Kata Sandi','required',['required'=>'kata sandi tidak boleh kosong']);
		$this->form_validation->set_rules('password_baru','Kata Sandi','required|matches[konfirmasi_password]',['required'=>'password baru tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);
		$this->form_validation->set_rules('konfirmasi_password','Kata Sandi','required|matches[password_baru]',['required'=>'konfirmasi tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);

	if($this->form_validation->run() == false){
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/ganti_password');
		$this->load->view('templates_guru/footer');
	}else{
		if($this->Guru_model->ganti_password() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Kata Sandi Berhasil Diubah !! </div>');
			redirect('guru/ganti_password');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Kata Sandi Yang Dimasukkan Salah !! </div>');
			redirect('guru/ganti_password');
		} 
	
	}

}


public function buku(){
		$data['judul'] = 'Buku';
		$data['buku'] = $this->Admin_model->data_buku();
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/buku',$data);
		$this->load->view('templates_guru/footer');	
	}

public function detail_buku($id=null){
		if($id == null){
			redirect('admin/data_buku');
			die();
		}
		$data['judul'] = 'Detail Buku';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/detail_buku',$data);
		$this->load->view('templates_guru/footer');
	}

public function data_jurnal(){
		$data['judul'] = 'Data Jurnal';
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
			$this->load->view('templates_guru/header',$data);
			$this->load->view('templates_guru/sidebar');
			$this->load->view('guru/data_jurnal',$data);
			$this->load->view('templates_guru/footer');
	}

	public function detail_jurnal($id=null){
		if($id == null){
			redirect('guru/data_jurnal');
			die();
		}
		$data['judul'] = 'Detail Jurnal';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/detail_jurnal',$data);
		$this->load->view('templates_guru/footer');
	}



	public function data_majalah(){
		$data['judul'] = 'Data Majalah';
		$data['buku'] = $this->Ptbuku_model->data_majalah();
			$this->load->view('templates_guru/header',$data);
			$this->load->view('templates_guru/sidebar');
			$this->load->view('guru/data_majalah',$data);
			$this->load->view('templates_guru/footer');
	}


	public function detail_majalah($id=null){
		if($id == null){
			redirect('guru/data_majalah');
			die();
		}
		$data['judul'] = 'Detail Majalah';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/detail_majalah',$data);
		$this->load->view('templates_guru/footer');
	}

	public function data_surat_kabar(){
		$data['judul'] = 'Data Surat Kabar';
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
			$this->load->view('templates_guru/header',$data);
			$this->load->view('templates_guru/sidebar');
			$this->load->view('guru/data_surat_kabar',$data);
			$this->load->view('templates_guru/footer');
	}


	public function detail_surat_kabar($id=null){
		if($id == null){
			redirect('guru/data_surat_kabar');
			die();
		}
		$data['judul'] = 'Detail Surat Kabar';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/detail_surat_kabar',$data);
		$this->load->view('templates_guru/footer');
	}


public function pinjam($id){
		if($id == null){
			redirect('guru/buku');
			die();
		}
		$buku = $this->db->get_where('data_koleksi',['id_koleksi'=>$id])->row_array();
		$cek_pinjam = $this->db->get_where('peminjaman',['id_buku'=>$id,'id_anggota'=>$this->session->userdata('id')])->row_array();
		if(!empty($cek_pinjam)){
			$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Anda Sedang Meminjam Buku Ini !! </div>');
			redirect('guru/buku');
			die();
		}
		if ($buku['tersedia'] == 0) {
			$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Maaf!! Buku Yang Anda Pilih Sedang Tidak Tersedia </div>');
			redirect('siswa/buku');
			die();
		}

		$data['judul'] = 'Pinjam';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$data['guru'] = $this->Guru_model->detail_guru($this->session->userdata('email'));
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/pinjam',$data);
		$this->load->view('templates_guru/footer');
	}

public function proses_pinjam(){
		if($this->Guru_model->proses_pinjam() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">BERHASIL !! Silahkan Periksa Status Peminjaman</div>');
			redirect('guru/buku');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal Meminjam !! </div>');
			redirect('guru/pinjam');
		}
	}

public function status_peminjaman(){
		$data['judul'] = 'Status Peminjaman';
		$data['peminjam'] = $this->Guru_model->status_peminjaman();
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/status_peminjaman',$data);
		$this->load->view('templates_guru/footer');
	}

public function riwayat_peminjaman(){
		$data['judul'] = 'Riwayat Peminjaman';
		$data['riwayat'] = $this->Guru_model->riwayat_peminjaman();
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/riwayat_peminjaman',$data);
		$this->load->view('templates_guru/footer');
	}

public function cetak_transaksi(){
		$data['judul'] = 'Cetak Peminjaman';
		$data['riwayat'] = $this->Guru_model->riwayat_peminjaman();
		$this->load->view('templates_guru/header',$data);
		$this->load->view('guru/cetak_transaksi',$data);
	}

public function transaksi_pdf(){
		$this->load->library('pdfgenerator');
		$data['riwayat'] = $this->Guru_model->riwayat_peminjaman();
		$user = $this->db->get_where('user_anggota',['id_anggota'=>$this->session->userdata('id')])->row_array();
		$data['judul'] = 'Transaksi PDF';
	    $html = $this->load->view('templates_guru/header',$data,true);
		$html .= $this->load->view('guru/pdf/transaksi_pdf',$data,true);
		$fileSave = 'Riwayat Peminjaman '.$user['nama_anggota'];

		 $this->pdfgenerator->generate($html,$fileSave,true,'A4','portrait');
	}

public function kritik_saran(){
		$data['judul'] = 'Kritik dan Saran';
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isi','Isi','required|min_length[10]');
		if($this->form_validation->run() == false){
			$this->load->view('templates_guru/header',$data);
			$this->load->view('templates_guru/sidebar');
			$this->load->view('guru/kritik_saran');
			$this->load->view('templates_guru/footer');	
		}else{
			if($this->Guru_model->kirim_kritik()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikrim!</div>');
				redirect('guru/kritik_saran');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">Data Gagal Dikrim!</div>');
				redirect('guru/kritik_saran');
			}
		}
	}

public function usulan_koleksi(){
	    $this->form_validation->set_rules('judul','Nama','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('isbn','Isbn','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

	if($this->form_validation->run() == false){
		$data['judul'] = 'Usulan Koleksi';
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/usulan_koleksi');
		$this->load->view('templates_guru/footer');	
	}else{
		if($this->Guru_model->usulan_buku() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikirim !</div>');
			redirect('Guru/usulan_koleksi');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Gagal Dikirim !</div>');
			redirect('Guru/usulan_koleksi');
		}
	}
	
}

public function usulan_jurnal(){
	    $this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('penulis','Penulis','required');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

	if($this->form_validation->run() == false){
		$data['judul'] = 'Usulan Koleksi';
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/usulan_jurnal');
		$this->load->view('templates_guru/footer');	
	}else{
		if($this->Guru_model->usulan_jurnal() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikirim !</div>');
			redirect('Guru/usulan_jurnal');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Gagal Dikirim !</div>');
			redirect('Guru/usulan_jurnal');
		}
	}
	
}


public function usulan_majalah(){
	$data['judul'] = 'Usulan Koleksi';

	 	$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

	if($this->form_validation->run() == false){
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/usulan_majalah');
		$this->load->view('templates_guru/footer');		
	}else{
		if($this->Guru_model->usulan_majalah() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikirim !</div>');
			redirect('Guru/usulan_majalah');
	}else{
		$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dikirim !</div>');
			redirect('Guru/usulan_majalah');
		}
	}
}



public function usulan_surat_kabar(){
	$data['judul'] = 'Usulan Koleksi';
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('penerbit','Penerbit','required');
		$this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');
		$this->form_validation->set_rules('tahun','Tahun','required');

	if($this->form_validation->run() == false){
		$this->load->view('templates_guru/header',$data);
		$this->load->view('templates_guru/sidebar');
		$this->load->view('guru/usulan_surat_kabar');
		$this->load->view('templates_guru/footer');	
	}else{
		if($this->Guru_model->usulan_surat_kabar() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dikirim !</div>');
			redirect('Guru/usulan_surat_kabar');
	}else{
		$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dikirim !</div>');
			redirect('Guru/usulan_surat_kabar');
		}
	}
}




}

?>