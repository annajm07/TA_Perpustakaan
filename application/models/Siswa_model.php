<?php  

class Siswa_model extends CI_Model{


	public function detail_siswa($email){
		return $this->db->get_where('user_anggota',['email'=>$email])->row_array();
	}

	public function ganti_foto(){
		$siswa = $this->db->get_where('user_anggota',['email'=>$this->session->userdata('email')])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $siswa['gambar'];
					
					if($gambar_lama !== 'default.png'){
					unlink(FCPATH.'assets/img/profil/'.$gambar_lama);
					}

					$this->db->where('email',$this->session->userdata('email'));
					$this->db->update('user_anggota',['gambar'=>$this->upload->data('file_name')]);
					return $this->db->affected_rows();
				}else{return 0;}
			}
		}

	public function ganti_password(){
		$pw_lama = $this->input->post('password_lama');
		$pw_baru = $this->input->post('password_baru');
		$konfirmasi = $this->input->post('konfirmasi_password');
		$user = $this->db->get_where('user_anggota',['id_anggota'=>$this->session->userdata('id')])->row_array();
		if(password_verify($pw_lama, $user['password'])){
			$this->db->where('id_anggota',$this->session->userdata('id'));
			$this->db->update('user_anggota',['password'=>password_hash($pw_baru, PASSWORD_DEFAULT)]);
			return 1;
		}else{
			return 0;
		}
	}

	public function proses_pinjam(){
		$id_siswa = $this->input->post('id_siswa');
		$id_buku = $this->input->post('id_buku');
		$nama_siswa = $this->input->post('nama');
		$judul_buku = $this->input->post('judul');
		$tanggal_pinjam = $this->input->post('tgl_pinjam');
		$tanggal_kembali = $this->input->post('tgl_kembali');

		$data = [
			'id_anggota'=>$id_siswa,
			'id_buku'=>$id_buku,
			'nama_peminjam'=>$nama_siswa,
			'judul_buku'=>$judul_buku,
			'tanggal_pinjam'=>$tanggal_pinjam,
			'tanggal_kembali'=>$tanggal_kembali,
			'status'=>0
		];
		$this->db->insert('peminjaman',$data);
		return $this->db->affected_rows();
	}

	public function status_peminjaman(){
		$data = $this->db->get_where('peminjaman',['id_anggota'=>$this->session->userdata('id')])->result_array();
			if(empty($data)){
				return 0;
			}else{
				return $data;
			}
	}

	public function riwayat_peminjaman(){
		return $this->db->get_where('pengembalian',['id_anggota'=>$this->session->userdata('id')])->result_array();
	}

	public function jumlah_peminjaman(){
		$this->db->where('id_anggota',$this->session->userdata('id'));
		return $this->db->count_all_results('peminjaman');
	}

	public function denda(){
		return $this->db->get_where('denda',['id_siswa'=>$this->session->userdata('id')])->result_array();
	}

	public function jumlah_denda(){
		$id = $this->session->userdata('id');
	 	$data = $this->db->query("SELECT SUM(denda) as jumlah FROM denda WHERE id_siswa = $id ")->row_array();
	 	return $data;
	 }

	 public function bayar_denda(){
		$id = $this->session->userdata('id');
	 	$data = $this->db->query("SELECT SUM(denda) as jumlah FROM denda WHERE id_siswa = $id AND status = 0 ")->row_array();
	 	return $data;
	 }

	 public function kirim_kritik(){
	 	$data = [
	 		'judul_kritik'=>$this->input->post('judul'),
	 		'isi_kritik'=>$this->input->post('isi'),
	 		'tanggal'=>$this->input->post('tanggal')
	 	];

	 	$this->db->insert('kritik_saran',$data);
	 	return $this->db->affected_rows();
	 }

	 




}


?>