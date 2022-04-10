<?php  
class Kepala_Perpustakaan extends CI_Controller{

	public function __Construct(){
		parent:: __Construct();
		if($this->session->userdata('role') !== 'Kepala Perpustakaan'){
			redirect('auth');
			die();
		}
		$user = $this->db->get_where('user_petugas',['id_petugas'=>$this->session->userdata('id')])->row_array();
		$this->session->set_userdata('gambar',$user['gambar']); 
		$this->load->model('Admin_model');
		$this->load->model('Kepus_model');
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
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/index',$data);
		$this->load->view('templates_kepus/footer');

	}

	public function lihat_profil(){
		$data['judul'] = 'Lihat Profil';
		$data['detail'] = $this->Kepus_model->detail_kepus($this->session->userdata('email'));
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/lihat_profil',$data);
		$this->load->view('templates_kepus/footer');
	}

	public function ganti_foto(){
		$data['judul'] = 'Ganti Foto';
		$data['detail'] = $this->Kepus_model->detail_kepus($this->session->userdata('email'));
		if(!isset($_FILES['gambar']['name'])){
			$this->load->view('templates_kepus/header',$data);
			$this->load->view('templates_kepus/sidebar');
			$this->load->view('kepus/ganti_foto',$data);
			$this->load->view('templates_kepus/footer');			
		}else{
			if($this->Kepus_model->ganti_foto()>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah !! </div>');
			redirect('kepala_perpustakaan/ganti_foto');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Diubah !! </div>');
			redirect('kepala_perpustakaan/ganti_foto');
			}
		}

	}

public function ganti_password(){
		$data['judul'] = 'Ganti Password';

		$this->form_validation->set_rules('password_lama','Kata Sandi','required',['required'=>'kata sandi tidak boleh kosong']);
		$this->form_validation->set_rules('password_baru','Kata Sandi','required|matches[konfirmasi_password]',['required'=>'password baru tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);
		$this->form_validation->set_rules('konfirmasi_password','Kata Sandi','required|matches[password_baru]',['required'=>'konfirmasi tidak boleh kosong','matches'=>'konfirmasi kata sandi tidak sama']);

	if($this->form_validation->run() == false){
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/ganti_password');
		$this->load->view('templates_kepus/footer');
	}else{
		if($this->Kepus_model->ganti_password() > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Kata Sandi Berhasil Diubah !! </div>');
			redirect('Kepala_Perpustakaan/ganti_password');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Kata Sandi Yang Dimasukkan Salah !! </div>');
			redirect('Kepala_Perpustakaan/ganti_password');
		} 
	
	}

}

	public function buku(){
		$data['judul'] = 'Buku';
		$data['buku'] = $this->Admin_model->data_buku();
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/buku',$data);
		$this->load->view('templates_kepus/footer');	
	}

	public function detail_buku($id=null){
		if($id == null){
			redirect('admin/data_buku');
			die();
		}
		$data['judul'] = 'Detail Buku';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/detail_buku',$data);
		$this->load->view('templates_kepus/footer');
	}

	public function data_jurnal(){
		$data['judul'] = 'Data Jurnal';
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
			$this->load->view('templates_kepus/header',$data);
			$this->load->view('templates_kepus/sidebar');
			$this->load->view('kepus/data_jurnal',$data);
			$this->load->view('templates_kepus/footer');
	}

	public function detail_jurnal($id=null){
		if($id == null){
			redirect('kepala_perpustakaan/data_jurnal');
			die();
		}
		$data['judul'] = 'Detail Jurnal';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/detail_jurnal',$data);
		$this->load->view('templates_kepus/footer');
	}

	public function jurnal_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_jurnal();
		$data['judul'] = 'Jurnal PDF';
	    $html = $this->load->view('templates_kepus/header',$data,true);
		$html .= $this->load->view('kepus/pdf/jurnal_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Jurnal',true,'A4','portrait');

	}



	public function data_majalah(){
		$data['judul'] = 'Data Majalah';
		$data['buku'] = $this->Ptbuku_model->data_majalah();
			$this->load->view('templates_kepus/header',$data);
			$this->load->view('templates_kepus/sidebar');
			$this->load->view('kepus/data_majalah',$data);
			$this->load->view('templates_kepus/footer');
	}


	public function detail_majalah($id=null){
		if($id == null){
			redirect('kepala_perpustakaan/data_majalah');
			die();
		}
		$data['judul'] = 'Detail Majalah';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/detail_majalah',$data);
		$this->load->view('templates_kepus/footer');
	}

	public function majalah_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_majalah();
		$data['judul'] = 'Majalah PDF';
	    $html = $this->load->view('templates_kepus/header',$data,true);
		$html .= $this->load->view('kepus/pdf/majalah_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Majalah',true,'A4','portrait');

	}

