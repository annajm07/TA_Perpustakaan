<?php  

class Auth_model extends CI_Model{

	public function daftar(){
		$anggota = $this->db->get_where('user_anggota',['email'=>$this->input->post('email')])->row_array();
		$petugas = $this->db->get_where('user_petugas',['email'=>$this->input->post('email')])->row_array();
		if(!empty($anggota)){
			return 0;
			die();
		}elseif(!empty($petugas)){
			return 0;
			die();
		}
		$data = [
			'nis/nip'=> $this->input->post('nis'),
			'nama_anggota'=> htmlspecialchars($this->input->post('nama')),
			'email'=> htmlspecialchars($this->input->post('email')),
			'role'=> 'siswa',
			'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
			'kelas'=> $this->input->post('kelas'),
			'jurusan'=> $this->input->post('jurusan'),
			'gambar'=> 'default.png',
			'password'=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'is_active'=> 0
		];
		$this->db->insert('user_anggota',$data);
		return $this->db->affected_rows();
	}

	public function data_buku(){
		$data = $this->db->get_where('data_koleksi',['status'=>1,'jenis'=>'Buku'])->result_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}
	 }

	 public function detail_buku($id){
		$this->db->where('id_koleksi',$id);
		$data = $this->db->get('data_koleksi')->row_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}

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