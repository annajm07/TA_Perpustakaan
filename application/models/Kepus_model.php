<?php  

class Kepus_model extends CI_Model{

	public function detail_kepus($email){
		return $this->db->get_where('user_petugas',['email'=>$email])->row_array();
	}

	public function ganti_foto(){
		$kepus = $this->db->get_where('user_petugas',['email'=>$this->session->userdata('email')])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $kepus['gambar'];
					
					if($gambar_lama !== 'default.png'){
					unlink(FCPATH.'assets/img/profil/'.$gambar_lama);
					}

					$this->db->where('email',$this->session->userdata('email'));
					$this->db->update('user_petugas',['gambar'=>$this->upload->data('file_name')]);
					return $this->db->affected_rows();
				}else{return 0;}
			}
		}

public function ganti_password(){
		$pw_lama = $this->input->post('password_lama');
		$pw_baru = $this->input->post('password_baru');
		$konfirmasi = $this->input->post('konfirmasi_password');
		$user = $this->db->get_where('user_petugas',['id_petugas'=>$this->session->userdata('id')])->row_array();
		if(password_verify($pw_lama, $user['password'])){
			$this->db->where('id_petugas',$this->session->userdata('id'));
			$this->db->update('user_petugas',['password'=>password_hash($pw_baru, PASSWORD_DEFAULT)]);
			return 1;
		}else{
			return 0;
		}
	}


}



?>