	public function data_surat_kabar(){
		$data['judul'] = 'Data Surat Kabar';
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
			$this->load->view('templates_kepus/header',$data);
			$this->load->view('templates_kepus/sidebar');
			$this->load->view('kepus/data_surat_kabar',$data);
			$this->load->view('templates_kepus/footer');
	}

	public function detail_surat_kabar($id=null){
		if($id == null){
			redirect('kepala_perpustakaan/data_surat_kabar');
			die();
		}
		$data['judul'] = 'Detail Surat Kabar';
		$data['detail'] = $this->Admin_model->detail_buku($id);
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/detail_surat_kabar',$data);
		$this->load->view('templates_kepus/footer');
	}

	public function surat_kabar_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Ptbuku_model->data_surat_kabar();
		$data['judul'] = 'Surat Kabar PDF';
	    $html = $this->load->view('templates_kepus/header',$data,true);
		$html .= $this->load->view('kepus/pdf/surat_kabar_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Surat Kabar',true,'A4','portrait');

	}

	public function data_denda(){
	    $data['judul'] = 'Data Denda';
		$data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
		$data['data_denda'] = $this->Admin_model->data_denda();
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/data_denda',$data);
		$this->load->view('templates_kepus/footer');
	}

	public function tetapkan_denda(){
	    $data['judul'] = 'Tetapkan Denda';
	    $this->form_validation->set_rules('denda_per_hari','Denda','required|integer');
	    if($this->form_validation->run() == false){
		    $data['denda'] = $this->db->get('ketetapan_denda')->row_array();
			$this->load->view('templates_kepus/header',$data);
			$this->load->view('templates_kepus/sidebar');
			$this->load->view('kepus/tetapkan_denda',$data);
			$this->load->view('templates_kepus/footer');
	    }else{
	    	if($this->Admin_model->tetapkan_denda($this->input->post('denda_per_hari')) > 0){
	    		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Denda Berhasil Diubah !</div>');
			redirect('Kepala_Perpustakaan/tetapkan_denda');
	    	}else{
	    		$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Denda Gagal Diubah !</div>');
			redirect('Kepala_Perpustakaan/tetapkan_denda');
	    	}
	    }

	}

	public function donasi(){
		$data['judul'] = 'Donasi';
		$data['donasi'] = $this->Admin_model->donasi();
		$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('templates_kepus/sidebar');
		$this->load->view('kepus/donasi',$data);
		$this->load->view('templates_kepus/footer');
	}

	public function kritik_saran(){
		    $data['judul'] = 'Kritik dan Saran';
			$data['kritik_saran'] = $this->Admin_model->kritik_saran();
			$this->load->view('templates_kepus/header',$data);
			$this->load->view('templates_kepus/sidebar');
			$this->load->view('kepus/kritik_saran',$data);
			$this->load->view('templates_kepus/footer');
	}

	public function detail_kritik_saran($id){
		    $data['judul'] = 'Detail Kritik Saran';
			$data['detail'] = $this->Admin_model->detail_kritik_saran($id);
			$this->load->view('templates_kepus/header',$data);
			$this->load->view('templates_kepus/sidebar');
			$this->load->view('kepus/detail_kritik_saran',$data);
			$this->load->view('templates_kepus/footer');
	}

	public function hapus_kritik_saran($id){
		if($this->Admin_model->hapus_kritik_saran($id) >0){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
					redirect('kepala_perpustakaan/kritik_saran');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Gagal Dihapus !</div>');
					redirect('kepala_perpustakaan/kritik_saran');
			}
	}

	// public function petugas_pdf(){
	// 	$this->load->library('pdfgenerator');
	// 	$data['petugas'] = $this->Admin_model->getPetugas();
	//     $data['judul'] = 'Petugas PDF';
	//     $html = $this->load->view('templates_kepus/header',$data,true);
	// 	$html .= $this->load->view('kepus/pdf/petugas_pdf',$data,true);

	// 	 $this->pdfgenerator->generate($html,'Daftar Petugas',true,'A4','portrait');

	// }
	public function petugas_pdf(){
		// $this->load->library('pdfgenerator');
		// $data['petugas'] = $this->Admin_model->getPetugas();
	 //    $data['judul'] = 'Petugas PDF';
	 //    $html = $this->load->view('templates_kepus/header',$data,true);
		// $html .= $this->load->view('kepus/pdf/petugas_pdf',$data,true);

		//  $this->pdfgenerator->generate($html,'Daftar Petugas',true,'A4','portrait');

		$data['petugas'] = $this->Admin_model->getPetugas();
		$data['judul'] = 'Data Petugas';
		$this->load->view('templates_kepus/header',$data);
		$this->load->view('kepus/pdf/petugas_pdf',$data);

	}

	public function guru_pdf(){
		$data['guru'] = $this->Admin_model->getAnggotaGuru();
		$data['judul'] = 'Guru PDF';
	    $this->load->view('templates_kepus/header',$data);
		$this->load->view('kepus/pdf/guru_pdf',$data);
	}

	public function siswa_pdf(){
		$data['siswa'] = $this->Admin_model->getAnggotaSiswa();
		$data['judul'] = 'Siswa PDF';
	    $this->load->view('templates_kepus/header',$data);
		$this->load->view('kepus/pdf/siswa_pdf',$data);

	}

	public function buku_pdf(){
		$this->load->library('pdfgenerator');
		$data['buku'] = $this->Admin_model->data_buku();
		$data['judul'] = 'Buku PDF';
	    $html = $this->load->view('templates_kepus/header',$data,true);
		$html .= $this->load->view('kepus/pdf/buku_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Buku',true,'A4','portrait');

	}

	public function transaksi_siswa_pdf(){
		$this->load->library('pdfgenerator');
		$data['riwayat_peminjaman_siswa'] = $this->Admin_model->riwayat_peminjaman_siswa();
		$data['judul'] = 'Transaksi Siswa PDF';
	    $html = $this->load->view('templates_kepus/header',$data,true);
		$html .= $this->load->view('kepus/pdf/transaksi_siswa_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Transaksi Siswa',true,'A4','portrait');

	}

	public function transaksi_guru_pdf(){
		$this->load->library('pdfgenerator');
		$data['riwayat_peminjaman_guru'] = $this->Admin_model->riwayat_peminjaman_guru();
		$data['judul'] = 'Transaksi Guru PDF';
	    $html = $this->load->view('templates_kepus/header',$data,true);
		$html .= $this->load->view('kepus/pdf/transaksi_guru_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Daftar Transaksi Guru',true,'A4','portrait');

	}

	public function denda_pdf(){
		$this->load->library('pdfgenerator');
		$data['data_denda'] = $this->Admin_model->data_denda();
	    $data['jumlah_denda'] = $this->Admin_model->jumlah_denda();
	    $data['judul'] = 'Cetak Denda';
	    $html = $this->load->view('templates_kepus/header',$data,true);
		$html .= $this->load->view('kepus/pdf/denda_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Laporan Denda',true,'A4','portrait');

	}

	public function donasi_pdf(){
		$this->load->library('pdfgenerator');
		$data['donasi'] = $this->Admin_model->donasi();
		$data['jumlah_donasi'] = $this->Admin_model->jumlah_donasi();
		$data['judul'] = 'Donasi PDF';
	    $html = $this->load->view('templates_kepus/header',$data,true);
		$html .= $this->load->view('kepus/pdf/donasi_pdf',$data,true);

		 $this->pdfgenerator->generate($html,'Laporan Donasi',true,'A4','portrait');

	}










}

?>