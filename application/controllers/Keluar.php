<?php  

class Keluar extends CI_Controller{

	public function index(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('gambar');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('aktif');
		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Anda Telah Keluar!</div>');
		redirect('auth');
	}
}







?>